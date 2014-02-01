
<?php 
   function drawListenHeader() {
      date_default_timezone_set('America/Los_Angeles'); 
      $day = date('l'); 
      $hour = date('g'); 
      $min = date('i'); 
      $meridiem = date('a'); 
      print "<div id='listenheading' class='normaltext'>"; 
      print "<p>It is $day at $hour:$min $meridiem in San Luis Obispo, CA</p>"; 
      print "<a href='music/live.html'>Listen online</a></div>";
   }
?>

