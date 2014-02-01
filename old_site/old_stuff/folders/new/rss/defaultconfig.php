<?php

// This file is a default example for a rss feed that needs to be aggregated.
// Most of the comments in this file show you which areas may need to be
// changed to make the most of your rss feed.
// This file is mostly a config file - it does NOT output any information to
// the web page - that is done by a seperate php file (normally index.php).

// The class name needs to have a unique name (usually one that identifies
// the feed).
class kcprblog extends RSSParser {

	// Constructor function - the name of the function needs to be updated
	// to be the same as the class name.
	function kcprblog($kcprcache) {
		feed($this, $kcprcache);
	}

	// Comment out the if block if you want unlimited number of items (up to
	// length of rss feed), or edit the number for the limit.
	function startElement_extra() {
		if ($this->num < 10) {
			// This line is needed regardless of whether you are using an
			// if statement or not:
			$this->insideitem = true;
			$this->num += 1;
		}
	}

	function endElement_extra($this) {
		// Edit name for output string.
		global $kcprout;
		
		switch (htmlspecialchars(trim($this->section))) {
			// Add any modifications for section string
		
			// Example for main slashdot sections (mainly formatting):
			//case "linux":
			//$this->section = "Linux:&nbsp;";
			//break;
		}
	
		switch (trim($this->subject)) {
			// Add any modifications for subject string
		
			// Example for slashdot (allows you to use subject string for
			// images):
			//case "fps":
			//$this->subject = "gamesfps";
			//break;
		}
		
		// Edit name for output string (must be same as the one at the
		// beginning of the function).
		// Edit output string, using html characters and rss item tags.
		// Refer to rss.php for possible rss item strings.
		// Use . to concatenate strings, and remember to use trim() and/or
		// htmlspecialchars() to trim the strings
		$kcprout .= '<dt><b><a href="'.trim($this->link).'">'.htmlspecialchars(trim($this->title)).'</a></b></dt>';
	}

}
?>
