@extends('template.website')
@section('content')
<section id="header-top" class="d-flex py-4 align-items-center">
    <div class="container">
        <h1 >Berita</h1>
    </div>
</section>

<main id="main">
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Berita Terbaru</h2>
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box pt-3 p-3">
                    <div class="icon">
                      <img src="{{asset('assets/images/sk2.jpeg')}}" class="img-news1">
                    </div>
                    <h4><a href="">Pengukuhan Pengurus di Kendil Mas Fatmawati</a></h4>
                    <div class="text-8 text-muted">
                        <i class="fas fa-clock mr-1"></i> {{date('H:i')}}
                        <i class="fas fa-calendar mr-1 ml-2"></i> {{date('d-M-Y')}}
                        <i class="fas fa-user-edit mr-1 ml-2"></i> Admin
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xs-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box pt-3 p-3">
                <div class="icon">
                    <img src="{{asset('assets/images/ttdbersama.jpeg')}}" class="img-news1">
                </div>
                <h4><a href="">Rapat Pengurus</a></h4>
                <p>Rapat Pengurus di TVRI</p>
            </div>
            </div>
            <div class="col-xl-4 col-xs-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box pt-3 p-3">
                <div class="icon">
                    <img src="{{asset('assets/images/rapat2.jpeg')}}" class="img-news1">
                </div>
                <h4><a href="">Rapat Bulanan</a></h4>
                <p>Rapat Pengurus di Kendil Mas Fatmawati</p>
            </div>
            </div>
          </div>

        </div>
    </section>

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <h2>Daftar Berita</h2>
          </div>



        </div>
    </section><!-- End About Us Section -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <h2>Berita Kegiatan</h2>
          </div>
          <div class="row">
            <div class="col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box pt-3 p-3">
                    <div class="icon">
                      <img src="{{asset('assets/images/sk2.jpeg')}}" class="img-news1">
                    </div>
                    <h4><a href="">Pengukuhan Pengurus di Kendil Mas Fatmawati</a></h4>
                    <div class="text-8 text-muted">
                        <i class="fas fa-clock mr-1"></i> {{date('H:i')}}
                        <i class="fas fa-calendar mr-1 ml-2"></i> {{date('d-M-Y')}}
                        <i class="fas fa-user-edit mr-1 ml-2"></i> Admin
                    </div>
                </div>
            </div>
           </div>
        </div>
    </section>
</main>

@endsection
