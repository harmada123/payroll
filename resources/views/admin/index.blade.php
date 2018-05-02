@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        All Users

    </h1>
    <div class="col-lg-12">

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
    {!! Form::open(['method'=>'GET','action'=>'SearchQuery@mySearch']) !!}
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('search',null,['class'=>'form-control pull-right','placeholder'=>'Search','value'=>'search']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::submit('Search',['class'=>'btn btn-success']) !!}
            </div>
        </div>
    {!! Form::close() !!}
   <br>
    <hr>
    <table class="table table-condensed">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Job Role</th>
            <th scope="col">Department</th>
            <th scope="col">Salary</th>
        </tr>
        </thead>
        @foreach($users as $user)
            <tbody>
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    <img src='{{$user->photo->file}}' height="50px">
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->lastName}}
                </td>
                <td>
                    <a href={{route('admin.edit',$user->id)}}>{{$user->email}}</a>
                </td>
                <td>
                    {{$user->job->job_id}}
                </td>
                <td>
                    {{$user->department->department_id}}
                </td>
                <td>
                    {{$user->salary}}
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <hr>
    <div class="col-lg-12">

    </div>


@endsection