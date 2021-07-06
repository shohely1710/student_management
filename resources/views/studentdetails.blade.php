@extends('layout.default')

@section('content')
<h1>Student Details</h1>
<table class="table table-bordered">
<thead>
    <th>Student name</th>
    <th>Father name</th>
    <th>Class</th>
    <th>Phone num</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
        @foreach($students as $student)
        <tr>
        <td>{{$student->sname}}</td>
        <td>{{$student->fname}}</td>
        <td>{{$student->class}}</td>
        <td>{{$student->phnum}}</td>
        <td>{{$student->email}}</td>
        <td><a href="{{route('student.edit', ['id'=>$student->id])}}">Edit</a></td>
        <td><a href="{{route('student.delete', ['id'=>$student->id])}}">Delete</a></td>
        </tr>
        @endforeach

</tbody>
</table>
{{$students->links()}}

@endsection