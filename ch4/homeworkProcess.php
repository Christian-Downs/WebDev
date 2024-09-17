<!DOCT YPE html>
<ht ml lang="en">
<head>
<title>GETMethod Form - Submission Result</title>
</head>
<body>
<h1>GET Method Form - Submission Result</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $type= $_POST["type"];
    $fur_color = $_POST["fur-color"];
    $eye_color = $_POST["eye-color"];
    $features = array();
    // $small_animal = $_POST["small-pet"];
    // $guard_animal = $_POST["guard-animal"];
    // $security_animal = $_POST["security-animal"];
    // $toy_pet = $_POST["toy-pet"];
    // $potty_trained = $_POST["potty-trained"];
    if (!empty($_POST["small-pet"])) {
        $features[] = $_POST["small-pet"];
    }
    if (!empty($_POST["guard-animal"])) {
        $features[] = $_POST["guard-animal"];
    }
    if (!empty($_POST["purring-animal"])) {
        $features[] = $_POST["purring-animal"];
    }
    if (!empty($_POST["security-animal"])) {
        $features[] = $_POST["security-animal"];
    }
    if (!empty($_POST["toy-pet"])) {
        $features[] = $_POST["toy-pet"];
    }
    if (!empty($_POST["potty-trained"])) {
        $features[] = $_POST["potty-trained"];
    }

    echo "<p><strong>Congratulations! You have adopted </strong> $name</p>";
    echo "<p>$name is a $type with $fur_color fur and $eye_color eyes</p>";
    if (!empty($features)){
        $last_feature = array_pop( $features );
        if(!empty($features)){
            echo "<p>$name is also ". implode(", ", $features)." and $last_feature</p>";
        } else {
            echo "<p>$name is also a $last_feature</p>";
        }
    }
} else {
    echo "<p>No data submitted.</p>";
}
?>
<?php include('../footer.php');?>
</body>
</html>