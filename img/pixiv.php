<?php
//function curl_get
function curl_get($url, array $header = array()){
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
//set num=NUM or use rand instead
if (isset($_GET['num'])) {
$i = max(0,$_GET["num"]);
} else {
$i = mt_rand(0,49);
}
//set img header
header('Content-type: image/jpg');
//set default mode
$m = "daily";
if (isset($_GET['mode'])) {
$m = $_GET['mode'];
}
$html = curl_get('http://www.pixiv.net/ranking.php?mode='.$m.'&content=illust');
//match url
preg_match_all('|http://i\d\.pixiv\.net/c/240x480/img-master/img/\d{4}/\d{2}/\d{2}/\d{2}/\d{2}/\d{2}/(.*?\.\w{3})|', $html, $image);
//make url of img-original 
$url = str_ireplace('c/240x480/img-master','img-original',$image[0][$i]);
$url = str_ireplace('_master1200','',$url);
$image[1][$i] = str_ireplace('_p0_master1200.jpg','',$image[1][$i]);
//img data output
$f = curl_get($url, array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2868.3 Safari/537.36','Referer: http://www.pixiv.net/member_illust.php?mode=medium&illust_id='.$image[1][$i]));
//try to use PNG
if ( preg_match("/404/i", $f ) ) {
$url = str_ireplace('jpg','png',$url);
$f = curl_get($url, array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2868.3 Safari/537.36','Referer: http://www.pixiv.net/member_illust.php?mode=medium&illust_id='.$image[1][$i]));
}
//try small picture instead if error
if ( preg_match("/404/i", $f ) ) {
$url = str_ireplace('240x480','1200x1200',$image[0][$i]);
$f = curl_get($url, array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2868.3 Safari/537.36','Referer: http://www.pixiv.net/member_illust.php?mode=medium&illust_id='.$image[1][$i]));
}
if ( preg_match("/404/i", $f ) ) {
$url = str_ireplace('240x480','600x600',$image[0][$i]);
$f = curl_get($url, array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2868.3 Safari/537.36','Referer: http://www.pixiv.net/member_illust.php?mode=medium&illust_id='.$image[1][$i]));
}
echo $f;