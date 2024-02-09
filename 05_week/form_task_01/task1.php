<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>
<h1>Program</h1>
<form action="task1.php" method="post">
    Input a positive number: <input type="number" name="number" placeholder="12345">
    <button type="submit">Confirm</button>
</form>    

<p>Output: 
<?php 
$string = "";
$i = intval($_POST["number"]);
if ($i >= 0) {
    for ($i; $i>=0; $i-- ) {
        $i%2 ? null : $string .= $i." ";
    }
} else {
    $string = "That's a negative interger. Please try again!";
}
echo $string;

?>

</body>
</html>
