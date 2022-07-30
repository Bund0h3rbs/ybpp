@if($section1List)
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{$section1List->name ?? null }}</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
            {!! $section1List->description ?? null !!}

        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
            {!! $section1List->description2 ?? null !!}
        </div>
      </div>

    </div>
</section>
@endif
