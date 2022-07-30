<?php

namespace App\Http\Controllers\Webconfig;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Form;


use App\Librari\GlobalTools;
use App\Models\Web_config;

class WebProgramController extends Controller
{
    protected $folder = "webconfig.program";
    protected $tabel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tabel = new Web_config();
    }

    public function index(Request $request)
    {
        $checkAkses = GlobalTools::aksesmenu();
        if($checkAkses->status == true){
            $with['title'] = "Daftar Siswa";
            $with['folder'] = $this->folder;
            $with['request'] = $request->all();
            return view($this->folder.'.index', $with);
        }else{
            return redirect('/home');
        }
    }

    public function create(Request $request)
    {
        $tools =
        $id = $request->id;
        $checkmenu = $this->tabel->find($id);

        $with['data']   = $checkmenu;
        $with['folder'] = $this->folder.'.form';
        $with['gender']   = GlobalTools::gender();
        $with['religion'] = GlobalTools::religion();
        return view($this->folder.'.form.defaultform', $with);

    }

    public function store(Request $request)
    {
        $input = $request->input();

        $name_family        = $request->name_family;
        $birth_place_family = $request->birth_place_family;
        $birth_date_family  = $request->birth_date_family;
        $religion_family    = $request->religion_family;
        $job_title_family   = $request->job_title_family;
        $no_telp_family     = $request->no_telp_family;
        $address_family     = $request->address_family;

            foreach ($input as $k => $v) //get value from $_POST
            {
                if(!in_array($k, array("_token")))
                {
                    $row[$k]=$v;
                }
            }

            $row['active']       = 1;
            $row['status_siswa'] = 1;
            $row['address']      = $request->address_siswa ?? null;
            $student =  $this->tabel->create($row);
            $student_id = $student->id;
            foreach($name_family as $x => $value){
                if($value){
                    switch($x){
                        case 0:
                            $gender = 1;
                            $family_status = 1;
                        break;
                        case 1:
                            $gender = 2;
                            $family_status = 2;
                        break;
                        default:
                           $gender = null;
                           $family_status = 3;

                    }
                    $family['student_id']  = $student_id;
                    $family['name']        = $value;
                    $family['birth_place'] = isset($birth_place_family[$x]) ? $birth_place_family[$x] : null;
                    $family['birth_date '] = isset($birth_date_family[$x]) ? $birth_date_family[$x] : null;
                    $family['religion']    = isset($religion_family[$x]) ? $religion_family[$x] : null;
                    $family['address']     = isset($address_family[$x]) ? $address_family[$x] : null;
                    $family['no_telp']     = isset($no_telp_family[$x]) ? $no_telp_family[$x] : null;

                    $family['gender']      = $gender;
                    $family['active']      = 1;
                    $family['family_status'] = $family_status;
                    \App\Models\Student_family::create($family);
                    // $kel[] = $family;
                }
            }

        $success = true;
        echo json_encode(array("success"=>$success));
    }


}
