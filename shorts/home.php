<?php

    include_once('config.php');

    $url=$_SERVER['REQUEST_URI'];
    $url=explode('/',$url);
    $url=$url[count($url)-1];

    if($url){
        $web=mysqli_real_escape_string($conn,$url);
        $select1="SELECT * FROM `url` WHERE token='$web'";
            $result1=mysqli_query($conn,$select1);
            if(mysqli_num_rows($result1)>0){
                foreach ($result1 as $row1) {
                    $find=$row1['token'];
                }
            }
        if($find==$web){
            $select="SELECT * FROM `url` WHERE token='$web'";
            $result=mysqli_query($conn,$select);
            $row=mysqli_fetch_assoc($result);
            $ct=mysqli_num_rows($result);
            if($ct>0){
                $link=$row['url'];
                mysqli_query($conn,"UPDATE `url` SET `count`=count+1 WHERE token='$web'");
                header('location:'.$link);
                die();
            }
        }else{
            header('location: index');
        }
    }else{
        header('location: index');
    }
?>