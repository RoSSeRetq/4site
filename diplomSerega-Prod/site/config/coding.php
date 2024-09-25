<?php
	function OnCoding($text)
	{
		return base64_encode($text);      
	}
	function OnEncoding($text)
	{        
		return base64_decode($text);
	}
	function OnCodingPass($text)
	{
		return md5(md5(base64_encode($text)));      
	}
?>