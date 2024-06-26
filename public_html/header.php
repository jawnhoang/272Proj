<?php
session_start();
?>
<!DOCTYPE>
<html>
        <meta charset="UTF-8">
        <link rel='stylesheet' href="src/css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav class ='nav' id='navbar'>
            <a aria-current="page" href="index.php">Home</a> 
            <a aria-current="page" href="about.php">About</a> 
            <a aria-current="page" href="products.php">Products</a> 
            <a aria-current="page" href="news.php">News</a> 
            <a aria-current="page" href="contact.php">Contact</a>
            <?php
            if(!isset($_SESSION['email']))
                echo "<a id='login' href=\"login.php\">Login</a>
                      <a id='register' href=\"register.php\">Register</a>";

            if(isset($_SESSION['email']))
                echo "<a id='logout' href=\"logout.php\">Logout</a>"; 
            ?>

            <a href="javascript:void(0);" class="icon" onclick="navDropDown();">
                <i class="fa fa-bars"></i>
            </a>

            <a aria-current="page" href="hub.php">Hub</a>
            <a aria-current="page" href="users.php">Users</a>
            <a aria-current="page" href="visited_pages.php">History</a>
            <!-- <?php echo $_SESSION['email']?> -->


        </nav>
    <script>
          /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
          function navDropDown() {
            var x = document.getElementById("navbar");
            if (x.className === "nav") {
              x.className += " responsive";
            } else {
              x.className = "nav";
            }
          }
    </script>
</html>