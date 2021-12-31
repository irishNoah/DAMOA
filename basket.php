<?php 
include ('HTML/db_test.php');
SESSION_START();
// $session_id = session_id();
$num = $_POST["num"];
$sql = "SELECT * FROM item WHERE num='$num'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$count = $_POST["count"];
$sum = $count * $row["price"];
$image = $row["image"];
$brand = $row["brand"];
$product = $row["product"];
$price = $row["price"];
$grade = $row["grade"];
$category = $row["category"];
$id = $_SESSION['ID'];

$sql_image = image_CK("SELECT * from basket where image='$image'and session_id = '$id' ");  // sql문으로 입력된 id값을 선택하기 
$image_ck = $sql_image->fetch_array();
if($image_ck==0){ //중복되지 않을 시
    $sql = "INSERT into basket(session_id, image, brand, product, price, count, sum, grade, category)
        values('$id','$image','$brand','$product','$price','$count','$sum','$grade','$category')";
    $result = mysqli_query($db, $sql);
}else{
    $sql = "UPDATE basket set count = count + $count, sum = sum + $sum where image ='$image'";
    $result = mysqli_query($db, $sql);
}

?>

<script>
    location.href='main.php';
</script>