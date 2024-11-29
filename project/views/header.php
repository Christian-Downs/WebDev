<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Style the "active" element to highlight the current page */
        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        /* Style the search box inside the navigation bar */
        .topnav input[type=text] {
            float: right;
            padding: 6px;
            border: none;
            margin-top: 8px;
            margin-right: 16px;
            font-size: 17px;
        }

        /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
        @media screen and (max-width: 600px) {

            .topnav a,
            .topnav input[type=text] {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
    </style>

</header>

<body>
    <header>
        <div class="w3-bar w3-light-grey">

            <?php // Checks to see if logged in if the user is than display a small image of the user
            include_once('models/userModel.php');

            function loginCheck()
            {
                if (session_status() === PHP_SESSION_NONE) {
                    // error_log("HEADER: NO SESSION");
                    echo "<a href='login.php' class='w3-bar-item w3-button w3-right w3-padding-bottom-0 style='padding-bottom:0px''><i class='fa fa-sign-in'></i></a>";
                    return;
                }

                if (isset($_SESSION['user'])) {
                    // error_log("HEADER: USER FOUND");

                    echo "<a href='logout.php' class='w3-bar-item w3-button w3-right' style='padding-bottom:0px; height:100%'><i class='material-icons'>person</i></a>";
                    echo "<a href='createBusiness.php' class='w3-bar-item w3-button w3-right' style='padding-bottom:0px'><i class='fa fa-suitcase'></i></a>";
                    // echo ' <input type="text" placeholder="Search..">';
                    return;
                } else {
                    // error_log("HEADER: NO USER IN SESSION");

                    echo "<a href='login.php' class='w3-bar-item w3-button w3-right w3-padding-bottom-0' style='padding-bottom:0px'><i class='fa fa-sign-in'></i></a>";
                    return;
                }
            }
            loginCheck();
            ?>
        </div>
    </header>