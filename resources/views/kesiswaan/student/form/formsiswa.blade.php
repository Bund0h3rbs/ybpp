<div class="card-title">
    <dt>Form Data Siswa</dt>
</div>
  <div class="form-group row">
    <label class="control-label col-md-3">Nama</label>
    <div class="col-md-6 input-group">
        {{ Form::text('name',$data->code ?? null, array('class'=>'form-control border-br10', 'required','id'=>'name','placeholder'=>'nama lengkap'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Tempat Lahir</label>
    <div class="col-md-4 input-group">
        {{ Form::text('birth_place',$data->code ?? null, array('class'=>'form-control border-br10', 'required','id'=>'code','placeholder'=>'tempat lahir'))}}
    </div>
    <label class="control-label col-md-2">Tgl Lahir</label>
    <div class="col-md-3 input-group">
        {{ Form::date('birth_date',$data->code ?? null, array('class'=>'form-control border-br10', 'required','id'=>'birth_date'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Jenis Kelamin</label>
    <div class="col-md-5 input-group">
        {{ Form::select('gender',[''=>'-- Pilih --']+$gender, null, array('class'=>'form-control select2 border-br10', 'required','id'=>'gender','data-title'=>'pilih'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Agama</label>
    <div class="col-md-5 input-group">
        {{ Form::select('religion',[''=>'-- Pilih --']+$religion, null, array('class'=>'form-control select2 border-br10', 'required','id'=>'religion','data-title'=>'pilih'))}}
    </div>
  </div>
 <br>
  <dt class="bt-1 mb-0">Informasi Khusus</dt><hr>
  <div class="form-group row">
    <label class="control-label col-md-7">Jumlah Saudara</label>
    <div class="col-md-4 input-group">
        {{ Form::number('total_saudara', null, array('class'=>'form-control border-br10', 'required','id'=>'total_saudara','placeholder'=>'1'))}}
    </div>

  </div>
  <div class="form-group row">
    <label class="control-label col-md-7">Nama yang dapat dihubungi dalam keadaan Darurat</label>
    <div class="col-md-4 input-group">
        {{ Form::select('saudara',[], null, array('class'=>'form-control select2 border-br10', 'required','id'=>'saudara','placeholder'=>'pilih'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-7">No Telp yang dapat dihubungi dalam keadaan Darurat</label>
    <div class="col-md-4 input-group">
        {{ Form::number('no_telp_darurat', null, array('class'=>'form-control border-br10', 'required','id'=>'no_telp_darurat','placeholder'=>'021'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label">Alamat Saat ini</label>
    <div class="input-group">
        {{ Form::textarea('address_siswa',$data->description ?? null, array('class'=>'form-control border-br10','id'=>'address_siswa','placeholder'=>'Jln','rows'=>"5"))}}
    </div>
  </div>
  <div class="card-body text-right">
    <div class="btn btn-outline-primary border-br15 btn-me" id="btn-siswa"> Lanjutkan
        <i class="fas fa-angle-double-right"></i>
    </div>
  </div>


<script>
    $('#btn-siswa').click(function(){
        $('#tab-ortuwali').trigger('click');
    })
</script>

