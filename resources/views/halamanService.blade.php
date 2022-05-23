@extends('layouts.user')

@section('content')
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="./assets/img/layananbengkel.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-left text-lg-left">
                            <h4>Layanan Bengkel</h4>
                            <p class="text-black-50 mb-0">General Repair di bengkel Sunrise Autos merupakan layanan purna jual dari Sunrise Autos yang menawarkan jasa perbaikan berupa servis perawatan berkala maupun pekerjaan perbaikan umum berkaitan dengan mesin, sasis/ kerangka kendaraan, serta kelistrikan untuk seluruh tipe/model. Layanan General Repair mengedepankan kepuasan pelanggan dengan terus menjaga kualitas, biaya, serta load time pengerjaan.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('assets/img/cover.jpg')}}" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Home Service</h4>
                                    <p class="mb-0 text-white-50">Sunrise Autos Home Service adalah Bengkel bergerak untuk layanan purna jual yang dapat melakukan perawatan kendaraan di tempat pelanggan tanpa biaya tambahan dengan garansi pengerjaan dua minggu atau 1.000 km.</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection