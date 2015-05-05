<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("/var/www/Sentiment_Analysis/TweetDataGenerator.php");
require_once("/var/www/Sentiment_Analysis/TweetSanitizer.php");
require_once("/var/www/Sentiment_Analysis/Dictionary.php");
require_once("/var/www/Sentiment_Analysis/config.php");

$dictionary = array();
$tweet_sanitizer = new TweetSanitizer();
$tweet_data_generator = new TweetDataGenerator(get_oauth_settings());
$dictionary_inst = new Dictionary();

$tweets = $tweet_sanitizer->file_read_tokenize_sanitize("/home/pi/twitter_data.txt", "~~~~");
$dictionary = $dictionary_inst->read_LSD_dictionary("/var/www/Sentiment_Analysis/dictionary/LSD2011.txt", " ", "\n", "*");

$out = $tweet_data_generator->timeline_tweets_to_db("test", "Sethrogen", "~~~~");

echo "<pre>";
print_r($out);