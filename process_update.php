<?
// var_dump($_POST); //POST 받았는지 확인
$conn = mysqli_connect('localhost', 'root', '111111', 'yunha');

settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'contents'=>mysqli_real_escape_string($conn, $_POST['contents'])
);

$sql = "
    update topic_2 
        set
            title = '{$filtered['title']}',
            contents = '{$filtered['contents']}',
            date = NOW(),
            author = '{$_POST['author']}'
        where
            id = {$filtered['id']}
";


$result = mysqli_multi_query($conn, $sql);
if($result === false){
    echo '저장할때 문제 생김. 문의 ㄱㄱ';
    error_log(mysqli_error($conn));
} else {
    echo '수정 ㅊㅊ <a href = "index.php">돌아가기</a>';
}
?>