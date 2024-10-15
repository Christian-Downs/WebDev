<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>

</head>

<body>
    <div class="w3-container">
        <h1><strong>Get Started</strong></h1>
        <form action="processGetStarted.php" method="POST">
            <p>
                <label for="current_owner">Current Owner:</label><br>
                <input id="current_owner" name="current_owner" placeholder="First & Last Name">
            </p>
            <p><label for="type">Product Type:</label><br>
                <input id="type" name="type" placeholder="Product Type">
            </p>
            <p><label for="description">Company Description:</label><br>
                <textarea id="description" name="description" placeholder="Description of company and goals"></textarea>
            </p>
            <button type="submit" class="w3-button w3-green w3-round">Submit</button>
        </form>
    </div>
</body>

</html>