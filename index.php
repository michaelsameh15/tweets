<?php
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$twitteruser = "aboutreka";
$notweets = 1;
$consumerkey = "7SgvAHjynT4uD0HmDfibQpQxD";
$consumersecret = "LjDNbCBADLWiZlUFansF6C3kb6uXpaG1vE7cQNNf7QnQpYJtpu";
$accesstoken = "727287343-sbKzBbqQ8LY8vkq1et8aCKeTw3ba9UNEwZyUzbQK";
$accesstokensecret = "iltaJwBQ81dnhBwXyXCx2fMV458lzG80LdkMWnw6kYDhQ";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new \Abraham\TwitterOAuth\TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get('statuses/user_timeline', ['screen_name' =>$twitteruser, 'count' => $notweets]);

$json_data = json_decode(json_encode($tweets),true);
print_r($json_data);
$size = count($json_data);
?>
