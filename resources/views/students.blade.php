<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">Reporting Teacher</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($students) > 0)
            @foreach ($students as $key=>$student)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->teacher->name}}</td>
                <td>
                    <button class="btn btn-warning btn-xs" onclick="getStudent({{$student->id}})">Edit</button>
                    <button class="btn btn-danger btn-xs" onclick="deleteStudent({{$student->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="6">No Students found</td>
            </tr>
        @endif
    </tbody>
</table>