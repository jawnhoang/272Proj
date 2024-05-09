
<?php
function OpenCon(){
	$servername = "localhost";
	$username = "wjymfdmy_jswplat";
	$password = "Khoa.bluehost123";
	$db = "wjymfdmy_WPR7U";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: %s\n". $conn->error);
	return $conn;
}
function CloseCon($conn){
    $conn -> close();
}
?>