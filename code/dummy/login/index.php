<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);

?>

<html>
<body>
    <a href="logout.php">Logout</a>
    <h1>Hello, <?php echo $user_data['user_email'] ?></h1>

    <form action="post.php" method="post">
    Vorname: <input type="text" name="vorname"><br>
    Name: <input type="text" name="name"><br>
    Beschreibung: <input type="text" name="beschreibung"><br>
    Beruf: <input type="text" name="beruf"><br>
    Wunschgehalt: <input type="text" name="wunschgehalt"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
    </form>

</body>
</html>