<?php

namespace App\Http\Controllers\Kesiswaan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Form;


use App\Librari\GlobalTools;
use App\Models\Student;

class StudentController extends Controller
{
    protected $folder = "kesiswaan.student";
    protected $tabel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tabel = new Student();
    }

    public function index(Request $request)
    {
        $checkAkses = GlobalTools::aksesmenu();
        if($checkAkses->status == true){
            $with['title'] = "Daftar Siswa";
            $with['kelas'] = \App\Models\Kelas::pluck('name','id')->all();
            $with['tahun_akademik'] = \App\Models\Academic_year::whereNull('parent')->pluck('name','id')->all();
            $with['folder'] = $this->folder;
            $with['request'] = $request->all();
            return view($this->folder.'.index', $with);
        }else{
            return redirect('/home');
        }
    }

    public function filterdata(Request $request)
    {
        $with = [];
        return view($this->folder.'.getlist', $with);
    }

    public function getlist(Request $request)
    {
        $tools = new GlobalTools();
        $data  = $this->tabel->filterlist($request);
        $count = count($data->get());

        $records = array();
        $records['iTotalRecords'] = $count;
        $records['iTotalDisplayRecords'] = $count;
        $records['sEcho']         = $request->draw;
        $records["data"]          = array();

        $iTotalRecords  = $count;
        $iDisplayLength = $request->length;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart  = $request->start;
        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        // $filter   = $this->tabel->filterlist($request);
        $listdata = $data->skip($iDisplayStart)->take($iDisplayLength)->orderBy('id','desc')->get();

        $data = [];
        $parentName = "-";
        foreach ($listdata as $x) {
            $row = array();
            $genders   = $tools->gender();
            $religion = $tools->religion();
            $jeniskelamin = isset($genders[$x->gender]) ? $genders[$x->gender] : 'N/A';


            switch($x->status_siswa){
                case 2:
                    $status = "<span class='badge badge-primary p-2'> Aktif </span>";
                break;
                case 3:
                    $status = "<span class='badge badge-success p-2'> LULUS </span>";
                break;
                default:
                $status = "<span class='badge badge-danger p-2'> Terdaftar </span>";

            }
           
            $place = $x->birth_place ?? null;
            $date  = isset($x->birth_date) ? date('d-M-Y',strtotime($x->birth_date)) : null;

            $nama_siswa = "<dt class='text-9'>". $x->name ."</dt>";
            $nama_siswa .="<dd class='text-7 text-primary'>".$jeniskelamin ."</dd>";

            $tombol ="<div class='text-center'>"
             ."<a href='javascript:;' class='badge btn-outline-danger p-2' onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt text-9'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge btn-outline-primary p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt text-9'></i></a>"
             ."</div>";

           $row[] = $tombol;
           $row[] = $x->nis ?? '-';
           $row[] = $nama_siswa;
           $row[] = $place .','.$date;
           $row[] = $x->student_level->kelas->name ?? "<span class='badge badge-danger p-2'>Belum Terdaftar</span>";
           $row[] = $status;

            $records["data"][] = $row;
        }

        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
            $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        echo json_encode($records);
        exit;
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

    function delete(Request $request){

        $delete = $this->tabel->find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }


}
