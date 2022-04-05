<?
$conn = mysqli_connect("localhost", "root", "111111", "yunha");
// mysqli_query($conn, "insert into topic_2(title,contents,date,author) value ('mysql','mysql is...',NOW(),'yun')");
$sql = "inser into topic_2(title,contents,date,author) value ('mysql','mysql is...',NOW(),'yun')";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
}

?>