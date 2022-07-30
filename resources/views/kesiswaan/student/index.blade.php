@extends('template.template')

@section('content')
<div class="page-inner p-4" id="default_form">
    <div class="col-md-12">
        <div class="panel-header row">
            <h4 class="page-title">{{$title ?? 'Aplikasi Sekolah'}}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{url('home')}}">Home</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Menu</a>
                </li>
            </ul>
        </div>
    </div>
    {{ Form::open(array('class'=>"form","role"=>"form","id"=>"form-filter","novalidate"=>"novalidate"))}}
    <div class="card full-height">
        <div class="card-body ">
            <div class="text-2 pb-0">
                <dt>Filter Data</dt>
                <hr class="mt-1">
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Kelas / Tingkatan </label>
                        <div class="input-group">
                            {{ Form::select('kelas_id',[''=>'Pilih']+$kelas, null, array('class'=>'form-control select2 border-br10', 'required','id'=>'kelas_id','data-placeholder'=>'Pilih Salah Satu'))}}
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label >Tahun Ajaran </label>
                        <div class="input-group">
                            {{ Form::select('academic_id',[''=>'Pilih']+$tahun_akademik, null, array('class'=>'form-control select2 border-br10','id'=>'academic_id','data-placeholder'=>'Pilih Salah Satu'))}}

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2 float-right pt-3">
                <button type="submit" class="btn btn-outline-primary btn-me border-br15 btn-block" id="btn-filter">
                    <i class="fas fa-search "></i>
                    Filter Data
                </button>
            </div>
        </div>
    </div>
    {{Form::close()}}
    <div id="form_list">
        @include($folder.'.getlist')
    </div>

</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
$('.select2').select2({
    theme: 'bootstrap4'
});
    $.validator.setDefaults({
        submitHandler: function () {
            filterForm();
        }
    });
    $('#form-filter').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    function filterForm()
    {
        $.ajax({
            type:"POST",
            url: "{{route('student.filterdata')}}",
            data: $("#form-filter").serialize(),
            beforeSend: function() {
                $('#container').append('<div class="loader"><img src="{{asset("assets/images/preloader_2.gif")}}" /></div>');
            },
            success: function (e) {
               $('#form_list').html(e);
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
    }
</script>
@endsection
