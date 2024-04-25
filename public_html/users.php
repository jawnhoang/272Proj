<!DOCTYPE>
<html>
    <header>
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/users.css">
        <title>Users</title>
        <?php include("header.php"); ?>
    </header>
    <body>
        <div class = 'cardrow'>
            <div class ='infocard'>
                
                <h1 id='form-header'>Users</h1>
                <form class='search_form' action="search.php" method="get">
                    <input type="text" id="search" name="search" placeholder="Search by email, name, phone #"><br><br>
                    <input type='submit' id = 'submitButton' name='login'>
                </form>

        </div>
    </body>
    <?php include 'footer.php';?>
</html>