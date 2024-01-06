<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
<?php
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    ?>
    <div class="form">
        <h1>Form Validation</h1>
        
        <form id="form" action="handle.php" method="POST">
            <div class="name">
                <label for="name">Name: </label>
                <i class="fa-solid fa-user user"></i>
                <input type="text" name="name" id="name" placeholder="your name">
                <?php if(isset($errors['name'])): ?>
                <span class="error"><?php echo $errors['name']; ?></span>
                <?php endif; ?>
            </div>
            <div class="email">
                <label for="email">Email: </label>
                <i class="fa-solid fa-envelope envelope"></i>
                <input type="text" name="email" id="email" placeholder="your email">
                <?php if(isset($errors['email'])): ?>
                <span class="error"><?php echo $errors['email']; ?></span>
                <?php endif; ?>
            </div>
            <div class="password">
                <label for="password">Password: </label>
                <i class="fa-solid fa-lock lock"></i>
                <input type="password" name="password" id="password" placeholder="enter password">
                <?php if(isset($errors['password'])): ?>
                <span class="error"><?php echo $errors['password']; ?></span>
                <?php endif; ?>
            </div>
            <div class="confirm-password">
                <label for="Confpassword">Confirm  Password: </label>
                <i class="fa-solid fa-lock passLock"></i>
                <input type="password" name="confPassword" id="Confpassword" placeholder="confirm password">
                <?php if(isset($errors['confPassword'])): ?>
                <span class="error"><?php echo $errors['confPassword']; ?></span>
                <?php endif; ?>
            </div>
            <div class="btn">
             <input type="submit" value="submit" id="submit" name = "submit">
            </div>
            
        </form>
    </div>

</body>
</html>