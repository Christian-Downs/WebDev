<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>

    <title>QA Page</title>
    <style>
        /* Style the buttons that are used to open and close the accordion panel */
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            display: inline-flex;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        /* Style the accordion panel. Note: hidden by default */
        .panel {
            padding: 0 18px;
            background-color: white;
            width: 100%;
            max-height: 0;
            /* overflow-y: scroll; */
            scroll-height: 4;
            transition: max-height 0.2s ease-out;
        }

        .arrow {
            margin-left: auto;
            font-size: 20px;
            font-weight: bold;
        }

        .scroll-hidden {
            overflow: hidden;
        }

        .scroll-y {
            overflow-y: scroll;
        }
    </style>
</head>

<body>



    <div class="holder w3-card-4">
        <header class="w3-container w3-center">
            <h1><strong>Q&A</strong></h1>
        </header>
        <div class="w3-container">
            <div class="w3-col m6">
                <div class="w3-row m6 w3-padding">
                    <button class="accordion w3-block">What can I sell? <span class="arrow w3-right">&#709;</span></button>
                    <div class="panel scroll-hidden">
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
                <div class="w3-row m6 w3-padding">
                    <button class="accordion">How much money can I make? <span class="arrow">&#709;</span></button>
                    <div class="panel scroll-y">
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
                <div class="w3-row m6 w3-padding">
                    <button class="accordion">How much does it cost? <span class="arrow">&#709;</span></button>
                    <div class="panel scroll-hidden">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
            </div>
            <div class="w3-col m6">
                <div class="w3-row m6 w3-padding">
                    <button class="accordion w3-block">How much time will I need to invest? <span class="arrow">&#709;</span></button>
                    <div class="panel scroll-hidden">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
                <div class="w3-row m6 w3-padding">
                    <button class="accordion">How do I price my service? <span class="arrow">&#709;</span></button>
                    <div class="panel scroll-hidden">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
                <div class="w3-row m6 w3-padding">
                    <button class="accordion">How do I get paid? <span class="arrow">&#709;</span></button>
                    <div class="panel scroll-hidden">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="w3-container w3-center w3-padding-large">
            <p class="w3-text-grey w3-">Sign up and create your first Gig today</p>
            <a href="info.php"><button class="w3-button w3-green w3-round">Get Started</button></a>
        </footer>
    </div>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    if (panel.style.overscrollY === "hidden") {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    } else {
                        panel.style.maxHeight = 150 + "px";
                    }

                }
            });
        }
    </script>
</body>

</html>