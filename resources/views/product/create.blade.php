@extends('template.master')
@section('title','Add Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Product</h3>
                    </div>
                    <form method="POST" action="{{url('/product')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="categoryid">Product Category</label>
                                <select class="form-control" id="categoryid" name="categoryid">
                                    <!-- using FOREIGN ID -->
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productname">Product Name</label>
                                <input type="text" class="form-control @error('productname') is-invalid @enderror" name="productname" id="productname" placeholder="Enter Product Name" min="0" max="100">
                                @error('productname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productstock">Product Stock</label>
                                <input type="number" class="form-control @error('productstock') is-invalid @enderror" id="productstock" name="productstock">
                                @error('productstock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productprice">Product Price</label>
                                <input type="number" class="form-control @error('productprice') is-invalid @enderror" id="productprice" name="productprice">
                                @error('productprice')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control @error('productdescription') is-invalid @enderror" id="productdescription" name="productdescription" placeholder="Enter your description">
                                @error('productdescription')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image" placeholder="Enter image" min="0" max="100">
                                @error('image')
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