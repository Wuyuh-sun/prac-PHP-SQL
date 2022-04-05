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
$delete_link = '';
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
    $delete_link = '
        <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            <input type="submit" value="delete">
        </form>
    ';
    
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
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
    <span><strong>author:</strong> <?=$article['author']?></span> <span><strong>date:</strong> <?=$article['date']?></span>
    <p><?=$article['contents']?></p>
</body>
</html>