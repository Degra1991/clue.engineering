<?php

// notablog.php (C) 2018 by @clue
//
// thank you Gistlog, you're awesome! <3
$url = 'https://gistlog.co/clue/8698d44e489927f9988b2a27e53d9189';
$ret = @file_get_contents($url);
if ($ret === false) {
    header(' ', false, 500);
    die('internal server error, please try again later.');
}

// remove unneeded navigation bar
$ret = preg_replace('#<nav.*>.*</nav>#is', '<br />', $ret);

// replace all root links with text
$ret = preg_replace('#<a href="?/[^>]*>(.*?)</a>#is', '$1', $ret);

// simplify title attribute
$ret = preg_replace('#<title.*>([^\|]+).*</title>#i', '<title>$1</title>', $ret);

// rewrite og:url to canonical target
$ret = str_replace($url, 'https://www.lueck.tv/2018/hello-world', $ret);

echo $ret;
