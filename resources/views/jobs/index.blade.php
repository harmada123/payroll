@extends('layouts.admin')
@section('content')
    <h1 class="page-header">
        Create Job Title
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
                        <th scope="col">Job Title</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->id}}</td>
                        <td><a href={{route('jobs.edit',$job->id)}} >{{$job->job_id}}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                    {!! Form::open(['method'=>'POST','action'=>'AdminJobsController@store']) !!}
                        {{Form::label('job_id','Job Title')}}
                        {!! Form::text('job_id',null,['class'=>'form-control']) !!}
                    </div>
                        <div class="form-group">
                            {!! Form::submit('Create Job Class',['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection