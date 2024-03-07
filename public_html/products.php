<?php include 'header.php'; ?>
<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/products.css">
        <link rel="stylesheet" href="src/css/style.css">
        <title>JH Kits</title>
    </header>
    <body>
        <div class = 'cardrow' id='pcard'>
            <div class = 'infocard'>
                <div class="button_filter">
                    <form method="get" class='button_form'>
                            <input id="submit" type="submit" name="ALL" value="ALL" />
                            <input id="submit" type="submit" name="HG" value="HG"   />
                            <input id="submit" type="submit" name="RG" value="RG"   />
                            <input id="submit" type="submit" name="MG" value="MG"   />
                            <input id="submit" type="submit" name="PG" value="PG"   />
                    </form>
                    <?php 
                    $itemArr = array();
                    if (isset($_GET['HG'])){
                        echo "Showing High Grade Models";
                        $itemVar = 'id704';
                        // insert code to load all models of grade
                    } 
                    elseif (isset($_GET["RG"])){
                        echo "Showing Real Grade Models";
                        $itemVar = 'id354235';
                    }
                    elseif (isset($_GET["MG"])){
                        echo "Showing Master Grade Models";
                        $itemVar = 'id577645';
                    }
                    elseif (isset($_GET["PG"])){
                        echo "Showing Perfect Grade Models";
                        $itemVar = 'id3787568';
                    }
                    elseif (isset($_GET["ALL"])){
                        echo "Showing all Grades";
                        $itemArr = array('id9085145', 'id3787568', 'id577645', 'id354235', 'id704');
                    }
                    else{
                        echo "Showing all Grades";
                        $itemArr = array('id9085145', 'id3787568', 'id577645', 'id354235', 'id704');
                    }
                    ?>
                </div>
                <div class='item_showcase'>
                    <?php 
                    if (!empty($itemArr)){
                        echo implode (" , ", $itemArr);
                    }else{
                        echo $itemVar;
                    }
                    ?>
                </div>
                

            </div>
        </div>
    </body>

<?php include 'footer.php';?>
</html>