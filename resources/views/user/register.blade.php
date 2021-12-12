<!-- @extends('frontend.master') -->
@section('title','User || Register')

@section('content')
<!-- Awal Riwayat Transaksi -->
<section id="Halaman-Register">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Halaman <span>Register</span></h1>
            </div>
        </div>
        <div class="bg-register mt-3">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <img src="./assets/Login.png" alt="Register">
                </div>
                <div class="col-lg-6 mt-3 login">
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
                    <form action="{{url('/register_user')}}" method="POST">
                                @csrf
                    <div class=" form-group row nama">
                        <div class="col-lg-10">
                            <label">Full Name</label>
                                <input type="text" name="fullname" class="form-control @error ('fullname') is-invalid @enderror" placeholder="Insert your name" value="{{old('fullname')}}">
                                @error('fullname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                    </div>
                <div class="form-group row email">
                    <div class="col-lg-10">
                        <label">Email Address</label>
                            <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Insert your address" value="{{old('email')}}">
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
                            <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror" placeholder="Insert your password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row password">
                    <div class="col-lg-10">
                        <label">Confirm Password</label>
                            <input type="password" name="retype_password" class="form-control @error ('retype_password') is-invalid @enderror" placeholder="Reply your password">
                            @error('retype_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row email">
                    <div class="col-lg-10">
                        <label">Your Birthday</label>
                            <input type="date" name="birthday" class="form-control @error ('birthday') is-invalid @enderror" value="{{old('birthday')}}">
                    </div>
                </div>
                <div class="form-group row notelp">
                    <div class="col-lg-10">
                        <label">Address</label>
                            <input type="text" name="address" class="form-control @error ('address') is-invalid @enderror" placeholder="Insert your address" value="{{old('address')}}">
                    </div>
                </div>
                <div class="form-group row notelp">
                    <div class="col-lg-10">
                        <label">Phone Number</label>
                            <input type="til" name="phone_number" class="form-control @error ('phone_number') is-invalid @enderror" placeholder="Please insert your number" value="{{old('phone_number')}}">
                            @error('phone_number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="row mt-lg-2">
                    <div class="col-lg-10 mb-5 text-center">
                        <button type="submit">
                            <a href="{{url('/login_user')}}"><div class="btn btn-warning">Registrasi <i class="fa fa-long-arrow-right"></i>
                            </div></a>
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Akhir Riwayat Transaksi -->
@endsection