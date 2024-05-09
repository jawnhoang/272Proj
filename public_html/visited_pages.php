<?php include 'header.php'; ?>
<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/visited.css">
        <link rel="stylesheet" href="src/css/style.css">
        <title>JH Kits</title>
    </header>
    <body>
        <div class = 'cardrow' id='pcard'>
            <div class="infocard">
                <h1 class="card_title">Pages Visted</h1>
                <?php if(isset($_COOKIE['pages'])) {
                ?>
                <div class="text-center bg-light py-4">
                    
                    <?php $array = explode(", ", $_COOKIE['pages']);
                foreach($array as $a) {
                    echo $a."<br>";
                } ?>
                </div>
            <?php } else {
                echo "
                <div class='text-center bg-light py-4'>
                    <h4>No Cookies Set</h4>
                </div>    
                ";
            }
            ?>
            </div>
        </div>

    </body>

<?php include 'footer.php';?>
</html>