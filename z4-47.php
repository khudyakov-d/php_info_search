<html>
<head>
    <title> z4-47</title>
</head>
<body>


<form action="<?php print $_GET['PHP_SELF'] ?>" method="post">

    <p>Введите ваше имя

    <p><input type="text" name="user">

    <p>Что вы любите делать в свободное время <br>
        (можно выбрать несколько вариантов)

    <p><input type="checkbox" name="hobby[]"
              value="слушать музыку">слушать музыку

    <p><input type="checkbox" name="hobby[]"
              value="читать книгу">читать книгу

    <p><input type="checkbox" name="hobby[]"
              value="смотреть телевизор">смотреть телевизор

    <p><input type="checkbox" name="hobby[]"
              value="гулять на улице">гулять на улице

    <p><input type="submit" value="Выбор сделан">

</form>

<?php
print $_POST[1];
print $_GET[1];

$PARAMS = ($_SERVER['REQUEST_METHOD'] == 'POST') ? $_POST : $_GET;

foreach ($PARAMS as $key => $value) {
    if (gettype($value) == "array") {
        print "$key = <br>\n";
        foreach ($value as $v) {
            print "$v<br>";
        }

    } else {
        print "$key = $value<br>\n";
    }
}
?>

</body>
</html>
