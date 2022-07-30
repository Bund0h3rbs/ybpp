
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
                    @endif
                    <span class="form-text text-muted-alert text-danger">* format gambar jpg, png, jpeg</span>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <h4><i class="fas fa-copy"></i> Artikel </h4>
                          {{Form::textarea('description',$data->description ?? null,array('class'=>'form-control','rows'=>'12','cols'=>'4'))}}
                          {{-- <textarea class="form-control text_editor" rows="6" placeholder="Enter ..." name="description" id="description" placeholder="Place some text here" >
                              {!! isset($data->description) ? $data->description : null !!}
                          </textarea> --}}
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group d-flex">
                          <h4 class="col-md-8"><i class="fas fa-copy"></i> Detail Agenda </h4>

                      </div>
                      <div class="row" id="body-term">
                          @if (count($detail) <= 0)
                          <div class="col-md-6 form-term">
                              <div class="form-group">
                                  <div class="form-group d-plex">
                                      <div class="btn btn-sm btn-default border-br10  add-term" >
                                          <i class="fas fa-plus"></i>
                                      </div>
                                      <label>Kode </label>
                                      {{ Form::text('detail_name[]', null, array('class'=>'form-control border-br10 detail_name', 'required','id'=>'name','placeholder'=>'Judul '))}}
                                  </div>
                                  <div class="form-group ">
                                      <label>Keterangan </label>
                                      {{Form::textarea('detail_description[]', null,array('class'=>'form-control detail_description','rows'=>'8','cols'=>'4'))}}
                                  </div>
                                  <div class="form-group ">
                                      {{ Form::hidden('detail_id[]', null, array('class'=>'form-control border-br10 detail_id', 'id'=>'name','readonly','placeholder'=>'Judul '))}}
                                  </div>
                              </div>
                          </div>
                          @else
                          @foreach ($detail as $key => $row)
                          <div class="col-md-6 form-term">
                              <div class="form-group">
                                  <div class="form-group d-plex">
                                      @if($key == 0)
                                      <div class="btn btn-sm btn-default border-br10  add-term" >
                                          <i class="fas fa-plus"></i>
                                      </div>
                                      @else
                                      <div class="btn btn-sm btn-danger border-br10  removeadd-term" >
                                          <i class="fas fa-minus"></i>
                                      </div>
                                      @endif

                                      <label>Judul </label>
                                      {{ Form::text('detail_name[]', $row->name ?? null, array('class'=>'form-control border-br10 detail_name', 'required','id'=>'name','placeholder'=>'Judul '))}}
                                  </div>
                                  <div class="form-group ">
                                      <label>Keterangan </label>
                                      {{Form::textarea('detail_description[]', $row->description ?? null,array('class'=>'form-control detail_description','rows'=>'8','cols'=>'4'))}}
                                  </div>
                                  <div class="form-group ">
                                      {{ Form::hidden('detail_id[]', $row->id ?? null, array('class'=>'form-control border-br10 detail_id','readonly','id'=>'name','placeholder'=>'Judul '))}}
                                  </div>
                              </div>
                          </div>
                          @endforeach
                          @endif
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
            url: "{{route('webabout.store')}}",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false, // serializes the form's elements.
            beforeSend: function () {
                $('.content').append('<div class="preloader"><div class="loading"></div></div>');
            },
            success: function(data)
            {
                $('.preloader').remove();
                data = jQuery.parseJSON(data);
                if(data.success == true)
                {
                $('#form-edithome')[0].reset();
                $('#back_data').trigger('click');
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                $('.preloader').remove();
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

    var i = "{{count($detail)}}";
    $('#body-term').on('click','.add-term',function(){
          $parent = $(this).parents('div.form-term');
          $cloned = $parent.clone();
          if (i == 0) {
              $after = $parent;
              $copied = $cloned.appendTo('#body-term').before($parent);
              $parent.find('.add-term').removeClass("add-term").addClass('btn-danger remove-term').html('<i class="fas fa-minus"></i>');
          } else {
              $cloned2 = $parent.clone();
              $after = $cloned2;
              $copied = $cloned2.appendTo('#body-term').before($cloned2);
              $parent.find('.add-term').removeClass("add-term").addClass('btn-danger remove-term').html('<i class="fas fa-minus"></i>');
          }
          i++;
          $copied.find('.detail_name').val('');
          $copied.find('.detail_description').val('');
          $copied.find('.detail_id').val('');
    });

      $('#body-term').on("click", ".remove-term", function() {
          $(this).parents('div.form-term').remove();
      });
  </script>
