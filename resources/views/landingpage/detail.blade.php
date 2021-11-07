@extends('frontend.master')
@section('title', 'Detail Product')

@section('content')
<!-- Awal Label -->
<section id="Label">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{url('/home')}}"><i class="fa fa-home mr-4"></i></a>
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active label" aria-current="page">DetailsProduct</li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Label -->

<!-- Awal Detail Product -->
<section id="Details-Product">
    <div class="container">
        <div class="row mt-lg-5">
            <div class="col-lg-3 mt-lg-4">
                <div class="bg-details">
                    <img src="{{asset('img/'.$product -> image)}}">
                </div>
            </div>
            <div class="col-lg-8 nama">
                <div class="row judul">
                    <div class="col">
                        <h1>{{$product -> product_name}}</h1>
                    </div>
                </div>
                <div class="row harga">
                    <div class="col">
                        <h3>IDR {{$product -> product_price}}</h3>
                    </div>
                </div>
                <div class="row mt-2 kuantitas">
                    <div class="col btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2 kuantitas" role="group">
                            <button type="button" class="btn
                                        btn-outline-secondary">-</button>
                            <button type="button" class="btn
                                        btn-outline-secondary">1</button>
                            <button type="button" class="btn
                                        btn-outline-secondary">+</button>
                        </div>
                    </div>
                </div>
                <div class="row stok">
                    <div class="col">
                        <h6>Tersedia : <span>{{$product -> product_stock}} stok</span></h6>
                    </div>
                </div>
                <div class="row tombol">
                    <div class="col-lg-4 mb-5">
                        <a href="Keranjang.html">
                            <div class="btn btn-outline-warning">Tambah ke keranjang <i class="fa fa-cart-plus"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <a href="Metode-Pembayaran.html">
                            <div class="btn btn-warning">Beli sekarang <i class="fa fa-long-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Detail Product-->

<!-- Awal Spesifikasi Product -->
<section id="Spesifikasi-Product">
    <div class="container">
        <div class="bg-spesifikasi">
            <div class="col content mt-2">
                <h1>Spesifikasi <span>Product</span></h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2 mt-lg-3 kondisi">
                    <li>Kondisi</li>
                    <li>Berat</li>
                    <li>Kategori</li>
                </div>
                <div class="col-10 mt-lg-3 keterangan">
                    <li>Baru</li>
                    <li>1.1101 gram</li>
                    <li>{{$product -> category -> category_name}}</li>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Spesifikasi Product -->

<!-- Awal Deskripsi Product -->
<section id="Deskripsi-Product">
    <div class="container">
        <div class="bg-deskripsi mt-lg-4">
            <div class="col content mt-2">
                <h1>Deskripsi <span>Product</span></h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-10 mt-lg-3 kondisi">
                    <p>
                        {{$product -> product_description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Deskripsi Product -->

<!-- Awal Ulasan -->
<section id="Ulasan-Product">
    <div class="container">
        <div class="bg-ulasan mt-lg-4">
            <div class="col content mt-2">
                <h1>Ulasan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 mt-4 ulasan">
                <img src="./assets/ulasan.png" alt="">
            </div>
            <div class="col-lg-11 mt-4">
                <div class="row">
                    <div class="col nama">
                        <h6>Muhammad Ridwan</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col komentar">
                        <h6>Barang sangat baik puas dengan pelapak ini</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col penilaian">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 mt-4 ulasan">
                <img src="./assets/ulasan.png" alt="">
            </div>
            <div class="col-lg-11 mt-4">
                <div class="row">
                    <div class="col nama">
                        <h6>Muhammad Ridwan</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col komentar">
                        <h6>Barang sangat baik puas dengan pelapak ini</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col penilaian">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Ulasan -->

<section id="Flash-Deals">
    <div class="bg-FlashDeals">
        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <a href="">
                        <h1>Flash <span>Deals</span></h1>
                    </a>
                </div>
            </div>
            <div class="row text">
                <div class="col-lg-3 mt-4 ">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo1 7.png" alt="Promo1">
                                <h3>Sepatu Tsubasa Ozora</h3>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <a href="Detail-Product.html">
                                        <div class="btn btn-warning">Lihat
                                            Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo2 3.png" alt="Promo1">
                                <h3>Baju Sultan Andara</h3>
                            </div>
                        </div>
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>1.950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <a href="Detail-Product.html">
                                        <div class="btn btn-warning">Lihat
                                            Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo3 2.png" alt="Promo1">
                            </div>
                            <h3>Camera Canon Super Jernih</h3>
                        </div>
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>1.950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <a href="Detail-Product.html">
                                        <div class="btn btn-warning">Lihat
                                            Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-4 ">
                    <div class="bg-isi">
                        <div class="row text-center">
                            <div class="col">
                                <img src="./assets/promo1 7.png" alt="Promo1">
                                <h3>Sepatu Tsubasa Ozora</h3>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <h6>IDR <span>950.000</span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mb-3">
                                    <a href="Detail-Product.html">
                                        <div class="btn btn-warning">Lihat
                                            Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Flash Deal -->
@endsection