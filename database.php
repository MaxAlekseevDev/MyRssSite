<?php

$databaseName = "rss_news";
$databaseUser = "root";
$databasePassword = "";
$databaseHost = "127.0.0.1";

$connect = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

if(!$connect) {
    echo "Ошибка соединения " . $connect->connect_errno;
}

$connect->set_charset("utf8");
global $connect;