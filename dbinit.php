<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chatroom";
    
    
        $conn = mysqli_connect($servername,$username,$password,$database);
  
    
    
    if(!$conn) 
    {
         $conn = mysqli_connect($servername,$username,$password);
        $sql = 'CREATE DATABASE '.$database;
        mysqli_query($conn,$sql);
        $conn = mysqli_connect($servername,$username,$password,$database);
        if($conn)
        {
            echo "COnnected";
            $sql = 'CREATE TABLE '.$database.'.`rooms` ( `sno` INT NOT NULL AUTO_INCREMENT ,  `roomname` TEXT NOT NULL ,  `stime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno`)) ENGINE = InnoDB;';
            echo var_dump(mysqli_query($conn,$sql));
         
            $sql = 'CREATE TABLE '.$database.'.`msgs` ( `sno` INT NOT NULL AUTO_INCREMENT ,  `msg` TEXT NOT NULL ,  `room` TEXT NOT NULL ,  `ip` TEXT NOT NULL ,  `stime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno`)) ENGINE = InnoDB;';
            echo var_dump(mysqli_query($conn,$sql));
           
            
        }
    }
    mysqli_close($conn);

    
?>