<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>You user data has been changed.</h1>
<p>New Data</p>
<pre>
name = {{$user->name}}
email = {{$user->email}}
message = {{ $messageForUser }}
</pre>
</body>
</html>
