<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User {{ $name }}</title>
</head>

<body>
    <h1> {{ $name }} </h1>
    <p> {{ $age }} </p>
    <p> {{ $email }} </p>
    <p> {{ $id }} </p>
    <p> {{ print_r($data) }} </p>
</body>

</html>
