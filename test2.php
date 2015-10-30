<?php
    $timestamp = time();
    $test = md5("pas"+"$timestamp");
echo $test;
echo "<br />";
echo $timestamp;