<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z5-2</title>
</head>
<body>

<form action="<?php print $_POST['PHP_SELF'] ?>" method="POST">

    <h3>Записная книжка</h3>

    <p><label>Введите фамилию и имя [*] <input type="text" name="username" required></label></p>
    <p><label>Введите город <input type="text" name="city"></label></p>
    <p><label>Введите адрес <input type="text" name="address"></label></p>
    <p><label>Введите дату рождения в формате ГГГГ-ММ-ДД <input type="text" name="birthday"></label></p>
    <p><label>Введите email [*] <input type="email" name="mail" required></label></p>
    <p><label><input type="submit" value="Записать!"></label></p>

</form>

<?php

function add_to_notebook($username, $mail, $city, $address, $birthday)
{
    if (isset($username, $mail, $city, $address, $birthday)) {

        $mysql_user = "root";
        $mysql_password = "123321";
        $link = mysqli_connect('db', $mysql_user, $mysql_password, "php_db");

        if (!$link) {
            die("Нет соединения с MySQL");
        } else {
            if (!empty($username) && !empty($mail)) {

                $query = "INSERT INTO notebook (username, city, address, birthday, mail) "
                    . "VALUES('$username', '$city' , '$address', NULLIF('$birthday',''), '$mail')";

                if (!mysqli_query($link, $query)) {
                    print mysqli_error($link);
                }
            }

            mysqli_close($link);
        }
    }
}

$username = $_POST['username'];
$city = $_POST['city'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$mail = $_POST['mail'];

add_to_notebook($username, $mail, $city, $address, $birthday);

?>

</body>
</html>
