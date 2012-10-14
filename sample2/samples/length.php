<?php
/**
 * Order latest tweets by length
 */

//Load configuration
include 'conf.php';

//Load twitter class
include '../tweets.php';


$tweets = new tweets();
$tweets->setUser(TWITTER_USERNAME);
$tweets->setNumTweets(TWITTER_NUM_TWEETS);
$tweets->setIncludeRetweets(TWITTER_INCLUDE_RETWEETS);
$tweets->setOrderDir('desc');
$res = $tweets->getTweetsByLength();

//display tweets
foreach ($res as $tweet){
    echo "$tweet<br><br>";
}
	

?>


