<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/contact.css">
        <title>Contact JH Kits</title>
        <?php include 'header.php'; ?>
    </header>
    <body>
        <div class="card" id="contactcard">
            <div class="ccard">
                <h1 class="contact-header">
                    Contact Us At:
                </h1>
                <p>
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
