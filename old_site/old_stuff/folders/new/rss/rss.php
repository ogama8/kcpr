<?php

// this is the file that does most of the data processing (xml parsing) for
// aggregating a rss feed
// each rss feed needs a seperate config file (look at default.php for an 
// example)
// this file only needs to be modified to include any extra tags that you
// may need to take advantage of other features of rss feeds
// this file is used globally for every feed you use, so needs the tag
// definitions for every file

class RSSParser {
	var $insideitem = false;
	var $tag = "";
	
	// add more here for any extra types of tags needed
	// remember to update endElement and characterData 
	// functions as well
	var $title = "";
	var $description = "";
	var $link = "";
	var $subject = "";
	var $section = "";

	function startElement($parser, $tagName, $attrs) {
		if ($this->insideitem) {
			$this->tag = $tagName;
		} elseif ($tagName == "ITEM") {
			$this->startElement_extra();
		}
	}

	function endElement($parser, $tagName) {
		if ($tagName == "ITEM") {
			if ($this->title) {
				$this->endElement_extra($this);
			}
			// add more here for any extra types of tags needed
			// remember to update characterData function and class
			// variables as well
			$this->title = "";
			$this->description = "";
			$this->link = "";
			$this->subject = "";
			$this->section = "";
			$this->insideitem = false;
		}
	}

	function characterData($parser, $data) {
		if ($this->insideitem) {
		switch ($this->tag) {
			// add more here for any extra types of tags needed
			// remember to update endElement function and class
			// variables as well
			case "TITLE":
			$this->title .= $data;
			break;
			case "DESCRIPTION":
			$this->description .= $data;
			break;
			case "LINK":
			$this->link .= $data;
			break;
			case "DC:SUBJECT":
			$this->subject .= $data;
			break;
			case "SLASH:SECTION":
			$this->section .= $data;
			break;
		}
		}
	}
}

function feed($rss_parser, $cachefilename) {
	$input = fopen($cachefilename,"r")
		or die("Error reading RSS data.");
	$xml_parser = xml_parser_create();
	xml_set_object($xml_parser,&$rss_parser);
	xml_set_element_handler($xml_parser, "startElement", "endElement");
	xml_set_character_data_handler($xml_parser, "characterData");
	while ($data = fread($input, 4096))
		xml_parse($xml_parser, $data, feof($input))
			or die(sprintf("XML error: %s at line %d", 
				xml_error_string(xml_get_error_code($xml_parser)), 
				xml_get_current_line_number($xml_parser)));
	fclose($input);
	xml_parser_free($xml_parser);
}

?>
