<?php
    require_once "database.php";

    $sqlForSelect = "SELECT * FROM news";
    $posts = $connect->query($sqlForSelect);
   

    while($rows = $posts->fetch_array(MYSQLI_ASSOC)){
        $post[] = $rows;
    }
    
    if($_GET['delete'] == 'all' && isset($_GET)){
        $sqlForDelete = "TRUNCATE TABLE news";
        $result = $connect->query($sqlForDelete);
        $connect->close();
        if($result){
            header("Location: index.html");
        }
    }
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Новости</title>
</head>
<body>
    <main class="container">
    <br>
    <a href="?delete=all" class="btn btn-danger">Очистить новости</a>
    <br/>
        <?php foreach($posts as $post):?>
            <a href="<?php echo $post['link']?>" class="btn btn-outline-info"  target="_blank" style="margin-top:5px;">
                <?php echo $post['title']?>
            </a><br/>
        <?php endforeach;?>
        <br/>
    </main>
    
        
    
</body>
</html>
