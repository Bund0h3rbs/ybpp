<div class="card full-height">
  <div class="card-header">
      <div class="card-head-row">
          <div class="card-title">
              <dt>Daftar List</dt>
              <div class="text-muted mt-0" style="font-size:0.8rem">Data Siswa </div>
          </div>

          <div class="card-tools">
              <div class="btn btn-outline-primary border-br15 btn-me" id="add_data">
                  <span class="btn-label">
                      <i class="flaticon-plus"></i>
                  </span>
                  Add Data
              </div>
          </div>
      </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table id="table_list" class="table table-bordered table-striped" >
            <thead>
                <tr class="bg-primary text-white">
                    <th style="min-width:80px">#</th>
                    <th style="max-width:100px">NIS</th>
                    <th style="min-width:130px">Nama</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Kelas / Tingkatan</th>
                    <th>Status</th>
                </tr>
            </thead>

        </table>
    </div>
  </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
@php
    $recordsUrl = route('anggota.getlist');
    $coldef = ['{targets: 0, width: "60px", className: "dt-right", orderable: true}', '{targets: 0, orderable: false}'];
@endphp
{!! \App\Librari\HelperTBL::instance()->gettable('table_list', $recordsUrl, $coldef) !!}


<script>
    $('#add_data').click(function(){
        $.ajax({
            type:"POST",
            url: "{{route('anggota.create')}}",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function() {
                $('.content').append('<div class="preloader"><div class="loading"></div></div>');
            },
            success: function (e) {
               $('.preloader').remove();
               $('#default_form').html(e);
            }, error: function (xhr, ajaxOptions, thrownError) {
                $('.preloader').remove();
                swal({
                    title:"Informasi!",
                    text: "Terdapat Kesalahan Data, Segera Hubungi Admin",
                    icon: "warning",
                    buttons: false,
                    timer: 2000,
                });
            }
        });
    })
</script>
