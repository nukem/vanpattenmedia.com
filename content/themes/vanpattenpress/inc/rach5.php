<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Master functions    
//
// ------------------------------------------------------------ //

// "stylesheet_link_tag," borrowed from Roots, inspired by Rails
//
// Options:
//	$file		= Location of file
//	$local		= Local or remote file? (e.g. include get_template_directory_uri() or not)
//	$tabs		= Number of tabs to proceed the line
//	$newline	= Add a newline after?
//	$rel		= "stylesheet" by default, but you can change it if you want
function stylesheet_link_tag($file, $local = true, $tabs = 0, $newline = true, $rel = 'stylesheet') {
	$indent = str_repeat("\t", $tabs);
	echo $indent . '<link rel="' . $rel .'" href="' . ($local ? get_template_directory_uri() . '/css' : '') . $file . '">' . ($newline ? "\n" : "");
}

// What year should the copyright start?
function copyright($copystart) {
	echo 'Copyright &copy; ' . $copystart;
	
	if ( date('Y') > $copystart ) {
		echo '-' . date('Y');
	}
}

// Userful word trim function
function word_trim($string, $count, $ellipsis = FALSE){
	$words = explode(' ', $string);
	if (count($words) > $count){
		array_splice($words, $count);
		$string = implode(' ', $words);
		if (is_string($ellipsis)){
			$string .= $ellipsis;
		}
		elseif ($ellipsis){
			$string .= '...';
		}
	}
	return $string;
}

function rach5_get_the_excerpt() {
	global $posts;

	if ( empty($posts[0]->post_excerpt) ) {
		// 1. Get the initial data for the excerpt
		$content = $posts[0]->post_content;
		
		// 2. Strip tags from $content
		$stripped_content = strip_tags($content);
		
		// 3. Trim words from $content
		$trimmed_content = word_trim($stripped_content, 20, true);
		
		// 4. Here's your excerpt!
		$rach5_excerpt = str_replace("\n", ' ', $trimmed_content);
	} else {
		// When the post excerpt has been set explicitly, then it has priority.
		$rach5_excerpt = $posts[0]->post_excerpt;
	}

	return $rach5_excerpt;
}