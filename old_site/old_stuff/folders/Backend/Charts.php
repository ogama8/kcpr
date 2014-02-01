<?php

/**
 * Library for Charts and Adds funcitons
 * @author Ben Sweedler 
 */
class Charts {
   const CHART = 0;
   const ADD = 1;

   /**
    * Get the top charts around a date. 
    * @returns array(date used, array of charts)
    */
   public static function getTop($amount = 10,
    $type = self::CHART, $date = null) {


      // If date is null, we will look for the most recent chart.
      if ($date == null) {
        $query = <<<EOT
            SELECT max(date) FROM charts;
EOT;
        $date = Database::db()->getVal($query); 
      }

      $charts = self::find($date);
      $charts = $charts[$type];
      $top = array_slice($charts, 0, $amount);
      return array($date, $top);
   }

   /**
    * Get the charts and adds from a unixtime OR date.
    */
   public static function find($date) {
      if (is_numeric($date))
         $date = date('Y-m-d', $date);

      $query = <<<EOT
         SELECT * FROM charts WHERE 
          strftime("%Y-%m-%d", date) = ? AND
          type = ?
         ORDER BY rank ASC;
EOT;
      $charts = Database::db()->getAll($query, array(
       T_S, $date, T_I, self::CHART));

      $adds = Database::db()->getAll($query, array(
       T_S, $date, T_I, self::ADD));

      return array($charts, $adds);
   }

   /**
    * List of all the dates we have charts for.
    */
   public static function getArchives() {
      $query = <<<EOT
         SELECT DISTINCT
            strftime(date) as 'unixtime',
            strftime('%Y', date) as 'year',
            strftime('%m', date) as 'month',
            strftime('%d', date) as 'day'
         FROM charts
         ORDER BY unixtime DESC;
EOT;
      $dates = Database::db()->getAll($query);
      return $dates;
   }

   public static function addSimpleCharts($charts, $date) {
      $db = Database::db();

      // Delete any charts with the same day for the date.
      $day = date('Y-m-d', $date);
      $query = <<<EOT
         DELETE FROM charts WHERE
            strftime('%Y-%m-%d', date) = ?;
EOT;
      $db->execute($query, array(T_S, $day));

      $query = <<<EOT
         INSERT INTO charts (artist, album, label, date, rank, type)
         VALUES (?, ?, ?, ?, ?, ?);
EOT;

      foreach ($charts as $chart) {
         $db->execute($query, array(
          T_S, $chart['artist'],       
          T_S, $chart['album'],       
          T_S, $chart['label'],       
          T_S, $day,
          T_I, $chart['rank'],       
          T_I, $chart['type']
         ));
      }
   }

   public static function doChartsExist($date) {
      // Delete any charts with the same day for the date.
      $day = date('Y-m-d', $date);
      $query = <<<EOT
         SELECT * FROM charts WHERE
            strftime('%Y-%m-%d', date) = ?;
EOT;

      $exist = Database::db()->getAll($query, array(T_S, $day));
      return $exist;
   }

   public static function parseSimpleCharts($text) {
      $lines = explode("\n", $text);
      
      $chartsAndAdds = array();
      $parsingAdds = false; // true after we hit the 'adds' line.
      $num = 1;
      foreach ($lines as $line) {
         $label = null;
         $album = null;
         $line = trim($line);
         
         // Skip if we have an empty line.
         if ($line == '')
            continue;
         
         // If it's the first line, and the line says "Charts" skip it.
         if (preg_match('/^[\s\*\-]*(?i)charts(?-i)/', $line)) {
            continue;
         }

         // If the line says "Adds", we are now parsing adds.
         if (preg_match('/^[\s\*\-]*(?i)adds(?-i)/', $line)) {
            $parsingAdds = true;
            continue;
         }

         // Get the label if it's there.
         if (preg_match('/\s*\((?P<label>.+)\)\s*$/', $line, $match)) {
            $line = preg_replace('/\s*\(.+\)\s*$/', '', $line);
            $label = $match['label'];
         }

         // Get the album if it's there.
         if (preg_match('/\s*\[(?P<album>.+)\]\s*$/', $line, $match)) {
            $line = preg_replace('/\s*\[.+\]\s*$/', '', $line);
            $album = $match['album'];
         }

         // Get rid of starting numbers or bullet points.
         $line = preg_replace('/^(\d+.|\*|\-)\s*/', '', $line);

         
         $chartsAndAdds[] = array(
          'artist' => $line,
          'label' => $label, 
          'album' => $album, 
          'type' => $parsingAdds ? 1 : 0,
          'rank' => $num++
         );
      }

      return $chartsAndAdds;
   }

   /**
    * Inverse of the above function.
    * @param $charts is array w/ 2 members,
    * one for charts and another for adds.
    */
   public function chartsToText($charts) {
      $text = "Charts\r\n";
      foreach ($charts[self::CHART] as $chart) {
         $text .= "{$chart['rank']}. {$chart['artist']}";
         $text .= $chart['album'] != null ? " [{$chart['album']}]" : '';
         $text .= $chart['label'] != null ? " ({$chart['label']})" : '';
         $text .= "\r\n";
      } 

      $text .= "\r\nAdds\r\n";
      foreach ($charts[self::ADD] as $chart) {
         $text .= "* {$chart['artist']}";
         $text .= $chart['album'] != null ? " [{$chart['album']}]" : '';
         $text .= $chart['label'] != null ? " ({$chart['label']})" : '';
         $text .= "\r\n";
      } 

      return $text;
   }
}
