<?php
    //formada o'zgartirilgan ma'lumotlarni qabul qilib olish
    $fam    =  $_POST['fam'];
    $ism  =  $_POST['ism'];
    $id  =  $_POST['id'];

    //ushbu faylni baza bilan bog'lash
    $conn = mysqli_connect("localhost","root","","dars");
    //yozuvni o'zgartirish so'rovi

    if($conn_>mysqli_connect_errno){
        echo "Ma'lumotlar bazasiga ulanmadi.".$conn->connect_error;
        exit;
    } else {

        $r = $conn->query("SELECT fayl FROM talaba WHERE id = '$id'"); 

        $satr = $r->fetch_row();

        if($_FILES['rasm']['size'] == 0) {
           
            $qush = $conn->query("UPDATE talaba SET fam = '$fam', ism = '$ism' WHERE id = '$id'");

            if ($qush->connect_error) 
                die("ma'lumotlar tahrirlanmadi ".$qush->connect_error);
            else {
                echo "ma'lumotlar tahrirlandi";
            }

        } else {
            
            $name = $_FILES['rasm']['name'];
            $tmp = $_FILES['rasm']['tmp_name'];
            $file_info = pathinfo($name);
            $file_extension = $file_info['extension'];
            $new_name = $id."_f_edit.".$file_extension;

            $yul = "upload/".$new_name;
            
            $qush = $conn->query("UPDATE talaba SET fam = '$fam', ism = '$ism', fayl = '$new_name' WHERE id = '$id'");

            if ($qush->connect_error) 
                die("ma'lumotlar tahrirlanmadi ".$qush->connect_error);
            else {
                $fayl_nomi = 'upload/'. $satr[0];
                
                unlink($fayl_nomi);
                move_uploaded_file($tmp, $yul);
                echo "ma'lumotlar tahrirlandi"; include_once('edit.php');
            }
            
        }    

    }
?>