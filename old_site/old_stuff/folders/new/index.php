<style type="text/css">
body {background-color:ffffe0ff}
h1 {text-align:center}
#colleft {float: left; width: 200px; background-color:CCFFB3;height:100%;padding:10px }
#colright {float:right;width:200px;text-align:right;background-color:CCFFB3;height:100%}
#colcenter {float:center; margin-left:225px;margin-right:225px}
header {background-color:CCFFB3;padding:10px}
</style>

<?php include('/includes/header.php'); ?>
<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
#require_once('~/php/library/Simplepie/simplepie.inc');
// For 1.3+:
require_once('~/php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url('http://kcprblog.blogspot.com/feeds/posts/default?alt=rss');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
?>
<header><b>Schedule</b></header>
<div id="colleft">
hellwwo<br>dwdw
</div>
<div id="colright"> hello </div>
<div id="colcenter">hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww wwwwwwwwwwwwwwwww wwwwwwwwwwwwwwwwwwwwwwwwww wwwwwwwwwwwwww
<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><?php echo $item->get_description(); ?></p>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		</div>
 
	<?php endforeach; ?>
</div><br>
<?php include('includes/footer.php'); ?>