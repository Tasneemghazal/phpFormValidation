<?php session_start(); 
    $name = $email =$password = $confirmPassword="";
    $nameReg = '/^[a-zA-Z]+$/';
    $errors=[];
    if(($_SERVER['REQUEST_METHOD']=='POST')&&isset($_POST['submit'])){
        
        if(empty($_POST['name'])){
            $errors['name']="Name is required";
        }else {
            $name=test_input($_POST['name']);
            if(!preg_match($nameReg,$name)){
            $errors['name'] = " your name must contain characters only";

        }else if(strlen($name) <4 || strlen($name) >20){
            $errors['name']= " your name must be at least 4 characters and more than 20 characters";
        }
    }
        if(empty($_POST['email'])){
            $errors['email']="email is required";
        }else{
            $email = test_input($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email']="email is invalid, please enter a valid email";
            }
        }
        if(empty($_POST['password'])){
            $errors['password']="password is required";
        }else {
            $password = test_input($_POST['password']);
            if(strlen($password) < 6 || strlen($password)>20){
                $errors['password']=" your password must be at least 6 characters and at most 20 characters";
            }
        }
        if(empty($_POST['confPassword'])){
            $errors['confPassword']="confPassword is required";
        }else{
            $confirmPassword = test_input($_POST['confPassword']);
            if($confirmPassword != $password){
                $errors['confPassword']="password does not match";
            }
        }
    }


    if(empty($errors)){
        echo "Form is submitted successfully";
    }else{
        $_SESSION['errors']=$errors;
        header("location: index.php");
        exit();
        
    }

    function test_input($input) : string{
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        $input = trim($input);
        return $input;
    }
?>