<html>
<body>
<h2>All User</h2>
    <table>
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Age</th>

        </thead>
        <thbody>
            @foreach($projectUsers as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->age}}</td>
                    <td>
                        <a href="{{ route('show', $p->id) }}">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('edit', $p->id) }}">Edit</a>
                    </td>
                    <td>
                         <form method="post" action="{{ route('projectUser.destroy',$p->id )}}">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </thbody>
        <a href="{{route('create')}}">Create</a>
    </table>


</body>
</html>