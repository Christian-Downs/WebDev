<!DOCTYPE html>
<html>
    <header>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    </header>
<body>
    <header>
    <div class="w3-bar w3-light-grey w3-border">
        <a href="#" class="w3-bar-item w3-button w3-green"><i class="fa fa-home"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-globe"></i></a>
        
        <?php // Checks to see if logged in if the user is than display a small image of the user
            function loginCheck(){
                if(session_status()===PHP_SESSION_NONE){
                    error_log("HEADER: NO SESSION");
                    echo "<a href='login.php' class='w3-bar-item w3-button'><i class='fa fa-sign-in'></i></a>";
                    return;
                }

                if(isset($_SESSION['user'])){
                    //TODO change the image to the image the user provides
                    error_log("HEADER: USER FOUND");

                    echo "<a href='logout.php' class='w3-bar-item w3-button'><i class='material-icons'>person</i></a>";
                    return;
                } else {
                    error_log("HEADER: NO USER IN SESSION");

                    echo "<a href='#' class='w3-bar-item w3-button'><i class='fa fa-sign-in'></i></a>";
                    return;
                }

            }
            

            loginCheck();
        ?>
    </div>
    </header>