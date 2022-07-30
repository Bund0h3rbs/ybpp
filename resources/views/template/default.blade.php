@extends('template.template')
@section('content')
<div class="panel-header bg-primary-gradient text-white bubble-shadow">
    <div class="page-inner p-4 py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <span class="text-white pb-2 text-12">Dashboard</span>
                <h5 class="text-white op-7 mb-2">Informasi Terkait Penggunaan Aplikasi Secara Keseluruhan</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <dt class="text-white op-7 mb-2">Yayasan Bhakti Purna Pora</dt>
                <span class="text-white"></span>
            </div>
        </div>
    </div>
</div>

<div class="page-inner p-4 mt--5">
    <div class="row mt--2">
        <div class="col-md-8">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">
                        <i class="fas fa-clock"></i> Terbaru</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">Total Anggota</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Agenda</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Program Kerja</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-info card-annoucement card-round">
                <div class="card-body text-center">
                    <div class="card-opening">Welcome {{Auth::user()->name}},</div>
                    <div class="text-justify mt-2 mb-2">
                        Silahkan gunakan menu yang tersedia untuk menungjang performa anda hari ini,
                        jangan lupa berdoa, jika ada pertanyaan, segera hubungi administrator.
                        <b>Terima kasih</b>
                    </div>
                    <div class="card-detail">
                        <a href="{{url('activity')}}" class="btn btn-light btn-rounded">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
