@extends('layouts.user')

@section('content')
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="./assets/img/layananbengkel.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Layanan Bengkel</h4>
                            <p class="text-black-50 mb-0">General Repair (GR) di bengkel Sunrise Autos merupakan layanan purna jual dari Sunrise Autos yang menawarkan jasa perbaikan berupa servis perawatan berkala maupun pekerjaan perbaikan umum berkaitan dengan mesin, sasis/ kerangka kendaraan, serta kelistrikan untuk seluruh tipe/model. Layanan General Repair (GR) mengedepankan kepuasan pelanggan dengan terus menjaga kualitas, biaya, serta lead time pengerjaan.
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
                                    <p class="mb-0 text-white-50">Sunrise Autos Home Service adalah Bengkel bergerak untuk layanan purna jual yang dapat melakukan perawatan kendaraan di tempat pelanggan tanpa biaya tambahan dengan garansi pengerjaan dua minggu atau 1.000 km. Layanan THS dapat di-booking melalui hotline +62 123456789.</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('/assets/img/modifmobil(baru).jpg')}}" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Body & Cat</h4>
                                    <p class="mb-0 text-white-50">Bodi & Cat adalah layanan purna jual dari Sunrise Autos yang menyediakan perbaikan bodi kendaraan Anda mulai dari kerusakan ringan, kerusakan sedang, hingga kerusakan parah. Sunrise Autos Bodi & Cat juga menyediakan layanan super cepat yaitu Express Bodi & Cat yang hanya membutuhkan 8 jam untuk perbaikan atau One Day Service.</p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection