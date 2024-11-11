
<?php
function getData($field){
    
    if(!isset($_POST[$field])){
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }

    return $data;
}


?>