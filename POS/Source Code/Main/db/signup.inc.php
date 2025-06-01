<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];


        if(is_input_empty($username, $password)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../signup.php");
            die();
        }

        create_user($pdo, $username, $password, $email, $first_name, $last_name);

        header("Location: ../login.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    }
    catch(PDOException $e){
        die("Query Failed" . $e->getMessage());
    }
}
else{
    header("Location: ../signup.php");
    die();
}