<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/search.css">
        <title>Users</title>
        <?php include("header.php"); ?>
    <?php
            //include db connection
            include 'db_connection.php';

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                // Get the search query from the form
                $search_query = $_GET['search'];

                //obtain connection
                $conn = OpenCon();

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL statement to search for matching records
                $sql = "SELECT * FROM users WHERE first_name LIKE ?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Error: " . $conn->error);
                }
                $search_param = "%" . $search_query . "%";
                $stmt->bind_param("s", $search_param);
                $stmt->execute();
                $result = $stmt->get_result();

                // Display search results
                if ($result->num_rows > 0) {
                    // echo "<h2>Search Results</h2>";
                    while ($row = $result->fetch_assoc()) {
                        generateName($row);
                        // header("Location: search.php?error=no_users_returned");
                        // // Output desired information from each matching record
                        // echo "First Name: " . $row["first_name"] . "<br>";
                        // echo "Last Name: " . $row["last_name"] . "<br>";
                        // echo "Email: " . $row["email"] . "<br>";
                        // echo "Home Phone: " . $row["home_phone"] . "<br>";
                        // // Add more fields as needed
                        // echo "<hr>";
                    }
                } else {
                    header("Location: search.php?error=no_users_returned");
                    // Close connection
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }

            function generateName($row){
                print('<div class="cardrow" id="contactcard">
                            <div class="infocard">
                                <h2 class="admin-list-header">
                                    User:
                                </h2>
                                <p id=\"users\">');
                    echo "First Name: " . $row["first_name"] . "<br>";
                    echo "Last Name: " . $row["last_name"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    echo "Home Phone: " . $row["home_phone"] . "<br>";   
                print('</p></div></div>');
            }
            ?>
                </header>
<?php include 'footer.php';?>
</html>