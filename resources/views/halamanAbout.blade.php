@extends('layouts.user')

@section('content')
       <!-- About-->
       <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Sunrise Autos</h2>
                        <p class="text-white-50">
                            Sunrise Autos Digiroom merupakan transformasi baru dari website Sunrise Autos yang kini menjadi e-commerce website untuk penjualan mobil, suku cadang, dan aksesoris resmi di Indonesia. Berawal dari jaringan jasa penjualan, perawatan, perbaikan dan penyediaan suku cadang Toyota yang berdiri sejak tahun 1945.
                        </p>
                        <img class="img-fluid" src="{{asset('assets/img/servismobil.jpg')}}" alt="..." />
                    </div>
                </div>
            </div><br>
        </section>
@endsection