<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/auth.css">
        <?php 
            include("header.php");
            $file = fopen('login.txt', "r");
            extract ($_POST);
            if (!$username || !$password){
                fieldsBlank();
                die();
            }
            if (!$file){
                print('<title>Error</title></header><body>Could not access account information DB</body>');
                die();
            }else{
                $userVerified = 0;
                while(!feof($file) && !$userVerified){
                    $line = fgets($file,255);
                    $line = chop($line);
                    $field = preg_split("/,/", $line, 2);
                    if ($username == $field[0]){
                        $userVerified = 1;
                        if (checkPassword($password, $field) == true){
                            accessGranted();
                        }else{
                            wrongPassword();
                        }
                    }
                }
                fclose($file);
                
                if(!$userVerified){
                    accessDenied();
                }    
            }
    
            function checkPassword($userpassword, $filedata){
                if ($userpassword == $filedata[1]){
                    return true;
                }else{
                    return false;  
            }
        }
            function accessGranted(){
                print('<div class="cardrow" id="contactcard">
                <div class="infocard">
                    <h1 class="admin-list-header">
                        All Users:
                    </h1>
                    <p id=\"php-read-secret-file\">');

                        $myfile = fopen("secret.txt", "r");
                            if($myfile == false){
                                echo "Error in accessing user information";
                            }
                        $filetxt = fread($myfile,filesize("secret.txt"));
                        echo nl2br($filetxt);
                        fclose($myfile); 
                        
                print('</p></div></div>');
            }
            function accessDenied(){
                print('<title>Denied</title></head><body>Log in denied</body>');
            }
            function wrongPassword(){
                print('<title>Denied</title></head><body>Wrong Password</body>');
            }
            function fieldsBlank(){
                print('<title>Error</title></head><body>Please enter account information</body>');
            }
        ?>
    </header>
<?php include 'footer.php';?>
</html>