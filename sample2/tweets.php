<?php

class tweets {
    
    //username who we get the feeds
    protected $user;
    
    //num tweets that we get
    protected $numTweets = 20;
    
    //include retweets
    protected $includeRetweets = false;    
    
    //order direction
    protected $dir = 'desc';
    
    //array of hashtags
    protected $hashtags = array();
    
    //filters
    //only if contains links
    protected $withLinks = false;
    
    //only if contains hashtags
    protected $withHashtags = false;
    
    /**
     * The user who we will get the tweets
     * @param string $user
     */
    public function setUser($user){
        $this->user = $user;
    }
    
    
    /**
     * Include retweets on getting tweets. If true, retweets will included
     * @param boolean $includeRetweets
     */
    public function setIncludeRetweets($includeRetweets){
        $this->includeRetweets = $includeRetweets;
    }
    
    /**
     * Set num of tweets to get
     * @param integer $num
     */
    public function setNumTweets($num){
        $this->numTweets = $num;
    }
    
    /**
     * Set direction order
     * @param string $dir
     */
    public function setOrderDir($dir){
        $this->dir = $dir;
    }
    
    /**
     * Filter tweets that only have links
     * @param boolean $with
     */
    public function setWithLinks($with){
        $this->withLinks = $with;
    }
    
    /**
     * Filter tweets that only have links
     * @param boolean $with
     */
    public function setWithHashtags($with){
        $this->withHashtags = $with;
    }
    
    
    /**
     * Get latest tweets of the defined user
     * @return array Array of tweets
     */
    public function getTweets(){
       
        //check if a user has been set. if not launch an error.
        if (empty($this->user)){
           throw new Exception('No username defined. Define with setUser() method.');
           return;
        }    
        
        $url = "https://api.twitter.com/1/statuses/user_timeline.xml?include_entities=true&include_rts={$this->includeRetweets}&screen_name={$this->user}&count={$this->numTweets}";
        
        $response = new SimpleXMLElement($url, NULL, TRUE); 

        $tweets = array();       
        
        foreach ($response->status as $tweet){        
           
            //Get links          
            preg_match_all('/https?\:\/\/[^\" ]+/i', $tweet->text, $matches);            
            if ($this->withLinks && (count($matches[0])<=0) ) continue;
            
            //get hashtags            
            preg_match_all("/#(\\w+)/", $tweet->text, $matches);      
            
            //add hashtags to array
            foreach ($matches[0] as $hashtag){
                if (!in_array($hashtag, $this->hashtags)){
                    $this->hashtags[] = $hashtag;
                }
            }
            
            if ($this->withHashtags && (count($matches[0])<=0) ) continue;
            
            $tweets[] = utf8_decode($tweet->text);           
        }
        
        if ($this->dir == 'asc') $tweets = array_reverse($tweets);
       
        return $tweets;
    }
    
    /**
     * Returns an array of all used hashtags. You must call before getTweets to collect hashtags
     * @return array Array of hashtags
     * 
     */
    public function getHashtags(){
        return $this->hashtags;
    }
    
    
    
    /**
     * Gets tweets ordering them by its length
     * @return array Array of tweets
     */
    public function getTweetsByLength(){
        $tweets = $this->getTweets();
        
        $tweetsL = array();
        
        foreach($tweets as $tweet){
            $length = strlen($tweet);  
            $tweetsL[$length] = $tweet;            
        }
        
        if ($this->dir == 'asc'){
            ksort($tweetsL);
        }  else {
            krsort($tweetsL);
        }
        
        return $tweetsL;
    }       
}
