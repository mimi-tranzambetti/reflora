<?php
    session_start();
    $db = new mysqli(
        "acad.itpwebdev.com",
        halpan,
        Pleasejustletmein4726,
        "halpan_reflora");
	$msg = "";

//	$path = $_Server[DOCUMENT_ROOT] . "/ScheduleSearch/images/" . $_FILES[image][name];
//    move_uploaded_file($_FILES['image']['tmp_name']


	if (isset($_POST['upload'])) {
            $target = "../images/".basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
            $userid= $_SESSION['userid'];
            $date = date("c");
            $sql = "INSERT INTO images (image, user_id, date_created) VALUES ('$image','$userid','$date')";
            mysqli_query($db, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
                $_SESSION["imageuploaded"] = "yes";
            }else{
                $msg = "Failed to upload image";
                $_SESSION["imageuploaded"] = "no";

            }

    }
    $sql2 = "SELECT * FROM images WHERE user_id = '" .$_SESSION['userid'] ."'";
    $result = mysqli_query($db, $sql2);
?>