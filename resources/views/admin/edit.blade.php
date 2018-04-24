@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        Edit Users


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
        <div class="col-lg-6">
            <img src='../../{{$users->photo->file}}' class='img img-rounded' height="400px">
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::model($users,['method'=>'PATCH','action'=>['AdminUsersController@update',$users],'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lastName','Last Name:') !!}
                    {!! Form::text('lastName',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','Email:') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password:') !!}
                    {!! Form::password('password',['class'=> 'form-control' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('job_id','Job Description:') !!}
                    {!! Form::select('job_id',[''=>'Choose Option'] + $roles, null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('dept_id','Department:') !!}
                    {!! Form::select('dept_id',[''=>'Choose Option'] + $depts, null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('salary','Salary') !!}
                    {!! Form::number('salary',null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id','Picture:') !!}
                    {!! Form::file('photo_id',['class'=>'btn']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                {!! Form::model($users, ['method'=>'DELETE','action'=>['AdminUsersController@destroy', $users->id]]) !!}
                {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection