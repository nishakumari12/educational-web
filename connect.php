<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(name, email, number)
                                values(?, ?, ?)");
        $stmt->bind_param("ssi",$name,$email,$number);
        $stmt->execute();
        echo "registration successfully...";
        $stmt->close();
        $conn->close();
    }
?>