<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z5-1</title>
</head>
<body>
<?php
$mysql_user = "root";
$mysql_password = "123321";
$link = mysqli_connect('db', $mysql_user, $mysql_password, "php_db");

$query = "CREATE TABLE IF NOT EXISTS notebook (
          id INT NOT NULL AUTO_INCREMENT,
          username VARCHAR(50),
          city VARCHAR(50),
          address VARCHAR(50),
          birthday DATE,
          mail VARCHAR(20),
          PRIMARY KEY(id)
          )";

if (!$link) {
    die("Нет соединения с MySQL");
} else {
    if (!mysqli_query($link, $query)) {
        die("Не удалось создать таблицу");
    }

    mysqli_close($link);
}

?>

</body>
</html>
