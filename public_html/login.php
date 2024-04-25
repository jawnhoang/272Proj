<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/login.css">
        <title>Log in</title>
        <?php include("header.php"); ?>
    </header>
    <body>
        <div class = 'cardrow'>
            <div class ='infocard'>
                
                <h1 id='form-header'>Log In</h1>
                <!-- <form class='loginform' action="auth.php" method="post">
                    <input type="text" id="uname" name="username" placeholder="Username"><br><br>
                    <input type="text" id="pass" name="password" placeholder="Password"><br><br>
                    <input type='submit' id = 'submitButton' name='login'>
                </form> -->
                <form class='loginform' action="login_proc.php" method="post">
                    <input type="text" id="email" name="email" placeholder="Email"><br><br>
                    <input type="password" id="password" name="password" placeholder="Password"><br><br>
                    <input type='submit' id = 'submitButton' name='login'>
                </form>
            </div>

        </div>
    </body>
    <?php include 'footer.php';?>
</html>