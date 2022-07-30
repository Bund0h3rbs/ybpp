
<div class="col-md-12">
    <div class="card full-height">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">
                    <dt>Form Edit</dt>
                </div>
                <div class="card-tools">
                    <div class="btn btn-outline-primary border-br15" id="back_data">
                        <span class="btn-label">
                            <i class="fas fa-angle-double-left"></i>
                        </span>
                        Back Data
                    </div>
                </div>
            </div>
            {{ Form::open(array('class'=>"form","role"=>"form","id"=>"form-edithome","novalidate"=>"novalidate"))}}
            <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                      <div class="form-group row">
                          <div class="col-md-8">
                              <dt class="text-9">Publish</dt>
                              <span class="text-muted text-8">Pilih slide untuk mengaktifkan, Status Publish akan mmenampilkan artikel dilayar utama</span>
                          </div>
                          @php
                              $checked = null;
                              if(isset($data->active) && $data->active == 1){
                                  $checked = "checked";
                              }
                          @endphp
                          <div class="col-md-4 p-2">
                              <label class="switch">
                                  <input type="checkbox" name="active" {{$checked}}>
                                  <span class="slider round"></span>
                              </label>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Judul</label>
                        <div class="input-group">
                        {{ Form::text('name',$data->name ?? null, array('class'=>'form-control border-br10', 'required','id'=>'name','placeholder'=>'Judul Artikel'))}}
                        </div>
                      </div>

                  </div>
                  <div class="col-md-4 border-l ">
                    @if($data->code != 'SKP')
                        <div class="custom-file pt-4">
                            <input type="file" class="custom-file-input" id="filename" name="filename">
                            <label class="custom-file-label" for="filename">Upload File</label>
                        </div>
                        <span class="form-text text-muted-alert text-danger">* format gambar jpg, png, jpeg</span>
                    @endif

                  </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4><i class="fas fa-copy"></i> Artikel 1 </h4>
                            {{Form::textarea('description',$data->description2 ?? null,array('class'=>'form-control','rows'=>'12','cols'=>'4'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4><i class="fas fa-copy"></i> Artikel II </h4>
                            {{Form::textarea('description2',$data->description2 ?? null,array('class'=>'form-control','rows'=>'12','cols'=>'4'))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-outline-primary border-br15"  id="store_data">
                    <span class="btn-label">
                        <i class="fas fa-save"></i>
                    </span>
                    Simpan Data
                </button>
            </div>
            {{Form::hidden('id',$data->id,array('class'=>'form-control','readonly'))}}
            {{Form::close()}}
        </div>
    </div>
</div>
<script>
    $('#back_data').click(function(){
        defaultlist()
    })

    // $('.text_editor').summernote({
    //     minHeight: 400,
    //     toolbar: [
    //         ['style', ['style']],
    //         ['font', ['bold', 'underline', 'clear']],
    //         ['fontname', ['fontname']],
    //         ['fontsize', ['fontsize']],
    //         ['color', ['color']],
    //         ['para', ['ul', 'ol', 'paragraph']],
    //         ['table', ['table']],
    //         ['insert', ['link', 'picture']],
    //         // ['view', ['fullscreen', 'codeview', 'help']],
    //         ],
    // });

    $.validator.setDefaults({
        submitHandler: function () {
            saveform();
        }
    });
    $('#form-edithome').validate({
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

    function saveform()
    {
        var formData = new FormData($('#form-edithome')[0]);
        $.ajax({
            type: "POST",
            url: "{{route('webhome.store')}}",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false, // serializes the form's elements.
            beforeSend: function () {
                // $('#form_create').append('<div class="loader "><div class="loading"></div></div>');
            },
            success: function(data)
            {
                data = jQuery.parseJSON(data);
                if(data.success == true)
                {
                $('#form-edithome')[0].reset();
                $('#back_data').trigger('click');
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
    }
</script>
