<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= session()->get('username') ?>!</h1>
    <p>You are now logged in.</p>
    <a href="/logout">Logout</a>
</body>
</html>