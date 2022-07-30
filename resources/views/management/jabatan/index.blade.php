@extends('template.template')

@section('content')
<div class="page-inner p-4">
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

    <div class="row pt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <dt>Daftar List</dt>
                            <div class="text-muted mt-0" style="font-size:0.9rem">Daftar Jabatan</div>
                        </div>

                        <div class="card-tools">
                            <div class="btn btn-outline-primary border-br15" id="add_data">
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
                                    <th style="min-width:120px">#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalform">
    <div class="modal-dialog modal-65" role="document">
      <div class="modal-content" id="content-modal">

      </div>
    </div>
</div>


<meta name="csrf-token" content="{{ csrf_token() }}">
@php
    $recordsUrl = route('jbtn.getlist');
    $coldef = ['{targets: 0, width: "60px", className: "dt-right", orderable: true}', '{targets: 0, orderable: false}'];
@endphp
{!! \App\Librari\HelperTBL::instance()->gettable('table_list', $recordsUrl, $coldef) !!}

<script>
    // $('#table_list').DataTable();

    $(function(){
        // swal("Here's the title!", "...and here's the text!","info");
    })

    $('#add_data').click(function(){
        $.ajax({
            type:"POST",
            url: "{{route('jbtn.create')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                },
            beforeSend: function() {
                $('#container').append('<div class="loader"><img src="{{asset("assets/images/preloader_2.gif")}}" /></div>');
            },
            success: function (e) {
               $('#modalform').modal('show');
               $('#content-modal').html(e);
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
    });

    function editMenu(id)
    {
        $.ajax({
            type:"POST",
            url: "{{route('jbtn.create')}}",
            data: {
                _token: "{{ csrf_token() }}",
                id:id,
            },
            beforeSend: function() {
                $('#container').append('<div class="loader"><img src="{{asset("assets/images/preloader_2.gif")}}" /></div>');
            },
            success: function (e) {
               $('#modalform').modal('show');
               $('#content-modal').html(e);
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

    function deletemenu(id)
    {
        swal({
            title: 'Yakin Data Akan dihapus?',
            icon: 'warning',
            buttons:{
                confirm: {
                    text : 'Yes, delete it!',
                    className : 'btn btn-success border-br10'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger border-br10'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    type: "POST",
                    url: "{{route('jbtn.delete')}}",
                    data:{"id":id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(e)
                    {
                    e = jQuery.parseJSON(e);
                        if(e.success == true)
                        {
                            swal({
                                title:"Deleted!",
                                text: "Data Telah Dihapus",
                                icon: "success",
                                buttons: false,
                                timer:1000
                            });
                            $('.table').DataTable().ajax.reload();
                        }
                    }, error: function (xhr, ajaxOptions, thrownError) {
                        swal({
                            title:"Informasi!",
                            text: "Terdapat Kesalahan Data, Segera Hubungi Admin",
                            icon: "warning",
                            buttons: false,
                            timer:1000
                        });
                    }
                });
            } else {
                swal.close();
            }
        });
    };
</script>
@endsection
