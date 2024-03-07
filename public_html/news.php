<?php include 'header.php'; ?>
<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/news.css">
        <link rel="stylesheet" href="src/css/style.css">
        <title>JH Kits News</title>
    </header>
    <body>
        <div class="cardrow" id="news-card">
            <div class="infocard">
                <h1 class='news-header'>
                    News and Updates
                </h1>
                <div class = 'news_card'>
                    <p id='php-read-news-file'>
                        <?php
                        $myfile = fopen("news.txt", "r");
                            if($myfile == false){
                                echo "Error in accessing Contact information";
                            }
                        $filetxt = fread($myfile,filesize("news.txt"));
                        echo nl2br($filetxt);
                        fclose($myfile); 
                        ?>
                    </p>
                </div>

            </div>
        </div>
    </body>
    <?php include 'footer.php';?>
</html>