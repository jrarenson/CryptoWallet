<?php
function talk() {
    echo 'testingtesting';
}
function islegit($input) {
     $input = trim($input);
    if ($input == "") {
        return false;
    }
    $orginput = $input; 
    $input = stripslashes($input);
    $input = strip_tags($input);
    if ($input == $orginput) {
        return true;
    } else {
        return false;
    }
} 


?>