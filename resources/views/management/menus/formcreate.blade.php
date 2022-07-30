{{ Form::open(array('class'=>"form","role"=>"form","id"=>"form-create","novalidate"=>"novalidate"))}}
<div class="modal-header pb-2">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="text-center">
        <dt class="text-12">Form Menu Sistem</dt>
        <span class="text-muted text-8"> Pastikan inputan sesuai dengan ketentuan yang telah di tetapkan</span>
    </div>
    <div class="col-md-12 mt-2">
        <div class="form-group">
            <label>Nama Menu / Title</label>
            <div class="input-group">
            {{ Form::text('name',$data->name ?? null, array('class'=>'form-control border-br10', 'required','id'=>'name','placeholder'=>'Pengaturan'))}}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8">
                <label>Parent</label>
                {{Form::select('parent',[''=>'Pilih']+$parent, $data->parent ?? null,array('class'=>'form-control select2 border-br-10','data-placeholder'=>'Pilih Salah Satu','id'=>'parent'))}}
                <span class="text-muted-info text-8">Jika menu memiliki induk</span>
            </div>
            <div class="col-md-4">
                <label>Urutan</label>
                <div class="input-group">
                {{ Form::number('no_urut',$data->no_urut ?? null, array('class'=>'form-control border-br10','id'=>'no_urut','placeholder'=>'1','required'))}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Link / Route</label>
            {{ Form::text('link',$data->link ?? null, array('class'=>'form-control border-br10','id'=>'link','placeholder'=>'Pengaturan'))}}
            <span class="text-muted text-8">referensi akses route menu</span>
        </div>
        <div class="form-group">
            <label>Icon </label>
            {{ Form::text('icon',$data->icon ?? null, array('class'=>'form-control border-br10','id'=>'icon','placeholder'=>'Pengaturan'))}}
            <span class="text-muted text-8">suport icon fontawesome & flaticon</span>
        </div>
        <div class="form-group">
            <label>Keterangan </label>
            {{ Form::textarea('description',$data->description ?? null, array('class'=>'form-control border-br10','id'=>'description','placeholder'=>'Pengaturan','rows'=>"5"))}}
        </div>
        <div class="form-group row">
            <div class="col-md-8">
                <dt class="text-9">Publish Menu</dt>
                <span class="text-muted text-8">Pilih slide untuk mengaktifkan menu, default menu akan di set draf</span>
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
            <div>
        </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary border-br15" id="btn-proses">
        <i class="fa fa-save"></i>
        Proses Data
    </button>
  </div>
</div>
{{ Form::hidden('id',$data->id ?? null, array('class'=>'form-control','readonly'))}}

{{Form::close()}}

<script>

$(function(){
    $('.select2').select2({
        theme: 'bootstrap4'
    });

})

    $.validator.setDefaults({
        submitHandler: function () {
            saveform();
        }
    });
    $('#form-create').validate({
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
        $.ajax({
        type: "POST",
        url: "{{route('menus.store')}}",
        data: $("#form-create").serialize(), // serializes the form's elements.
        beforeSend: function () {
            // $('#form_create').append('<div class="loader "><div class="loading"></div></div>');
        },
        success: function(data)
        {
            // $('.loader').remove();
            data = jQuery.parseJSON(data);
            if(data.success == true)
            {
            $('#form-create')[0].reset();
                $(".close").trigger('click');
                $('#table_list').DataTable().ajax.reload();
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
