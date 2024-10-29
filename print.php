<?php
//ushbu faylni baza bilan bog'lash
$conn = mysqli_connect("localhost","root","","dars");
//so'rov asosida jadvaldan yozuvlarni ajratib olish
$tanla = $conn->query("SELECT * FROM talaba");
// ma’lumotlarni jadvalda chop etish
echo "<table border=2 width=\"100%\">
 <tr bgcolor=\"red\"> 
 	<th width=\"10%\">	Id 	</th>
 	 <th width=\"30%\">	Familiya </th>
 	<th width=\"10%\">	Ism	</th>
	<th width=\"20%\">	Rasm </th>
</tr>";


// jadvaldagi yozuvlarni $satr massiviga taminlash va ularni chop etish
while ($satr = $tanla->fetch_row()) {
	echo 
	"<tr>
	     <td>".$satr["0"]."</td> 
	     <td>".$satr["1"]."</td> 
	     <td>".$satr["2"]."</td> 

		<td>
    		<img src='upload/".$satr['3']."' alt='' width='170' height='200' >
		</td>
	</tr>";
	}
	echo "</table>";
?>
