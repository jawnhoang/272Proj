<?php include 'header.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="src/css/hub.css">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Market Hub</title>
</head>
<div class="cardrow" id="main-page-card">
        <div class="infocard">
            <h1 class = 'hub-header'>
                Partner Sites Hub
            </h1>
            <div class = 'hub_card' >
                <h2 class='hub_card_header'>
                    Next
                </h2>
                <div class = 'site_row'>
                    <div class='image'>
                        <img id = 'site_pic' src='src\images\image.png'>
                    </div>
                    <div class='site_users'>
                        <p>Site Users</p>
                        <?php
                        $ch = curl_init("https://coursework-272-ed6fb0eee728.herokuapp.com/contact.txt");
                        $fp = fopen("next_info.txt", "w");
                        curl_setopt($ch, CURLOPT_FILE, $fp);
                        curl_setopt($ch, CURLOPT_HEADER, 0);

                        curl_exec($ch);
                        curl_close($ch);
                        fclose($fp);
                        $myfile = fopen("next_info.txt", "r");
                            if($myfile == false){
                                echo "Error in accessing Contact information";
                            }
                        $filetxt = fread($myfile,filesize("next_info.txt"));
                        echo nl2br($filetxt);
                        fclose($myfile)
                            ?>
                    </div>
                </div>
                <a href="https://coursework-272-ed6fb0eee728.herokuapp.com" id='link'>Visit Next</a> 
            </div>


        </div>
</div>




<?php include 'footer.php';?>
</html>