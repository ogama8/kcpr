<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChartsLib {
   public function __construct() {
      $this->controller =& get_instance(); 
   }

   public function getArchives() {
      $query = <<<EOT
         SELECT DISTINCT
            strftime('%s', date, 'unixepoch') as 'unixtime',
            strftime('%Y', date, 'unixepoch') as 'year',
            strftime('%m', date, 'unixepoch') as 'month',
            strftime('%d', date, 'unixepoch') as 'day'
         FROM simple_charts
         ORDER BY year, month, day;
EOT;

      $results = $this->controller->db->query($query);
      $dates = $results->result_array();

      // Add link.
      foreach ($dates as &$date) {
         $date['link'] = "{$date['month']}-{$date['day']}-{$date['year']}";
      }

      return $dates;

   }

   public function parseSimpleCharts($text) {
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

         
         $newChart = new Simple_chart();
         $newChart->artist = $line;
         $newChart->label = $label; 
         $newChart->album = $album; 
         $newChart->type = $parsingAdds ? 1 : 0;
         $newChart->rank = $num++;

         $chartsAndAdds[] = $newChart;
      }

      return $chartsAndAdds;
   }
}

