<?php
if(function_exists("file_get_contents")){
	echo "file_get_contents��֧��";
}else{
	echo "file_get_contents����֧��";
}
echo '<br />';
if(function_exists("curl_init")){
	echo "curl��֧��";
}else{
	echo "curl����֧��";
}
echo '<br />';
if(function_exists("fsockopen")){
	echo "fsockopen��֧��";
}else{
	echo "fsockopen����֧��";
}
?>