<?php
// qaysi id li yozuvni tahrirlashni aniqlab olish
$id = $_GET["nomer"];

//ushbu faylni baza bilan bog'lash
$conn = mysqli_connect("localhost","root","","dars");

// id si $id dagi qiymatga teng bo'lgan yozuvni ajratib olish
$tanla = $conn->query("SELECT *  FROM talaba 
					WHERE id = '$id' ");

//jadvaldan ajratilgan yozuvni natija nomli massivga o'tkazish
$natija = $tanla->fetch_row();
// massiv elementlarini formaga darchalariga chiqarish
echo " <form action=\"edit2.php\" method=\"post\" enctype='multipart/form-data'>

	<label> Familiyani o'zgartiring </label>
	<input type=\"text\" name=\"fam\" value='$natija[1]'>
	<br><br>

	<label> Ismni o'zgartiring </label>
	<input type=\"text\" name=\"ism\" value='$natija[2]'>
	<br><br>

	<label> Rasmni o'zgartiring </label>
	<input type=\"file\" name=\"rasm\" accept=\".jpg\" value='$natija[3]'>
	<br><br>

	<input type=\"hidden\" name=\"id\" value='$id'>
	
	<input type=\"submit\" value=\"Tahrirla\">
	
	</form>"
?>
