<?php
/**
 * Get hashtags used in user's tweets
 */

//Load configuration
include 'conf.php';

//Load twitter class
include '../tweets.php';


$tweets = new tweets();
$tweets->setUser(TWITTER_USERNAME);
$tweets->setIncludeRetweets(TWITTER_INCLUDE_RETWEETS);
$tweets->getTweets();
$hashtags = $tweets->getHashtags();

//display tweets
foreach ($hashtags as $tag){
    echo "$tag<br><br>";
}
	

?>


