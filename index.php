<?php
session_start();

// if (isset($_SESSION['username']))
//     header('Location: home');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greenhouse management system</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div>
        <form action="" method="POST">
            <fieldset>
                <legend>Greenhouse management</legend>
                <label for="login">Login:</label>
                <input type="text" name="login" id="login">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Log in">
            </fieldset>
        </form>
    </div>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $form_login = $_POST['login'];
    $form_password = $_POST['password'];

    if (empty($form_login) || empty($form_password)) {
        echo "<p id='error'>Both fields have to be filled</p>";
        session_destroy();
    } else {

        $pdo = new PDO("mysql:host=localhost;dbname=roseland", "root", "");
        $sql = "SELECT * FROM `login_system` WHERE `user_login` = :form_login";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':form_login', $form_login);
        $stmt->execute();

        $db_login = $stmt->fetch(PDO::FETCH_NUM);

        if (empty($db_login))
            echo "<p id='error'>Wrong login</p>";
        else {
            $sql = "SELECT user_password FROM `login_system` WHERE `user_login` = :form_login";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':form_login', $form_login);
            $stmt->execute();

            $db_password = $stmt->fetch(PDO::FETCH_NUM);

            if (strcmp($db_password[0], $form_password))
                echo "<p id='error'>Wrong password</p>";
            else {
                $_SESSION['username'] = $db_login;
            }
        }
    }
}

?>