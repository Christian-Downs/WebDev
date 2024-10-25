<!DOCTYPE html>
<html>
<head>
    <title>Intake</title>
</head>
<body>
    <h1>Intake</h1>
    <?php
        if(!isset($_GET['id'])){
            echo "

            <form action='intakeAndEdit.php' method='POST'>
                <label for='name'>Name:</label>
                <input type='text' name='name' id='name' placeholder='Name' required>
                <label for='location'>Location:</label>
                <input type='text' name='location' id='location' placeholder='Location' required>
                <label for='favorite_animal'>Favorite Animal:</label>
                <input type='text' name='favorite_animal' id='favorite_animal' placeholder='Dog' required>
                <label for='option1'>Option 1</label>
                <input type='checkbox' name='checkbox[]' value='1' id='option1'>
                <label for='option2'>Option 2</label>
                <input type='checkbox' name='checkbox[]' value='2' id='option2'>
                <label for='option3'>Option 3</label>
                <input type='checkbox' name='checkbox[]' value='3' id='option3'>
                <input type='submit'>
        
            </form>
            ";
        }

    ?>
    <?php
        session_start();
        if(!isset($_SESSION['people'])){
            $_SESSION['people'] = [];
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST['name']) && isset($_POST['location']) && $_POST['favorite_animal']){
                $person = [
                    'name'=>$_POST['name'],
                    'location'=>$_POST['location'],
                    'favorite_animal'=>$_POST['favorite_animal']
                ];
                array_push($_SESSION['people'],$person);
            }

        }
        foreach($_SESSION['people'] as $key => $value){
            echo $key." ".$value['name']."<br>";
        }
    ?>
</body>
</html>