<html>
<head>
    <meta :charset="utf8">
</head>
<body>
<h2>Create a new user</h2>
<form method="post" action="{{route('create')}}">
    @csrf
    <p>
        <strong>Name</strong>
        <input type="text" name="name">
    </p>
    <p>
        <strong>Password</strong>
        <input type="password" name="password">
    </p>
    <p>
        <strong>Age</strong>
        <input type="text" name="age">
    </p>
    <p>
        <strong>Email</strong>
        <input type="text" name="email">
    </p>
    <p>
        <button type="submit">Create</button>
    </p>

</form>
</body>
</html>