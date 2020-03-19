<?php
if (isset($_POST["password"])){
    $password = $_POST["password"];

    if (!preg_match('/.{10,}$/', $password)) {
        echo "The password must contain at least 10 characters";
    }
    elseif (!preg_match('/.*[A-Z].*[A-Z].*$/', $password) || !preg_match('/.*[a-z].*[a-z].*$/', $password) || !preg_match('/.*[0-9].*[0-9].*$/', $password) || !preg_match('/.*[%$#_*].*[%$#_*].*$/', $password)) {
        echo "The password must contain at least 2 Latin uppercase letters, latin lowercase letters, numbers and characters $#_* ";
    }elseif (preg_match('/.*[%$#_*]{4,}.*$/', $password) || preg_match('/.*[0-9]{4,}.*$/', $password) || preg_match('/.*[a-z]{4,}.*$/', $password) || preg_match('/.*[A-Z]{4,}.*$/', $password)) {
        echo "The password contains more than 3 characters $#_*, numbers, latin lowercase letters and latin uppercase letters ";
} else {
           echo "Password verification was successful";
       }
    }else{
            include "dz5.html";
    }
?>