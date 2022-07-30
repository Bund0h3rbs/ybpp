@extends('template.website')
@section('content')
<section id="hero" class="d-flex py-4 align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h2 class="mb-0">Yayasan</h2>
          <h1 >Bhakti Purna Pora</h1>
          <h2>Bersama Berkarya Membangun Negeri</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('assets/img/ybpp-nobg.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

</section>

<main id="main">
   @include('website.home.section1list')
   <!-- End About Us Section -->

    @include('website.home.beritakegiatan')

    @include('website.home.section2list')
    <!-- End Why Us Section -->

    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

          <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
              <h3>Yayasan Bhakti Purna Pora</h3>
              <p> Sebagai Wadah untuk menjaga Silahturahmi eks KEMENPORA dan tetap memupuk semangat keolahragaan
                dalam membangun jiwa muda yang kuat , berkarakter dan bersinergi, yang selalu berlandaskan nilai nilai pancasila serta Membantu Pemerintah Dalam Bidang Pendidikan dan Sosial Kemasyarakatan.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="{{url('about')}}">Selengkapnya</a>
            </div>
          </div>

        </div>
    </section><!-- End Cta Section -->

   @include('website.home.pengurus')
   <!-- End Team Section -->

</main>

@endsection
