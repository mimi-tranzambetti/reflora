<?php
    session_start();
    $db = new mysqli(
        "acad.itpwebdev.com",
        halpan,
        Pleasejustletmein4726,
        "halpan_reflora");
	$msg = "";

	if (isset($_POST['upload'])) {

            $target = "images/".basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
            $user_id= $_SESSION['user_id'];
            $date = date("c");
            $sql = "INSERT INTO images (image, user_id, date_created) VALUES ('$image','$user_id','$date')";
            mysqli_query($db, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
        }

    }
    $sql2 = "SELECT * FROM images WHERE user_id = '" .$user_id ."'";
    $result = mysqli_query($db, $sql2);
?>