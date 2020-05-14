<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="session.php" method="post">
    <label>Введите текст</label>
    <textarea name="text" id="text" value="<?php
    if (isset($_SESSION['sess']))
        echo $_SESSION['sess'];
    ?>"><?php
        if (isset($_SESSION['sess']))
            echo $_SESSION['sess'];
        ?></textarea><br />
    <input type="submit" value="Ok"><br />
</form>
</body>
</html>