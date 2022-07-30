@if($data)
<section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="content">
            <h3>{{$data->name ?? null }}</h3>
            <p>{!! $data->description ?? null !!}</p>
          </div>

          <div class="accordion-list">
            @if(count($detail) > 0)
            <ul>
            @foreach ($detail as $key => $row)
            @php
                $collapse = null;
                $collapse2 = "collapsed";
                $aria_collapse =false;
                if($key == 0){
                    $collapse = "show";
                    $collapse2 = null;
                    $aria_collapse =true;
                }
            @endphp
              <li>
                <a data-bs-toggle="collapse" class="collapse {{$collapse2}}" data-bs-target="#accordion-list-{{$row->id}}" aria-expanded="{{$aria_collapse}}">
                    <span>0{{++$key}}</span> {{$row->name ?? null}}
                    <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-{{$row->id}}" class="collapse {{$collapse}}" data-bs-parent=".accordion-list">
                  <p>
                    {{$row->description ?? null}}
                  </p>
                </div>
              </li>
            @endforeach
            </ul>
            @endif
          </div>

        </div>

        @php
        $filename = "assets/images/kegiatan1.jpeg";
        if($data->filename){
            $filename = "assets/images/artikel/".$data->filename;
        }
        @endphp
        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{asset($filename)}}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
</section>
@endif
