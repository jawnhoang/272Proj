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
                            <input id="submit" type="submit" name="MGSD" value="MGSD"   />
                    </form>
                    <?php 
                    function OpenCon(){
                        $servername = "localhost";
                        // $username = "wjymfdmy_jswplat";
                        $username = "root";
                        // $password = "Khoa.bluehost123";
                        $password = "Khoa.mysql123";
                            $db = "wjymfdmy_WPR7U";
                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: %s\n". $conn->error);
                            return $conn;
                        }
                        
                    function CloseCon($conn){
                        $conn -> close();
                    }

                    function fetchItem($itemType){
                        $conn = OpenCon();
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql="";
                        if($itemType == '*'){
                            $sql = "SELECT * FROM products";
                            $stmt = $conn->prepare($sql);
                        if (!$stmt) {
                            die("Error: " . $conn->error);
                        }
                        $stmt->execute();
                        }else{
                            $sql = "SELECT * FROM products WHERE meta_title LIKE ?";
                            $stmt = $conn->prepare($sql);
                        if (!$stmt) {
                            die("Error: " . $conn->error);
                        }
                        $search_param = "%" . $itemType . "%";
                        $stmt->bind_param("s", $search_param);
                        $stmt->execute();
                        }
                        
                        $result = $stmt->get_result();
                        return $result;
                    }

                    $itemArr = array();
                    if (isset($_GET['HG'])){
                        echo "Showing High Grade Models";
                        $itemVar = 'id704';
                        $itemType = 'HG';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                        
                        // insert code to load all models of grade
                    } 
                    elseif (isset($_GET["RG"])){
                        echo "Showing Real Grade Models";
                        $itemVar = 'id354235';
                        $itemType = 'RG';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                    }
                    elseif (isset($_GET["MG"])){
                        echo "Showing Master Grade Models";
                        $itemVar = 'id577645';
                        $itemType = 'MG';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                    }
                    elseif (isset($_GET["PG"])){
                        echo "Showing Perfect Grade Models";
                        $itemVar = 'id3787568';
                        $itemType = 'PG';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                    }
                    elseif (isset($_GET["ALL"])){
                        echo "Showing all Grades";
                        $itemArr = array('id9085145', 'id3787568', 'id577645', 'id354235', 'id704', 'id32432425');
                        $itemType = '*';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                    }
                    elseif (isset($_GET["MGSD"])){
                        echo "Showing all Master Grade SD";
                        $itemVar = 'id32432425';
                        $itemType = 'MGSD';
                        $result = fetchItem($itemType);                
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                generateName($row);
                            }
                        }else{
                            print("<p>No Products Found</p>");
                        }
                    }
                    else{
                        echo "Showing all Grades";
                        $itemArr = array('id9085145', 'id3787568', 'id577645', 'id354235', 'id704');
                    }
                    ?>
                </div>
                <div class='item_showcase'>
                    <?php 
                    function generateName($row){
                        print('<div class="cardrow" id="contactcard">
                                    <div class="infocard">
                                        <p id=\"items\">');
                                        echo "Product Name: " . $row["name"] . "<br>";
                                        echo "Classification: " . $row["slug"] . "<br>";
                           echo '<div class=\'image\'>
                           <img id = \'site_pic\' src=products\\'.$row["image"] .'>
                       </div> <br>'; 
                        print('</p></div></div>');
                    }
                //     if (!empty($itemArr)){
                //         echo implode (" , ", $itemArr);
                //     }else{
                //         // if($result->num_rows > 0){
                //         //     while($row){
                //         //         echo $row['name'];
                //         //         echo $row['slug'];
                //         //         echo $row['image'];
                //         //     }

                //         // }
                //         print('<div class="cardrow" id="contactcard">
                //             <div class="infocard">
                //                 <h2 class="admin-list-header">
                //                     User:
                //                 </h2>
                //                 <p id=\"users\">');
                //     echo "Product Name: " . $row["name"] . "<br>";
                //     echo "Classification: " . $row["slug"] . "<br>";
                //     echo "Image: " . $row["image"] . "<br>"; 
                // print('</p></div></div>');
                //     }
                    ?>
                </div>
                

            </div>
        </div>
    </body>

<?php include 'footer.php';?>
</html>