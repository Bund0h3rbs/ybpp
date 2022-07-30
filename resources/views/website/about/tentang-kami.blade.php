@extends('template.website')
@section('content')
<section id="header-top" class="d-flex py-4 align-items-center">
    <div class="container">
        <h1 >Sejarah Yayasan</h1>
    </div>
</section>

<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="row content">
            <div class="col-lg-4">
                <div class="pic">
                    <img src="{{asset('assets/img/team-1.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="text-center pt-2">
                    <h4>Dr. Ir. Sutrija, M.Si</h4>
                    <dt class="text-primary">Ketua</dt>
                  </div>
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0">
                <h3>Tentang Yayasan</h3>
              <p>
              @if(isset($ttgyys->description))
                {!! $ttgyys->description !!}
              @endif
              </p>
            </div>
          </div>

        </div>
    </section><!-- End About Us Section -->


    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
          <div class="row">
            <div class="text-center text-lg-start">
              <h3>Maksud Dan Tujuan</h3>
              <p>
                {!! isset($mdt->description) ? $mdt->description : null !!}
              </p>
            </div>
          </div>
        </div>
    </section><!-- End Cta Section -->


    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Visi Dan Misi</h2>
            <p>Untuk mencapai Maksud dan Tujuan dari Yayasan Bhakti Purna Pora, maka dibutuhkan visi dan misi yang kuat agar mencapai tujuan tersebut, adapun visi dan misi dari Yayasan Bhakti Purna Pora adalah.</p>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="member align-items-start" data-aos="zoom-in" data-aos-delay="100">
                <h4 class=" pb-2" >Visi<h4>
                <div class="pt-3">
                    @if(count($visi) > 0)
                        @foreach ($visi as $vs)
                        <div class="d-plex p-2 text-muted">
                            <label class="label-member"> - {{$vs->description ?? null}} </label>
                        </div>
                        @endforeach
                    @endif
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="member align-items-start" data-aos="zoom-in" data-aos-delay="200">
                <h4 class="pb-2">Misi<h4>
                <div class="pt-3">
                    @if(count($misi) > 0)
                        @foreach ($misi as $ms)
                        <div class="d-plex p-2 text-muted">
                            <label class="label-member"> - {{$ms->description ?? null}} </label>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
          </div>

        </div>
      </section><!-- End Team Section -->

</main>

@endsection
