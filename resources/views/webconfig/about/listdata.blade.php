@if(count($data) <= 0)
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-exclamation-triangle text-danger mt-3 mb-3" style="font-size:7rem"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-danger text-8">
                                <div class=" ml-2">
                                    <h4 class="text-bold">INFORMASI</h4>
                                    <hr/>
                                    <dd>Fungsi Tidak Ditemukan</dd>
                                    <dd>Harap Hubungi Administrator / Team IT untuk segera Melakukan Pengecekan</dd>
                                    <dt class="mt-3">TERIMA KASIH !!</dt>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
@foreach ($data as $row)
    <div class="col-md-12">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <dt>{{$row->name ?? null}}</dt>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="p-1 d-flex">
                            <dt class="col-md-3">Kode</dt>
                            <label> {{$row->code ?? null}}</label>
                        </div>
                        <div class="p-1 d-flex text-left">
                            <dt class="col-md-3 col-6">Status</dt>
                            @if(isset($row->active) && $row->active == 1)
                                <span class='badge badge-primary p-2 ml-0'> Publish </span>
                            @else
                                <span class='badge badge-danger p-2 ml-0'> Tidak Dipublish </span>
                            @endif
                        </div>
                        <div class="p-1 d-flex">
                            <dt class="col-md-3 col-6">Tanggal Publish</dt>
                            <label> {{isset($row->date_publish)? $tools->tglIndo($row->date_publish): '-'}}</label>
                        </div>
                        <div class="p-1 d-flex">
                            <dt class="col-md-3 col-6">Tanggal Edit</dt>
                            <label> {{isset($row->updated_at)? $tools->tglIndo($row->updated_at): '-'}}</label>
                        </div>

                        <div class="p-1 pt-4">
                            <h5 class="col-md-3">Deskripsi</h5>
                            <p class="col-md-12"> {!! $row->description ?? null !!}</p>
                        </div>

                        @if(isset($row->detail) && $row->detail == 1)
                        @php
                        $detail = \App\Models\Web_config_detail::where('web_config_id',$row->id)->get();
                        @endphp
                        <div class="p-1 pt-4">
                            <div class="table-responsive">
                                <table id="table_list" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr >
                                            <th width="250px">Kode</th>
                                            <th width="450px">Keterangan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @if(count($detail) > 0)
                                    @foreach ($detail as $x)
                                    <tbody>
                                        <tr >
                                            <td>{{$x->name ?? null}}</td>
                                            <td>{{$x->description ?? null}}</td>
                                            <td>
                                                @if($x->active == 0)
                                                <span class="badge badge-danger p-2">Tidak Aktif</span>
                                                @else
                                                <span class="badge badge-primary p-2">Aktif</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-3 border-l">
                        <div class="form-group pt-3">
                            <label>Filename</label>
                            <br>
                            @if($row->filename)
                            @else
                            <i class="fas fa-exclamation-triangle text-danger mt-3 mb-3 text-12"></i>
                            Tidak Ada File
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="btn btn-warning border-br15" onclick="editMenu({{$row->id}})">
                    <span class="btn-label">
                        <i class="fas fa-edit"></i>
                    </span>
                    Edit Data
                </div>
            </div>
        </div>
    </div>
@endforeach

@endif

<script>
    function editMenu(id)
    {
        $.ajax({
            type:"POST",
            url: "{{route('webabout.create')}}",
            data: {
                _token: "{{ csrf_token() }}",
                id:id,
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
    }
</script>
