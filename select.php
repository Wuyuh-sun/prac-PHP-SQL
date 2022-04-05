<?
$conn = mysqli_connect('localhost', 'root', '111111', 'yunha');

// 1 row
echo "<h1>single row</h1>";
$sql = "select * from topic_2 where id = 8";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h2>'.$row['title'].'</h2>'.'<h4>'.$row['date'].'</h4>';
echo '<h3>'.$row['author'].'</h3>';
echo $row['contents'];

// all row
echo "<h1>multi row</h1>";
$sql = "select * from topic_2";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    echo '<h2>'.$row['title'].'</h2>'.'<h4>'.$row['date'].'</h4>';
    echo '<h3>'.$row['author'].'</h3>';
    echo $row['contents'];
}

?>