<?php
/*
Plugin Name: RV Embed PDF
Description: When you upload PDF and insert a link to it with the Add Media button, it will be automatically embedded in the page using Google Docs Viewer.
Author: Rong Vang Media
Author URI: http://www.rongvang.cz
Version: 1.0
*/

function rv_embedpdf($in){
	$out = "";
	if(preg_match("/href='(.*?\\.pdf)'/", $in, $matches)){
		$out .= '<iframe src="http://docs.google.com/gview?url='.$matches[1].'&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>';
	}

	$out .= $in;

	return $out;
}
add_filter ( 'media_send_to_editor', 'rv_embedpdf' );
