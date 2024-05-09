<?php
//include db connection
// include 'db_connection.php';
// // Start the session
// session_start();
function OpenCon(){
    $servername = "localhost";
    // $username = "wjymfdmy_jswplat";
    $username = "root";
    // $password = "Khoa.bluehost123";
    $password = "Khoa.mysql123";
    $db = "wjymfdmy_WPR7U";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: %s\n". $conn->error);
    return $conn;
}

function CloseCon($conn){
    $conn -> close();
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    // $email = 'mikegray@gmail.com';
    // $password = 'password';

    //obtain connection
    $conn = OpenCon();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user from database
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and verify password
    //REVISIT WHY PASSWORD_VERIFY NOT WORKING!!!!!!
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Password is correct, start session and redirect to home page
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            $stmt->close();
            $conn->close();
            exit();
        } else {
            // Invalid password
            header("Location: login.php?error=invalid_password");
            // Close connection
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        // User does not exist
        header("Location: login.php?error=user_not_found");
        // Close connection
        $stmt->close();
        $conn->close();
        exit();
    }

}
?>