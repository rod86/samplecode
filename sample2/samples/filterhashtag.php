<?php
/**
 * Get latest tweets that only have hashtags
 */

//Load configuration
include 'conf.php';

//Load twitter class
include '../tweets.php';


$tweets = new tweets();
$tweets->setUser(TWITTER_USERNAME);
$tweets->setNumTweets(TWITTER_NUM_TWEETS);
$tweets->setIncludeRetweets(TWITTER_INCLUDE_RETWEETS);
$tweets->setWithHashtags(true);
$res = $tweets->getTweets();

//display tweets
foreach ($res as $tweet){
    echo "$tweet<br><br>";
}
	

?>


