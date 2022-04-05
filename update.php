<?
$conn = mysqli_connect('localhost', 'root', '111111', 'yunha');

$sql = "select * from topic_2";
$result = mysqli_query($conn,$sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    // <li><a href=\"index.php?id=8\">PHP title1</a></li>
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
    'title'=>'Welcome',
    'author'=>'',
    'date'=>'',
    'contents'=>'hello~~'
);

$update_link = '';

if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from topic_2 where id = {$filtered_id}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $article = array(
        'title'=>$row['title'],
        'author'=>$row['author'],
        'date'=>$row['date'],
        'contents'=>htmlspecialchars($row['contents'])
    );

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="index.php">WEB PHP&SQL</a></h1>
    <ol>
        <?= $list?>
    </ol>
    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name="author" placeholder="author" value="<?=$article['author']?>"></p>
        <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
        <p><textarea name="contents" cols="30" rows="10" placeholder="contents"><?=$article['contents']?></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>
</html>