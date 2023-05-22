<?php
if (isset($_POST["submit"])){
    $file = $_FILES['file'];
    // print_r($file);
    $filename =$_FILES['file']['name'];
    $fileTmpname =$_FILES['file']['tmp_name'];
    $fileSize =$_FILES['file']['size'];
    $fileError =$_FILES['file']['error'];
    $fileType =$_FILES['file']['type']; 

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if ( in_array($fileActualExt, $allowed)){
        if ($fileError===0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file( $fileTmpname, $fileDestination);
                header("location: index.php?uploadsucess");
            } else {
                echo'you file is too big';
            }
        }else{
            echo'there was an erro uploading you file';
        }
    } else{
        echo' you cannot upload files of this type';
    }

}



