<!DOCT YPE html>
    <ht ml lang="en">

        <head>
            <title>GETMethod Form - Submission Result</title>
        </head>

        <body>
            <h1>GET Method Form - Submission Result</h1>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $owner = $_POST["current_owner"];
                $type = $_POST["type"];
                $description = $_POST["description"];
                echo "<p><strong>Owner:</strong> $owner</p>";
                echo "<p>Type: $type</p>";
                echo "<p>Description: $description</p>";
            } else {
                echo "<p>No data submitted.</p>";
            }
            ?>
        </body>

        </html>