#!/bin/bash	
date +%s > ~/new/rss/updatetime
wget http://kcprblog.blogspot.com/feeds/posts/default?alt=rss -O ~/new/rss/kcprcache.xml
