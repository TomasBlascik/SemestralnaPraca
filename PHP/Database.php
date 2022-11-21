<?php
include "DBstorage.php";
include "TableRecord.php";

$db = new DBstorage();
try {
    if (isset($_POST['name']) && isset($_POST['director']) && isset($_POST['year'])) {
        $newRecord = new TableRecord();
        $newRecord->name = $_POST['name'];
        $newRecord->director = $_POST['director'];
        $newRecord->year = $_POST['year'];
        $db->storeRecord($newRecord);
    }
} catch (Exception $e) {
    header("Location: ?");
}



?>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <link rel="stylesheet" href="../CSS/Database.css">
    <meta charset="UTF-8">
    <title>Database</title>
</head>

<body>
<nav>
    <ul class="navbar" id="myMenuNavBar">
        <li class="navbar-item menu-item" id="home"><a href ="index.php">Home</a></li>
        <li class="navbar-item menu-item" id="database"><a href ="Database.php">Database</a></li>
        <li class="navbar-item menu-item" id="about"><a href ="About.php">About</a></li>
        <li class="navbar-item" id="burger-menu">
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </li>
    </ul>
</nav>

<div class="content">
    <table class = "datTabulka">
        <tr>
            <th>Movie/TV Show</th>
            <th>Director</th>
            <th>Year</th>
        </tr>
            <?php
            /** @var DBstorage $db */
            foreach ($db->getAllRecords() as $record) { ?>
                <tr>
                    <td><?php echo $record->name ?></td>
                    <td><?php echo $record->director ?></td>
                    <td><?php echo $record->year ?></td>
                </tr>
            <?php } ?>
    </table>

    <div>
        <form method="post">
            <input type="text" name="name" placeholder="Movie name">
            <input type="text" name="director" placeholder="Director name">
            <input type="number" name="year"  placeholder="Year">
            <input type="submit" value="Send">
        </form>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myMenuNavBar");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>


</body>

</html>