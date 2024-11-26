@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Subject Assign List(Total:{{$getRecord->total()}})</h1>
        </div>

        <div class="col-sm-6" style="text-align: right">
        <a href="{{url('admin/assign_subject/add')}}" class="btn btn-primary">Add New Assign Subject</a>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="container-fluid">
    <div class="row">          
        <!-- /.col -->

        <div class="col-md-12">
        <!-- Search header -->           
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"> Search Assign Subject</h3>
            </div>
            <div class="card card-primary">
                
                <!-- form start -->
                <form method="get" action="">
                <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name ="class_name" value="{{Request::get('class_name')}}" 
                        placeholder="Class name">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Subject Name</label>
                        <input type="text" class="form-control" name ="subject_name" value="{{Request::get('subject_name')}}"
                        placeholder="Subject name">
                    </div>

                

                <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}"  placeholder="Date">
                </div>

                <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 31px;"> Search</button>
                    <a  href="{{url('admin/assign_subject/list')}}"  class="btn btn-success"  style="margin-top: 31px;">Clear</a>

                </div>

                </div>
                </div>
            </form>
            </div>

        @include('_message')


        <!-- /.card -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Assign Subjects List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Create By</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value )
                    <tr>
                        <td>{{$value -> id}}</td>
                        <td>{{$value -> class_name}}</td>
                        <td>{{$value -> subject_name}}</td>
                        <td>{{$value -> created_by_name}}</td>
                        <td>
                            @if ($value -> status ==0)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>{{date('d-m-Y H:i A', strtotime($value -> created_at))}}</td>
                        <td>
                        <a href="{{url('admin/assign_subject/edit/'.$value-> id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('admin/assign_subject/edit_single/'.$value-> id)}}" class="btn btn-primary">Edit Single</a>
                        <a href="{{url('admin/assign_subject/delete/'.$value-> id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
            </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection