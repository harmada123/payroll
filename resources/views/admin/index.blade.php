@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        Blank Page
        <small>Subheading</small>
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
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
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
                    {{$user->name}}
                </td>
                <td>
                    {{$user->lastName}}
                </td>
                <td>
                    {{$user->email}}
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
@endsection