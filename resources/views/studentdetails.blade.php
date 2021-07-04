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
</thead>
<tbody>
        @foreach($students as $student)
        <tr>
        <td>{{$student->sname}}</td>
        <td>{{$student->fname}}</td>
        <td>{{$student->class}}</td>
        <td>{{$student->phnum}}</td>
        <td>{{$student->email}}</td>
        </tr>

        @endforeach

</tbody>

</table>

@endsection