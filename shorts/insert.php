<?php
    session_start();

    include_once('config.php');

    if (isset($_POST['submit'])) {
        $url=mysqli_real_escape_string($conn,$_POST['url']);
        $date=date('d-m-Y');

        $n=3;
        $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $n; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }

        $insert="INSERT INTO `url`(`url`, `token`, `date`) VALUES ('$url','$token','$date')";

        $result=mysqli_query($conn,$insert);

        if($result){
            $_SESSION['text']="Your link Has beed Shorted.";
            $_SESSION['icon']="success";
            $_SESSION['url']=$token;
            $_SESSION['link']=$url;
            header('Location: short');
        }else{
            $_SESSION['text']="Something went wrong.";
            $_SESSION['icon']="error";
            header('Location: home');
        }
    }else{
        header('Location: home');
    }
?>