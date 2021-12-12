@extends('template.master')
@section('title','Edit Cart')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Cart</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Cart</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- /.col -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Cart</h3>
                    </div>
                    <form method="POST" action="{{url('/cart/'.$cart->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="product_id">Product Name</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    <!-- using FOREIGN ID -->
                                    @foreach ($product as $item)
                                    @if($item->id == $cart->product_id)
                                    <option value="{{$item->id}}" selected >{{$item->product_name}}</option>
                                    @else 
                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_qty">Product Quantity</label>
                                <input type="text" class="form-control  @error('product_qty') is-invalid @enderror" name="product_qty" id="product_qty" placeholder="Enter Product quantity" value="{{$cart->product_qty}}">
                                @error('product_qty')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_price">Product Stock</label>
                                <input type="number" class="form-control @error('total_price') is-invalid @enderror" name="total_price" id="total_price" placeholder="Enter Product Stock" value="{{$cart->total_price}}">
                                @error('total_price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection