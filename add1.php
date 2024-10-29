<?php
    $link=new mysqli('localhost','root','','dars');

    if($link_>mysqli_connect_errno){
        echo "Ma'lumotlar bazasiga ulanmadi.".$link->connect_errno;
        exit;
    }

    $a=$_POST['fam'];
    $b=$_POST['ism'];

    $oxirgi = $link->query("SELECT id FROM talaba ORDER BY id DESC LIMIT 1"); 

    $satr = $oxirgi->fetch_row();

    if($_FILES['rasm']['error']) {
        echo "fayl yuklanmadi. Xatolik kodi:". $_FILES['rasm']['error'];}
    else {
        $name = $_FILES['rasm']['name'];
        $tmp = $_FILES['rasm']['tmp_name'];
        $file_info = pathinfo($name);
        $file_extension = $file_info['extension'];
        $new_name = 1+$satr[0]."_f_new.".$file_extension;
        $yul = "upload/".$new_name;
        move_uploaded_file($tmp, $yul);

        if(isset($a) && isset($b) &&isset($new_name)){
            $surov = $link->query("INSERT INTO talaba (fam, ism, fayl)VALUES('$a', '$b', '$new_name')");
            if ($surov){ 
                echo "Qo'shildi"; } 
            else {
                echo "Xatolik yuzberdi. Xatolik kodi: ".$link->errno.".Sababi : ".$link->error;
            }
        }
        else {   echo "ma'lumotlar to'liq emas";}
    }    
?>