<?php 
function autoDetectLink($str) {
	return $str = preg_replace_callback('#(?:http?://\S+)|(?:https?://\S+)|(?:www.\S+)|(?:\S+\.\S+)#', function($arr)
					{
					    if(strpos($arr[0], 'http://') !== 0)
					    {
					        $arr[0] = 'http://' . $arr[0];
					    }
					    $url = parse_url($arr[0]);

					    //links
					    return sprintf('<a href="%1$s">%1$s</a>', $arr[0]);
					}, $str);
}

function randomColor() {
	$colors = array("#e08713","#eaa59e","#e3dc10","#1dab3f");
	return $colors[rand(0,count($colors)-1)];
}
 ?>