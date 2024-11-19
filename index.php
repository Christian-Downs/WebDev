<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php

// Function to recursively scan directory and create an unordered list
function listDirectory($dir) {
    // Open the directory
    if ($handle = opendir($dir)) {
        echo '<ul>';  // Start the unordered list

        // Loop through each file/folder in the directory
        while (false !== ($entry = readdir($handle))) {
            // Skip the special folders '.' and '..'
            if ($entry != "." && $entry != ".." && $entry != ".git") {
                $path = $dir . '/' . $entry; // Create full path for the entry
                
                if (is_dir($path)) {
                    // If it's a directory, create a list item for it and call the function recursively
                    echo '<li>' . htmlspecialchars($entry);
                    listDirectory($path);
                    echo '</li>';
                } else {
                    // If it's a file, create a list item with a link to the file
                    echo '<li><a href="' . htmlspecialchars($path) . '">' . htmlspecialchars($entry) . '</a></li>';
                }
            }
        }

        echo '</ul>';  // End the unordered list
        closedir($handle);
    }
}

// Call the function with the current directory (.)
listDirectory('.');



$quote = "In the end, it's not the years in your life that count.
It's the life in your years.";
echo preg_replace("/'s/", "is", $quote);

?>
<?php include('footer.php');?>

    </body>
</html>