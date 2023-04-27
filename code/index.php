<?php
$str = 'ahb acb aeb aeeb adcb axeb';
$pattern = '/a..b/';
preg_match_all($pattern, $str, $matches);

print_r($matches[0]); // вывод найденных строк


$str = 'a1b2c3';
$regex = '/(\d+)/';
$result = preg_replace_callback($regex, function($match) {
return pow($match[1], 3);
}, $str);
echo $result;

?>