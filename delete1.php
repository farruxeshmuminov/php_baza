<?php
// qaysi id li yozuvni tahrirlashni aniqlab olish
$id = $_GET['nomer'];

$conn = mysqli_connect("localhost","root","","dars");


$qush = $conn->query("DELETE FROM talaba WHERE id = '$id'");

if ($qush->connect_error) die("ma'lumotlar o'chirilmadi ".$qush->connect_error);
else {
	echo "ma'lumotlar o'chirildi"; include_once('delete.php');
}
?>