<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z4-1a </title>
</head>
<style type="text/css">
    .temp {
        border: 1px solid black;
        width: 100px;
        height: 100px;
    }
</style>
<body>


<form action="<?php print $_GET['PHP_SELF'] ?>" method="GET">
    <h3>Выберите горизонтальное положение</h3>
    <p><label><input type="radio" name="align" value="left"></label>слева</p>
    <p><label><input type="radio" name="align" value="center"></label>по центру</p>
    <p><label><input type="radio" name="align" value="right"></label>справа</p>

    <h3>Выберите вертикальное положение</h3>
    <p><label><input type="checkbox" name="valign" value="top"></label>сверху</p>
    <p><label><input type="checkbox" name="valign" value="middle"></label>по середине</p>
    <p><label><input type="checkbox" name="valign" value="bottom"></label>внизу</p>

    <p><input type="submit" value="Выполнить"></p>
</form>

</body>
</html>