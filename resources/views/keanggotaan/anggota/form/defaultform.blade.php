<div class="card full-height">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">
                <dt>Form Data Siswa</dt>
                <div class="text-muted mt-0" style="font-size:0.8rem">Pastikan Pengisian Sesuai Dengan Ketentuan </div>
            </div>

            <div class="card-tools">
                <a href="{{url('student')}}" class="btn btn-outline-primary border-br15 btn-me" id="btn-reload">
                    <span class="btn-label">
                        <i class="flaticon-right"></i>
                    </span>
                   Back
                </a>
            </div>
        </div>
    </div>
    <div class="card-body row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills nav-info nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="tab-siswa" data-toggle="pill" href="#tab-siswa-list" role="tab" aria-controls="tab-siswa-list" aria-selected="true">
                    Data Siswa
                </a>
                <a class="nav-link" id="tab-ortuwali" data-toggle="pill" href="#tab-ortuwali-list" role="tab" aria-controls="tab-ortuwali-list" aria-selected="false">Data Orang Tua/Wali</a>
                <a class="nav-link" id="tab-kelas" data-toggle="pill" href="#tab-kelas-list" role="tab" aria-controls="tab-kelas-list" aria-selected="false">Management Kelas</a>
            </div>
        </div>

        <div class="col-md-8">
            {{ Form::open(array('class'=>"form","role"=>"form","id"=>"form-student","novalidate"=>"novalidate"))}}
            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="tab-siswa-list" role="tabpanel" aria-labelledby="tab-siswa">
                    @include($folder.'.formsiswa')
                </div>
                <div class="tab-pane fade" id="tab-ortuwali-list" role="tabpanel" aria-labelledby="tab-ortuwali">
                    @include($folder.'.formfamily')
                </div>
                <div class="tab-pane fade" id="tab-kelas-list" role="tabpanel" aria-labelledby="tab-kelas">
                    @include($folder.'.formclassroom')
                </div>
            </div>

            {{Form::close()}}
        </div>
    </div>

</div>

<script>
$('.select2').select2({
    theme: 'bootstrap4'
});

   $('#btn-simpan').click(function(){
    $.ajax({
        type: "POST",
        url: "{{route('student.store')}}",
        data: $("#form-student").serialize(), // serializes the form's elements.
        beforeSend: function () {
            // $('#form_create').append('<div class="loader "><div class="loading"></div></div>');
        },
        success: function(data)
        {
            // $('.loader').remove();

            $("#btn-reload").trigger('click');
            data = jQuery.parseJSON(data);
            if(data.success == true)
            {
            $('#form-student')[0].reset();
                $("#btn-reload").trigger('click');
            }
        }, error: function (xhr, ajaxOptions, thrownError) {
            swal({
                title:"Informasi!",
                text: "Terdapat Kesalahan Data, Pastikan Pengisian Telah Benar",
                icon: "warning",
                buttons: false,
                timer: 1000,
            });
        }
    });
  })
</script>
