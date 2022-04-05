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
    <form action="process_create.php" method="POST">
        <p><input type="text" name="author" placeholder="author"></p>
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="contents" id="" cols="30" rows="10" placeholder="contents"></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>
</html>