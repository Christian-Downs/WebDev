<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        @media screen and (max-width: 600px) {
            .topnav a {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
        }
    </style>
</header>

<body>
    <header>
        <div class="w3-bar w3-light-grey topnav">
            <a href="index.php" class="w3-bar-item w3-button <?php echo (basename($_SERVER['PHP_SELF']) == "index.php") ? 'w3-green' : ''; ?>" style='height:33px'>
                <i class="fa fa-home"></i>
            </a>
            <?php
            include_once('models/userModel.php');
            session_start();

            function loginCheck()
            {
                if (session_status() === PHP_SESSION_NONE) {
                    echo "<a href='login.php' class='w3-bar-item w3-button w3-right'><i class='fa fa-sign-in'></i></a>";
                    return;
                }

                if (isset($_SESSION['user'])) {
                    echo "<a href='logout.php' class='w3-bar-item w3-button w3-right' style='height:33px'><i class='material-icons'>person</i></a>";
                    echo "<a href='createBusiness.php' class='w3-bar-item w3-button w3-right " . ((basename($_SERVER['PHP_SELF']) == "createBusiness.php") ? 'w3-green' : '') . "' style='height:33px'><i class='fa fa-suitcase'></i></a>";
                    return;
                } else {
                    echo "<a href='login.php' class='w3-bar-item w3-button w3-right'><i class='fa fa-sign-in'></i></a>";
                    return;
                }
            }
            loginCheck();
            ?>
        </div>
    </header>


</body>

</html>