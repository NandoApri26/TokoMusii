@extends('template.master')
@section('title','Payment Method')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">paymentmethod</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ url('/paymentmethod/create')}}" class="btn btn-primary" role="button">
                    Add Payment Method
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <!-- status  -->
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!-- /.col -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">paymentmethod</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Bank Name</td>
                                        <td>Bank Account</td>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paymentMethod as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->bank_name}}</td>
                                            <td>{{$item->account_number}}</td>
                                            <td>
                                                <a href="{{url('/paymentmethod/'.$item->id).'/edit'}}" class="btn btn-info">Edit</a>
                                                <form method="POST" action="{{url('/paymentmethod/'.$item->id)}}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
             
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection