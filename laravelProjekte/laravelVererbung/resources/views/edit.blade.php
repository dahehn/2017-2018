<html>
<body>
<h2>Edit user information</h2>
<form method="post" action="{{ route('update',$projectUser) }}">
    @csrf
    @method('patch')
<p>
    <strong>Name</strong>
    <input type="text" name="name" value="{{$projectUser->name}}">
</p>
<p>
    <strong>Age</strong>
    <input type="text" name="age"value=" {{$projectUser->age}}">
</p>
<p>
    <strong>E-mail</strong>
    <input type="text" name="email" value="{{$projectUser->email}}">
</p>
<p>
    <button type="submit">Update</button>
</p>
</form>
</body>
</html>