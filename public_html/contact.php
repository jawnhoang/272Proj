<?php include 'header.php'; ?>
<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/contact.css">
        <link rel="stylesheet" href="src/css/style.css">
        <title>Contact JH Kits</title>
    </header>
    <body>
        <div class="cardrow" id="contactcard">
            <div class="infocard">
                <h1 class="contact-header">
                    Contact Us At:
                </h1>
                <p id='php-read-contact-file'>
                    <?php
                    $myfile = fopen("jhkitcontacts.txt", "r");
                        if($myfile == false){
                            echo "Error in accessing Contact information";
                        }
                    $filetxt = fread($myfile,filesize("jhkitcontacts.txt"));
                    echo nl2br($filetxt);
                    fclose($myfile); 
                    ?>
                </p>
            </div>
        </div>
    </body>
</html>
