<!DOCT YPE html>
<ht ml lang="en">
<head>
<title>GETMethod Form - Submission Result</title>
</head>
<body>
<h1>GET Method Form - Submission Result</h1>
<?php
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $email = $_GET["email"];
    echo "<p> <strong>Name :</strong > $name</p>";
    echo "<p> Email : $email</p>";
    } else {
    echo "<p>No data submitted.</p>";
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p>Email: $email</p>";
        } else {
        echo "<p>No data submitted.</p>";
    }
?>
<?php include('../footer.php');?>
</body>
</html>