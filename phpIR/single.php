<?php
require 'Opinion.php';
require_once('twitter-api-php-master/TwitterAPIExchange.php');

$settings = array(
	'oauth_access_token' => "770897701-GyFoDGKyDKRaybO5z5MKGwKtXe5F3A8sbV2SyQRP",
	'oauth_access_token_secret' => "BEzUyFWERf9KMYVxLOOaDxQFQ6ifVIwnbwdIu74wbjvHk",
	'consumer_key' => "mqxdwvY8SQH3vpNrgDTq9EESI",
	'consumer_secret' => "mrdx3WIaRxWT7KBUiC1hmoil86VQIw1ihUtKUFLqXMZjCeV2n3"
	);

$searchWord = "#AAP";	
$url = 'https://api.twitter.com/1.1/search/tweets.json';
//$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
//$getfield = '?include_entities=true&inc‌​lude_rts=true&since:2011-05-16&until:2011-08-16';
$getfield = '?q='.$searchWord.'&count=100&lang=en';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);  
$op = new Opinion();
$op->addToIndex('rt-polarity.neg', 'neg');
$op->addToIndex('rt-polarity.pos', 'pos');
 for($i=0;$i<100;$i++){
 $string= $response['statuses'][$i]['text'];
 //print_r($response['statuses'][$i]);
 echo $response['statuses'][$i]['created_at'] . " " . $response['statuses'][$i]['user']['location'];
echo "<br>Classifying '$string' - " . $op->classify($string) . "<br><br>";
}

?>