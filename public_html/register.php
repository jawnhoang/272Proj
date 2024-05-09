<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/register.css">
        <title>Register User</title>
        <?php include("header.php"); ?>
    </header>
    <body>
        <div class = 'cardrow'>
            <div class ='infocard'>
                
                <h1 id='form-header'>Register User</h1>
                <form class='registerform' action="register_proc.php" method="post">
                    <input type="text" id="fname" name="firstName" placeholder="First Name" oninput="this.value = capitalizeFirstLetter(this.value)"><br><br>
                    <input type="text" id="lname" name="lastName" placeholder="Last Name" oninput="this.value = capitalizeFirstLetter(this.value)"><br><br>
                    <input type="text" id="email" name="email" placeholder="Email"><br><br>
                    <input type="text" id="password" name="password" placeholder="Password"><br><br>
                    <input type="text" id="home_addr" name="home_addr" placeholder="Home Address"><br><br>
                    <input type="text" id="home_phone" name="home_phone" placeholder="Home Phone #"><br><br>
                    <input type="text" id="cell_phone" name="cell_phone" placeholder="Cell Phone #"><br><br>
                    <input type='submit' id = 'submitButton' name='login'>
                </form>
            </div>
        </div>
    </body>


    <script>
        // JavaScript function to auto-capitalize the first letter of input
        function capitalizeFirstLetter(input) {
            return input.charAt(0).toUpperCase() + input.slice(1);
        }

        // JavaScript function to mask password with dots
        function maskPassword() {
            var passwordInput = document.getElementById("password");
            var maskedPassword = "";
            for (var i = 0; i < passwordInput.value.length; i++) {
                maskedPassword += "•"; // Replace each character with a dot
            }
            passwordInput.value = maskedPassword;
        }
    </script>
    <?php include 'footer.php';?>
</html>