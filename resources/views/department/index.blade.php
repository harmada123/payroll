@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        Create Department Class
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Department Title</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td><a href={{route('department.edit',$department->id)}}>{{$department->department_id}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        {!! Form::open(['method'=>'POST','action'=>'AdminDepartmentsController@store']) !!}
                        {{Form::label('department_id','Department Title')}}
                        {!! Form::text('department_id',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create Department Class',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection