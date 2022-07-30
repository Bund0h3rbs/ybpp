<?php

namespace App\Librari;

use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Models\Menu_akses;

class GlobalTools {

    public function aksesSuperAdmin()
    {
        $user_id        = Auth::user()->id;
        $checkAkses       = \App\Models\User_akses::where('user_id',Auth::user()->id)
        ->whereHas('akses',function ($q){
            $q->where('code','SPADM');
        })->first();

        $akses = false;
        if($checkAkses){
            $akses = true;
        }

        $data['status']   = $akses;

        return (object)$data;

    }

    public function userAkses()
    {
        $user_id     = Auth::user()->id;
        $checkAkses  = \App\Models\User_akses::where('user_id',Auth::user()->id)->first();

        $akses = false;
        if($checkAkses){
            $akses = true;
        }

        $data['status']   = $akses;
        $data['akses_id'] = $checkAkses->akses_id ?? null;

        return (object)$data;
    }

    public function aksesmenu()
    {
        $path     = request::path();
        $exp      = explode('/', $path);
        $urlMenus = isset($exp[0]) ? $exp[0] : null;

        $akses    = false;

        $checkAkses  = \App\Models\User_akses::where('user_id',Auth::user()->id)->first();

        if($checkAkses){
            $menus = \App\Models\Menu_app::where('link',$urlMenus)->first();
            $menusAkses = \App\Models\Menu_role::where('akses_id', $checkAkses->akses_id)
            ->where('active',1)
            ->where('menu_id', $menus->id ?? null)->first();

            if($menusAkses){
                $akses = true;
            }

        }

        $data['status']   = $akses;

        return (object)$data;

    }

    public function storeAksesDefault($id = null)
    {

        $checkMenuAkses = Menu_akses::where('code','SPADM')->where('active',1)->first();

        // dd($id, $checkMenuAkses);
        if(isset($checkMenuAkses) && $id != null ){
            $data['menu_id']  = $id;
            $data['akses_id'] = $checkMenuAkses->id ?? null;
            $data['active'] = 1;

            \App\Models\Menu_role::create($data);
        }

    }

    public function listMenu($akses_id)
    {
        $menus_parent = [];
        if(!is_null($akses_id)){
            $menusAkses = \App\Models\Menu_role::whereHas('menus',function ($q) {
                $q->whereNull('parent');
            })->where('akses_id', $akses_id)->where('active',1)->pluck('menu_id')->all();

            $menus_parent = \App\Models\Menu_app::whereIn('id',$menusAkses)->where('active',1)->orderBy('no_urut', 'ASC')->get();
         }

        return $menus_parent;
    }

    public function subMenu($menuIds, $akses_id)
    {
        $data = [];
        if(!is_null($akses_id)){
            $menusAkses = \App\Models\Menu_role::whereHas('menus',function ($q) {
                $q->whereNotnull('parent');
            })->where('akses_id', $akses_id)->where('active',1)->pluck('menu_id')->all();;

            // if($menusAkses){
                $menus_parent = \App\Models\Menu_app::whereIn('id',$menusAkses)->where('parent',$menuIds)->orderBy('no_urut', 'ASC')->where('active',1)->get();
            // }
         }

        return $menus_parent;
    }

    public function genderType()
    {
        $jenkel = [
            '1'=>'Laki - Laki',
            '2'=> 'Perempuan'];

        return $jenkel;
    }
    public function gender($id)
    {
        $jenkel = [
            '1'=>'Laki - Laki',
            '2'=> 'Perempuan'];

        $jeniskelamin = $jenkel[$id];
        return $jeniskelamin;
    }

    public function religiontype()
    {
        $agama = [
            '1' =>'ISLAM',
            '2' => 'KRISTEN',
            '3' => 'PROTESTAN',
            '4' => 'HINDU',
            '5' => 'BUDHA',
            '6' => 'KONGHUCU'];

        return $agama;
    }

    public function religion($id)
    {
        $agama = [
            '1' => 'ISLAM',
            '2' => 'KRISTEN',
            '3' => 'PROTESTAN',
            '4' => 'HINDU',
            '5' => 'BUDHA',
            '6' => 'KONGHUCU'];

        $religion = $agama[$id];
        return $religion;
    }

    public function family_status()
    {
        $religion = [
            1=> 'Ayah',
            2=> 'Ibu',
            3=> 'Wali',
            4=> 'Paman',
            5=> 'Bibi',
            6=> 'Saudara Laki-laki',
            6=> 'Saudara Perempuan',
        ];
        return $religion;
    }

    public function uploadFile($request, $folder)
    {
        if ($request->filename) {
            $image = $request->file('filename');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images/'.$folder);
            $image->move($destinationPath, $imagename);
        }

        return $imagename;

    }

    function tglIndo($tgl){

		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $day.'-'.$bulan.'-'.$year;

		return $formattgl;
	}

	function tanggal($tgl){
		$format = date('d-m-Y',strtotime($tgl));
		return $format;
	}

    function tanggalWaktu($tgl){
        $waktu = date('H:i:s',strtotime($tgl));
		$tanggal = $this->tglIndo($tgl);

        $dateTime = $tanggal .' '. $waktu .' WIB';

		return $dateTime;
	}

	function blnIndo($tgl){

		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $bulan.' - '.$year;

		return $formattgl;
	}

    function hariIndo($d){

        $hari = [
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selas',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
		];

        $dayIndo = $hari[$d];

		return $dayIndo;
	}

	function bulanIndo($m){

		$bulan = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
		    '06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];

		$bulanIndo = $bulan[$m];

		return $bulanIndo;
	}

	function formatnominal($id){
		$nominal = 0;
		if($id != null){
			$nominal = number_format($id);
		}
		return $nominal;
	}

	function rupiah($id){
		$nominal = 0;
		if($id != null){
			$nominal = "Rp. ".number_format($id);
		}
		return $nominal;
	}

	function waktuIndo($tgl){
		$waktu = date('H:i',strtotime($tgl));
		$day = date('d',strtotime($tgl));
		$month = date('m',strtotime($tgl));
		$year = date('Y',strtotime($tgl));

		$bulan = $this->bulanIndo($month);

		$formattgl = $day.'-'.$bulan.'-'.$year ." ". $waktu;

		return $formattgl;
	}

    function dayDateToIndo($date){
		$waktu = date('H:i',strtotime($date));
		$day = date('D',strtotime($date));
        $tgl = date('d',strtotime($date));
		$month = date('m',strtotime($date));
		$year = date('Y',strtotime($date));

		$bulan = $this->bulanIndo($month);
        $hari  = $this->hariIndo($day);

		$formattgl = $hari .', '.$tgl.'-'.$bulan.'-'.$year;
		return $formattgl;
	}

}

