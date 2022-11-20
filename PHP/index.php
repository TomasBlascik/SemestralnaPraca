<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <meta charset="UTF-8">
    <title>Home</title>
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
        <h1>Nadpis</h1>
        <p>&nbsp;</p>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat nisl quis mattis blandit. Nulla in lectus sit amet arcu malesuada eleifend eleifend sit amet leo. Sed tempus purus sagittis nisi vestibulum, at pellentesque sapien euismod. Cras porta aliquet diam. Donec facilisis eu orci eu ornare. Nam at quam nec sapien mollis sollicitudin. Donec nec risus elementum, efficitur magna quis, euismod mi. Morbi posuere mollis mi. Maecenas rhoncus facilisis hendrerit. Curabitur purus odio, maximus id dapibus sed, feugiat non magna.

            Donec vestibulum eu risus in dignissim. Ut eget fermentum elit, eget congue enim. Cras nec finibus eros. Cras mauris diam, tempor sit amet risus quis, mattis tincidunt nulla. Cras aliquet dolor congue, molestie enim quis, aliquet nibh. Integer sit amet arcu convallis, commodo ipsum at, scelerisque arcu. Quisque sed est urna. Fusce faucibus, est id elementum dapibus, velit justo maximus metus, in dapibus dolor tellus quis dolor.

            e in efficitur leo. Nunc quis dui eros. Fusce aliquam, odio in faucibus lobortis, dui ligula semper elit, venenatis ornare augue ex vitae lorem. Nulla id efficitur velit. Duis suscipit augue eu erat semper, eget vulputate arcu cursus. Morbi lorem sem, efficitur sit amet risus eu, pellentesque efficitur mauris. Fusce tincidunt auctor tortor, id molestie eros fermentum efficitur. Sed ultricies quam at euismod consequat. Sed fringilla hendrerit augue, at porttitor nulla elementum id.
        </p>
        <p>&nbsp;</p>
        <img src="../CSS/IMG/movie.jpg" alt="movie posters">
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