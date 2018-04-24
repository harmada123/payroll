@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        Edit
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
            <div class="form-group">
                {!! Form::model($input, ['method'=>'PATCH','action'=>['AdminDepartmentsController@update', $input->id]]) !!}
                <div class="form-group">
                    {!! Form::label('department_id','Department Title:') !!}
                    {!! Form::text('department_id',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit Department Title',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}

                </div>
                <div class="form-group">
                    {!! Form::model($input, ['method'=>'DELETE','action'=>['AdminDepartmentsController@destroy', $input->id]]) !!}
                    {!! Form::submit('Delete Department Title',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection