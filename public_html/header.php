<!DOCTYPE>
<html>
        <meta charset="UTF-8">
        <link rel='stylesheet' href="src/css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav class ='nav' id='navbar'>
            <a href="index.php">Home</a> 
            <a href="about.php">About</a> 
            <a href="products.php">Products</a> 
            <a href="news.php">News</a> 
            <a href="contact.php">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="navDropDown();">
                <i class="fa fa-bars"></i>
            </a>
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