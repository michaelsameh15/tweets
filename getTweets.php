<?php
$username = $_GET['username'];
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$twitteruser = $username;
$notweets = 5;
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
$size = count($json_data);
if($size<5){
	$notweets = $size;
} 
?>
<?php if(isset($json_data["errors"])||$size==0||isset($json_data["error"])){
	?>

<h1 style="text-align: center;color: #d14836">Please Check user name</h1>
<?php	
}
else{
	?>


<span class="first"> 
			@<?php print_r($json_data[0]["user"]["screen_name"]); ?>
			<span class="icon-edit new"></span>
		</span>
		<ul class="timeline" >
		<?php 
		for ($i=0; $i <$notweets ; $i++) { ?>
			
		
			<li>
				<div class="avatar">
				
          <img src="<?php print_r($json_data[$i]["user"]["profile_image_url"]); ?>">
         
         
					<div class="hover">
					 <a href="https://twitter.com/<?php print_r($json_data[$i]["user"]["screen_name"]); ?>" style="color: #fff;text-decoration: none;" target="_blank">
						<div class="icon-twitter"></div>
						</a>
					</div>
					
				</div>
				<div class="bubble-container">
					<div class="bubble">
					<div class="retweet">
						<div class="icon-retweet"></div>
					</div>
					<h2><?php print_r($json_data[$i]["user"]["name"]); ?></h2>
						<h3><?php
						print_r($json_data[$i]["text"]);
						?></h3>
						<p> <?php print_r($json_data[$i]["created_at"]); ?> </p>
						<div class="over-bubble">
							<div class="icon-mail-reply action"></div>
							<div class="icon-retweet action"></div>
							<div class="icon-star"></div>
						</div>
					</div>
					
					<div class="arrow"></div>
				</div>
			</li>
			<?php } ?>
			
		</ul>

	</div>
	<?php	
}
?>