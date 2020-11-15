<?php
    // Getting value post parameters
    $room = $_POST['room'];
    //  Checking size of parameters
    if(strlen($room) > 20 or strlen($room) < 2)
    {
        $message = "Please choose a name between 2 to 20 characters";
        echo " <script> language = 'javascript'> alert('$message'); window.location = 'http://localhost/chatroom'; </script>";

    }
    // Checking whether room name is aplhanumeric
    else if(!ctype_alnum($room))
    {
        $message = "Please choose an alphanumeric roomname";
        echo " <script> language = 'javascript'> alert('$message'); window.location = 'http://localhost/chatroom'; </script>";

    }
    else{
        include 'db_connect.php';
    }
    // Checking room already exists
    $sql = " SELECT * FROM  rooms WHERE roomname = '$room'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            $message = "Please choose different roomname. This is already taken.";
            echo " <script> language = 'javascript'> alert('$message'); window.location = 'http://localhost/chatroom'; </script>";

        }
        else
        {
            $sql = "INSERT INTO `rooms` (`roomname`) VALUES ( '$room')";
            if(mysqli_query($conn,$sql))
            {
                $message = "Your room is ready, you can chat now ...";
                echo " <script> language = 'javascript'> alert('$message'); window.location = 'http://localhost/chatroom/rooms.php?roomname=$room'; </script>";
    
            }
        }
    }

?>