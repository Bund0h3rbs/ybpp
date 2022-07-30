<div class="card-title mb-3">
    <dt>Data Orang Tua/ Wali</dt>
</div>
    <div class="form-group row">
        <label class="control-label col-md-3">Nama Ayah</label>
        <div class="col-md-8 input-group">
            {{ Form::text('name_family[0]',$data->code ?? null, array('class'=>'form-control border-br10','required','id'=>'name','placeholder'=>'nama Ayah'))}}
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Tempat Lahir</label>
        <div class="col-md-4 input-group">
            {{ Form::text('birth_place_family[0]',$data->code ?? null, array('class'=>'form-control border-br10', 'id'=>'code','placeholder'=>'tempat lahir'))}}
        </div>
        <label class="control-label col-md-2">Tgl Lahir</label>
        <div class="col-md-3 input-group">
            {{ Form::date('birth_date_family[0]',$data->code ?? null, array('class'=>'form-control border-br10', 'id'=>'birth_date'))}}
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Agama Ayah</label>
        <div class="col-md-6 input-group">
            {{ Form::select('religion_family[0]',[''=>'--Pilih']+$religion, null, array('class'=>'form-control select2 border-br10', 'id'=>'rgl0'))}}
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Pekerjaan Ayah</label>
        <div class="input-group col-md-6">
            {{ Form::text('job_title_family[0]',$data->code ?? null, array('class'=>'form-control border-br10 col-md-8', 'id'=>'name','placeholder'=>'Guru'))}}
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-md-3">No Telp Ayah</label>
        <div class="input-group col-md-6">
            {{ Form::number('no_telp_family[0]',$data->code ?? null, array('class'=>'form-control border-br10 col-md-8', 'id'=>'name','placeholder'=>'021'))}}
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-md-3">Alamat Ayah</label>
        <div class="input-group col-md-8">
            {{ Form::textarea('address_family[0]',$data->description ?? null, array('class'=>'form-control border-br10','id'=>'description','placeholder'=>'Jln','rows'=>"5"))}}
        </div>
      </div>
  <!-- IBU -->
  <div class="form-group row">
    <label class="control-label col-md-3">Nama Ibu</label>
    <div class="col-md-8 input-group">
        {{ Form::text('name_family[1]',$data->code ?? null, array('class'=>'form-control border-br10', 'id'=>'name','placeholder'=>'nama Ibu'))}}
    </div>
  </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Tempat Lahir</label>
        <div class="col-md-4 input-group">
            {{ Form::text('birth_place_family[1]',$data->code ?? null, array('class'=>'form-control border-br10','id'=>'code','placeholder'=>'tempat lahir'))}}
        </div>
        <label class="control-label col-md-2">Tgl Lahir</label>
        <div class="col-md-3 input-group">
            {{ Form::date('birth_date_family[1]',$data->code ?? null, array('class'=>'form-control border-br10', 'id'=>'birth_date'))}}
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Agama Ibu</label>
        <div class="col-md-6 input-group">
            {{ Form::select('religion_family[1]',[''=>'--Pilih--']+$religion, null, array('class'=>'form-control select2 border-br10', 'id'=>'rgl1'))}}
        </div>
    </div>
    <div class="form-group row">
    <label class="control-label col-md-3">Pekerjaan Ibu</label>
    <div class="input-group col-md-6">
        {{ Form::text('job_title_family[1]',$data->code ?? null, array('class'=>'form-control border-br10 col-md-8','id'=>'name','placeholder'=>'Ibu RT'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">No Telp Ibu</label>
    <div class="input-group col-md-6">
        {{ Form::number('no_telp_family[1]',$data->code ?? null, array('class'=>'form-control border-br10 col-md-8','id'=>'name','placeholder'=>'021'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Alamat Ibu</label>
    <div class="input-group col-md-8">
        {{ Form::textarea('address_family[1]',$data->description ?? null, array('class'=>'form-control border-br10','id'=>'description','placeholder'=>'Jln','rows'=>"5"))}}
    </div>
  </div>
  <!-- Wali -->
 <div class="form-group row">
    <label class="control-label col-md-3">Nama Wali</label>
    <div class="col-md-6 input-group">
        {{ Form::text('name_family[2]',$data->code ?? null, array('class'=>'form-control border-br10', 'id'=>'name','placeholder'=>'nama Wali'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Tempat Lahir</label>
    <div class="col-md-4 input-group">
        {{ Form::text('birth_place_family[2]',$data->code ?? null, array('class'=>'form-control border-br10','id'=>'code','placeholder'=>'tempat lahir'))}}
    </div>
    <label class="control-label col-md-2">Tgl Lahir</label>
    <div class="col-md-3 input-group">
        {{ Form::date('birth_date_family[2]',$data->code ?? null, array('class'=>'form-control border-br10','id'=>'birth_date'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Agama</label>
    <div class="col-md-5 input-group">
        {{ Form::select('religion_family[2]',[''=>'--Pilih--']+$religion, null, array('class'=>'form-control select2 border-br10','id'=>'rgl2'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Jenis Kelamin</label>
    <div class="col-md-5 input-group">
        {{ Form::select('gender_family[2]',[''=>'--Pilih--']+$gender, null, array('class'=>'form-control select2 border-br10','id'=>'gnr2'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Pekerjaan</label>
    <div class="col-md-6 input-group">
        {{ Form::text('job_title_family[2]',$data->code ?? null, array('class'=>'form-control border-br10','id'=>'name','placeholder'=>'Wirausaha'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">No Telp</label>
    <div class="col-md-6 input-group">
        {{ Form::number('no_telp_family[2]',$data->code ?? null, array('class'=>'form-control border-br10','id'=>'no_telp_family','placeholder'=>'021'))}}
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Alamat</label>
    <div class="col-md-8 input-group">
        {{ Form::textarea('address_family[2]',$data->description ?? null, array('class'=>'form-control border-br10','id'=>'address_family','placeholder'=>'Jln','rows'=>"5"))}}
    </div>
  </div>

  <div class="card-body ">
    <div class="btn btn-outline-primary border-br15 btn-me" id="btn-siswa-back">
        <i class="fas fa-angle-double-left"></i> Kembali</div>
    <div class="btn btn-outline-primary border-br15 btn-me float-right" id="btn-wali"> Lanjutkan
        <i class="fas fa-angle-double-right"></i>
    </div>
  </div>

  <script>
    $('#btn-siswa-back').click(function(){
        $('#tab-siswa').trigger('click');
    })

    $('#btn-wali').click(function(){
        $('#tab-kelas').trigger('click');
    })
</script>
