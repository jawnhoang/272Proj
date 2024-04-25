
<?php
function OpenCon(){
    $servername = "127.0.0.1";
    $username = "root";
    $password = "Khoa.mysql123";
    $db = "wjymfdmy_WPR7U";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: %s\n". $conn->error);
    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}

?>