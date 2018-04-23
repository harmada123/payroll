@extends('layouts.admin')

@section('content')
    <h1 class="page-header">
        Edit Job
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
                {!! Form::model($input, ['method'=>'PATCH','action'=>['AdminJobsController@update', $input->id]]) !!}
                <div class="form-group">
                    {!! Form::label('job_id','Job Title:') !!}
                    {!! Form::text('job_id',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit Job Title',['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}

                </div>
                <div class="form-group">
                    {!! Form::model($input, ['method'=>'DELETE','action'=>['AdminJobsController@destroy', $input->id]]) !!}
                    {!! Form::submit('Delete Job Title',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection