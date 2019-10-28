<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM LOGIN</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <form action="index.php?r=login" method="post">
        <fieldset>
            <legend>Connection</legend>
            <ul>
                <li>Login: <input name="login"></li>
                <li>Password: <input name="password"></li>
                <li><button type="submit">Valider</button></li>
            </ul>
        </fieldset>
    </form>
</body>
</html>