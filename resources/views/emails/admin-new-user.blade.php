<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
</head>

<body>
    <h1>New User Registered</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Registered at: {{ $user->created_at }}</p>




</body>

</html>