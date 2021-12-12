@extends('frontend.master')
@section('title','User || Login')

@section('content')
<!-- Awal Login -->
<section id="Halaman-Login">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Login <span>Account</span></h1>
            </div>
        </div>
        <div class="bg-login mt-3 mb-5">
            <div class="row">
                <div class="col-lg-6 pt-5">
                    <img src="{{asset('assets/Login.png')}}" alt="login">
                </div>
                <div class="col-lg-6 login">
                    @if (session('status'))
                    <div class="row mt-2">
                        <div class="col">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{session('status')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{url('/login_user')}}" method="post">
                        @csrf
                        <div class="form-group row email">
                            <div class="col-lg-10">
                                <label">Username/Email</label>
                                    <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Masukkan username/email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row password">
                            <div class="col-lg-10">
                                <label">Password</label>
                                    <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror" placeholder="Masukkan password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 text-right lp-password">
                                <label for="">Lupa Password?</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-lg-2">
                            <div class="col-lg-10 mb-5 text-center">
                                <button type="submit">
                                    <div class="btn btn-warning">Login <i class="fa fa-long-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Login -->
@endsection