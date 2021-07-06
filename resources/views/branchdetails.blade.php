@extends('layout.default')

@section('content')
<h1>Branch Details</h1>
<table class="table table-bordered">
<thead>
    <th>Branch full name</th>
    <th>Branch short name</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
        @foreach($branches as $branche)
        <tr>
        <td>{{$branche->bfull}}</td>
        <td>{{$branche->bsort}}</td>
        <td><a href="{{route('branch.edit', ['id'=>$branche->id])}}">Edit</a></td>
        <td><a href="{{route('branch.delete', ['id'=>$branche->id])}}">Delete</a></td>
        </tr>
        @endforeach

</tbody>
</table>
{{$branches->links()}}

@endsection