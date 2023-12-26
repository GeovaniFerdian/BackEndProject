<?php
$servername = "tomohon";
$username = "nazz7425_ila";
$password = "kirisaki435";
$dbname = "nazz7425_ila";

$connect = mysqli_connect($servername, $username, $password, $database);

    if(mysqli_connect_errno()){
        echo "Gagal connect dengan database" . mysqli_connect_errno();
    }

    //tangkap data yang dikirim android
     $username = $_POST["post_username"];
     $password = $_POST["post_password"];

     //proses periksa email dan password di  database
     $query = "SELECT * FROM user where username='$username' AND password='$password'";
     $obj_query = mysqli_query($connect, $query);
     $data = mysqli_fetch_assoc($obj_query);

     //periksa  apakah login sudah benar
     if ($data){
        echo json_encode(
            array(
                'response' => true,
                //"id" => $data["id"],
                'payload' => array(
                    "username" => $data["username"],
                    "password" => $data["password"],
            
                )
            )
        );
     } else  {
        echo json_encode(
            array(
                'response' => false,
                'payload' => null,
                "error" => "User not found"
            )
        );
     }

     //mengatur tampilan json
     header('Content-Type: application/json');