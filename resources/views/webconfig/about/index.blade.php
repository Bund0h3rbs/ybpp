@extends('template.template')

@section('content')

<div class="panel-header bg-primary-gradient text-white bubble-shadow">
    <div class="page-inner p-4 py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <span class="text-white pb-2 text-9">Aktifitas </span>
                <dt class="text-white pb-2 text-12"> {{ucwords(Auth::user()->name)}} </dt>


            </div>
             <div class="ml-md-auto py-2 py-md-0">
                <dt class="text-white op-7 mb-2">Yayasan Bhakti Purna Pora</dt>
                <span class="text-white"></span>
            </div>
        </div>
    </div>
</div>

<div class="page-inner p-4 mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <dt>Halaman Pengaturan <i>About</i> WEBSITE</dt>
                            <dt class="text-muted mt-0" style="font-size:0.9rem"></dt>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row mt--2" id="form-editdata">

    </div>
</div>

<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs4.css')}}">
<script src="{{ asset('assets/vendor/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function(){
        defaultlist()
    })
     function defaultlist(){
        $.ajax({
            type:"POST",
            url: "{{route('webabout.getlist')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                },
            beforeSend: function() {
                $('#container').append('<div class="loader"><img src="{{asset("assets/images/preloader_2.gif")}}" /></div>');
            },
            success: function (e) {
               $('.loader').remove();
               $('#form-editdata').html(e);
            }, error: function (xhr, ajaxOptions, thrownError) {
                swal({
                    title:"Informasi!",
                    text: "Terdapat Kesalahan Data, Segera Hubungi Admin",
                    icon: "warning",
                    buttons: false,
                    timer: 1000,
                });
            }
        });
    };
</script>
@endsection
