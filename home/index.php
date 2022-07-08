<?php
session_start();
if (!isset($_SESSION['username'])) {
    session_abort();
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMS - home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Hello #TODO</h1>
    <img src="logo.png" alt="Company logo">
    <nav>
        <a href="">My workplace - #TODO</a>
        <a href="important">Important</a>
        <a href="tasks">Tasks</a>
        <a href="notes">Notes</a>
        <a href="map">Map</a>
        <a href="goto">Go to...</a>
        <a href="creator">Creator/editor</a>
    </nav>
</body>

</html>