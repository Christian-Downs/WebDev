<?php $lyrics = "There once was a ship that put to sea
The name of the ship was the Billy O' Tea
The winds blew up, her bow dipped down
Oh blow, my bully boys, blow (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
She'd not been two weeks from shore
When down on her a right whale bore
The captain called all hands and swore
He'd take that whale in tow (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
Da-da-da-da-da
Da-da-da-da-da-da-da
Da-da-da-da-da-da-da-da-da-da-da
Before the boat had hit the water
The whale's tail came up and caught her
All hands to the side, harpooned and fought her
When she dived down low (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
No line was cut, no whale was freed
The captain's mind was not of greed
And he belonged to the Whaleman's creed
She took that ship in tow (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
Da-da-da-da-da
Da-da-da-da-da-da-da
Da-da-da-da-da-da-da-da-da-da-da
For forty days or even more
The line went slack then tight once more
All boats were lost, there were only four
But still that whale did go (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
As far as I've heard, the fight's still on
The line's not cut, and the whale's not gone
The Wellerman makes his regular call
To encourage the captain, crew and all (huh)
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go
Soon may the Wellerman come
To bring us sugar and tea and rum
One day, when the tonguing is done
We'll take our leave and go";
echo "<script>
    var lyrics = '" . addslashes($lyrics) . "';
</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>My PHP Page</title>
</head>
<body>
    <?php
        $text = "Hello World";
        $lenght = strlen($text);
        echo "<p>The length of the text is $lenght</p>";
        // $text = "wordwhat";
        echo "<p> The length of the text is ".strlen($text)."</p>";

        $hello = substr($text,1,7);
        echo "<p> The substring of the text is $hello</p>";
        explode(" ",$text);
        echo "<p> The exploded text is $text</p>";





    ?>
    <button onclick="addLetter(0)">Display Lyrics</button>
    <div onclick="addLetter(0)" id="lyricsContainer"></div>


</body>
<script>
// JavaScript part: display each letter with a delay
var container = document.getElementById("lyricsContainer");
var delay = 0; // Time in milliseconds between each letter
var lyrics = <?php echo '"""'.$lyrics.'"""'; ?>;

function displayLetterByLetter() {
    let i = 0;
    
    function addLetter(i) {
        if (i < lyrics.length) {
            container.innerHTML += lyrics[i];
            i++;
            setTimeout(addLetter(i), delay); // Recursively call the function with a delay
        }
    }
    
    addLetter(); // Start displaying the letters
}

// Call the function to start the process
displayLetterByLetter();
</script>
</html>