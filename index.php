<?php
//подключение базы данных
require_once "database.php";

//получение ресурсов
$resources = $_POST['resource'];

if(count($resources) == 1){
    //загрузка xml
    $xml = simplexml_load_file($resources[0]);

    //выбор параметров поста
    foreach($xml->channel->item as $item){
        $title[] = $item->title;
        $link[] = $item->link;
    };
    //слияние массивов
    $post = array_combine($title, $link);

    //создание запросов в бд
    foreach($post as $title=>$link){
        $sql[] = "INSERT INTO news (title, link) 
                            VALUES('{$title}', '{$link}')";
    };
    //запись в бд
    for ($i=0; $i <count($sql) ; $i++) { 
        $results[] = $connect->query($sql[$i]);
    };
    $connect->close();
    
    if($results[0] == true){
        @header("Location: news.php");
    }
}else{
    foreach($resources as $key=>$value){
        
        $xml = simplexml_load_file($value);

        foreach($xml->channel->item as $item){
            $title[] = $item->title;
            $link[] = $item->link;
        }
        $post = array_combine($title, $link);

        //создание запросов в бд
        foreach($post as $title=>$link){
            $sql[] = "INSERT INTO news (title, link) 
                                VALUES('{$title}', '{$link}')";
        };
        //запись в бд
        for ($i=0; $i <count($sql) ; $i++) { 
            $results[] = $connect->query($sql[$i]);
        };
        $connect->close();
        
        if($results[0] == true){
            @header("Location: news.php");
        }
    }
    
}


// echo "<pre>";
// print_r($resources);
// echo "</pre>";

