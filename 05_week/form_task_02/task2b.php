<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
<?php
    if ( 'POST' === $_SERVER['REQUEST_METHOD'] )
{
    if ($_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["password1"] !== "" && $_POST["password1"] == $_POST["password2"]) {
            echo '<p>Welcome to ...! Please check your email for the account activation link!</p>';
        } else {
            if ($_POST["name"] == "") {
                echo '<p>Name cannot be empty.</p>';
            }
            if ($_POST["email"] == "") {
                echo '<p>E-mail cannot be empty.</p>';
            }
            if ($_POST["password1"] == "") {
                echo '<p>Password cannot be empty.</p>';
            }
            if ($_POST["password1"] !== $_POST["password2"]) {
                echo '<p>Password does not match.</p>';
            }
            }
}
?>
   <form
      action="task2b.php"
      method="post"
      style="display: flex; flex-direction: column; width: 20%"
    >
      Name: <input name="name" /><br />
      Email: <input name="email" type="email" /><br />
      Password: <input name="password1" type="password" /><br />
      Repeat password: <input name="password2" type="password" /><br />
      <button type="submit">Register</button>
    </form>
</body>
</html>

