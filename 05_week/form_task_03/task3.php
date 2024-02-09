<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
        $name = $email = $password1 = $password2 = $gender = $otherGender = '';
        // Handle the form submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $gender = @$_POST['gender']; //prevent the warning
            if ($gender == 'other') {
                $otherGender = $_POST['otherGender'];
            } else {
                $otherGender = "";
            }
            if ($name == '' OR $email == '' OR $password1 == '' OR $password2 == '' OR $gender == '') {
                echo "Please fill all the fields.";
            } elseif ($_POST['password1'] != $_POST['password2']) {
                echo "Passwords don't match.";
            } else {
                // Save the values to the database...
                echo "Welcome ", $_POST['name'];
            }
        } 
    ?>
    <form action="task3.php" method="post">
        Name:
        <input name="name" type="text" value="<?php echo $name;?>" /><br>
        Email:
        <input name="email" type="email" value="<?php echo $email;?>"/><br>
        Password:
        <input name="password1" type="password" value="<?php echo $password1;?>"/><br>
        Repeat password:
        <input name="password2" type="password" value="<?php echo $password2;?>"/><br>
        <div style="display: flex">
        Gender:
        <div style="display:flex; flex-direction: column">
        <div>
            <input type="radio" id="genderChoice1" name="gender" value="male" <?php echo ($gender  == "male") ? 'checked="checked"' : ''; ?>  />
            <label for="genderChoice1">Male</label>
        </div>
        <div>
            <input type="radio" id="genderChoice2" name="gender" value="female" <?php echo ($gender  == "female") ? 'checked="checked"' : ''; ?> />
            <label for="genderChoice2">Female</label>
        </div>
        <div>
            <input type="radio" id="genderChoice3" name="otherGender" value="true" <?php echo ($otherGender  == "true") ? 'checked="checked"' : ''; ?> />
            <label for="genderChoice3">Other</label>
            <input name="gender" type= "text" value="<?php if ($otherGender == 'true') {
              echo $gender;  
            } ?> "/><br>
        </div>
        </div>
        </div>
        <button type="submit">Register</button>
        <!--
            TODO:
            Add radio buttons for gender information
            male female other (+ fill in text field)
            if the user selected other handle the fill in field.
            In any case save the gender info to variable $gender as a string. 
        -->
    </form>
</body>
</html>