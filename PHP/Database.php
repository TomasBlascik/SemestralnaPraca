<?php
include "DBstorage.php";
include "TableRecord.php";

$db = new DBstorage();

try {
    if (isset($_GET['edit']) && isset($_POST['id'])) {
            $updateRecord = $db->loadOneRecord($_POST['id']);
            $updateRecord->name = $_POST['name'];
            $updateRecord->director = $_POST['director'];
            $updateRecord->year = $_POST['year'];
            $db->storeRecord($updateRecord);
            header("Location: ?");
            die();
    }
} catch (Exception $e) {
    header("Location: ?");
}

if (isset($_GET['delete']) && ($_GET['delete'] != null)) {
    $db->removeRecord($_GET['delete']);
}

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

<!DOCTYPE html>
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

<?php
if (isset($_GET['edit'])) {
    /** @var TableRecord $record */
    /** @var DB $db */
    $record = $db->loadOneRecord($_GET['edit']);
?>
<div class="content">
    <div>
        <form id="edit-form" method="post">
            <textarea type="text" name="name" required><?php echo $record->name ?></textarea>
            <textarea type="text" name="director" required><?php echo $record->director ?></textarea>
            <textarea type="number" name="year" required><?php echo $record->year ?></textarea>
            <input type="submit" value="Save">
            <input type="hidden" name="id" value="<?php echo $record->id ?>">
        </form>
    </div>
</div>
<?php } else { ?>
<div class="content">
    <table class = "datTabulka">
        <tr>
            <th>Movie/TV Show</th>
            <th>Director</th>
            <th>Year</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
            <?php
            /** @var DBstorage $db */
            foreach ($db->getAllRecords() as $record) { ?>
                <tr>
                    <td><?php echo $record->name ?></td>
                    <td><?php echo $record->director ?></td>
                    <td><?php echo $record->year ?></td>
                    <td class="no-border"><a class = "button del" href="?delete=<?php echo $record->id ?>">Delete</a></td>
                    <td class="no-border"><a class = "button edit" href="?edit=<?php echo $record->id ?>">Edit</a></td>
                </tr>
            <?php } ?>
    </table>
    <div id="movie-add">
        <form method="post">
            <input type="text" name="name" placeholder="Movie name" required>
            <input type="text" name="director" placeholder="Director name" required>
            <input type="number" name="year"  placeholder="Year" required>
            <input type="submit" value="Add movie">
        </form>
    </div>
</div>
<?php } ?>

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