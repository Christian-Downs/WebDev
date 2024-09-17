<!DOCTYPE html>
<html>

<head>
    <title>My Web Page</title>
</head>

<body>
    <style>
        .title {
            font-size: xx-large;
            color: orange;

            text-shadow: -1px -1px 0 orangered, 1px -1px 0 pink, -1px 1px 0 pink, 1px 1px 0 pink;
        }

        .title-box {
            padding: 2em;
            border: rgb(32, 170, 180);
            border-width: 2px;
            border-style: solid;
        }
        .not-title-holder{
            margin-top: 2em;
        }
    </style>
    <div style="text-align: center; height: fit-content; margin-top: 3em; ">
        <span class="title-box">
            <catption class="title">
                Christian's Pets
            </catption>
        </span>
    </div>
    <div class="not-title-holder">
        <p>
            Here at <i>Christian's Pets</i> we strive to provide good homes with a family friend!
            We strive for this because we believe that every family should have a good boy or girl in their house!
        </p>
        <section class="why-adopt-holder">
            <div class="why-adopt-title-holder">
                <h1 class="why-adopt-title-text">Why Adopt</h1>
            </div>
            <ol>
                <li>Save an animal life</li>
                <li>Stopping cruelty
                    <ol type="a">
                        <li>An estimated 10 million animals die from abuse or cruelty every year in the United States
                        </li>
                        <li>An estimated one animal is abused globally every 60s every year </li>
                        <li>Lack of food, water, and shelter are clear signs of abuse </li>
                    </ol>
                </li>
                <li>Adopt a pet that has received good care</li>
                <li>You pay less</li>
            </ol>
        </section>
        <section id="adopt">
            <div>
                <h1>Adopt Today!</h1>
            </div>
            <form>
                <!--action="process.php" method="POST"> -->
                <label for="type" id="type">Type of Pet</label><br />
                <input type="radio" name="type" value="dog" id="dog">Dog</input><br>
                <input type="radio" name="type" value="cat" id="cat">Cat</input><br>
                <label for="fur-color" id="fur-color">Fur Color</label><br />
                <select id="fur-color" name="fur-color">
                    <option value="" disabled selected>Select your option</option>
                    <option value="brown">Brown</option>
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="gray">Gray</option>
                </select><br>
                <label for="eye-color" id="eye-color">Eye Color</label><br />
                <select id="eye-color" name="eye-color">
                    <option value="" disabled selected>Select your option</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                    <option value="black">Black</option>
                    <option value="green">Gray</option>
                </select><br>
                <label class="other-features-text">Other Features</label><br>
                <input type="checkbox" name="small-pet" value="small-pet" id="small-pet">Small Pet</input><br>
                <input type="checkbox" name="guard-animal" value="guard-animal" id="guard-animal">Guard
                Animal</input><br>
                <input type="checkbox" name="security-animal" value="security-animal" id="security-animal">Security
                Animal</input><br>
                <input type="checkbox" name="toy-pet" value="toy-pet" id="toy-pet">Toy Pet</input><br>
                <input type="checkbox" name="potty-trained" value="potty-trained" id="potty-trained">Potty
                Trained</input><br>
                <label for="name" id="name">Name:</label>
                <input type="text" name="name" id="name" required><br> <br>
                <input type="submit" value="Submit">
            </form>
        </section>
    </div>

    <?php include('../footer.php');?>
</body>

</html>