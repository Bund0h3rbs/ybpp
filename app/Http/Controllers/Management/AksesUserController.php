<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Form;


use App\Librari\GlobalTools;
use App\Models\User_akses;
use App\Models\User;

class AksesUserController extends Controller
{
    protected $folder = "management.aksesuser";
    protected $tabel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tabel = new User_akses();
    }

    public function index(Request $request)
    {

        $checkAkses = GlobalTools::aksesmenu();
        if($checkAkses->status == true){
            $with['title'] = "Pengguna";
            return view($this->folder.'.index', $with);
        }else{
            return redirect('/home');
        }

    }

    public function getlist(Request $request)
    {

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

            if($x->active == 1){
              $status = '<span class="badge badge-primary p-2"> Aktif </span>';
            }else{
             $status = "<span class='badge badge-danger p-2'> Tidak Aktif </span>";
            }

            $tombol ="<div class='text-center'>"
             ."<a href='javascript:;' class='badge btn-outline-danger p-2' onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt text-9'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge btn-outline-primary p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt text-9'></i></a>"
             ."<a href='javascript:;' class='badge btn-outline-success p-2' onclick='resetPassword(".$x->id.");' title='Reset Password' Data' ><i class='fas fa-lock text-9'></i></a>"
             ."</div>";

           $row[] = $tombol;
           $row[] = $x->users->name ?? '-';
           $row[] = "<div style='width:150px'>".$x->users->email ?? 'na'."</div>";
           $row[] = $x->akses->name ?? 'N/A';
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
        $id = $request->id;
        $checkmenu = $this->tabel->find($id);

        $with['data']      = $checkmenu;
        $with['aksesRole'] = \App\Models\Menu_akses::where('code','!=','SPADM')->pluck('name','id')->all();
        return view($this->folder.'.formcreate', $with);

    }


    public function store(Request $request)
    {
        $input = $request->input();

        // Set User Dahulu

        if(isset($request->id)){
            $user_akses = $this->tabel->find($request->id);
            $users = User::find($user_akses->user_id);
            if($users){
                $users->name  = $request->name;
                $users->email = $request->email;
                $users->password = Hash::make($request->password);
                $users->save();
            }

            if($user_akses){
                $user_akses->akses_id = $request->akses_id;
                $user_akses->save();
            }

            $with['success'] = true;
            $with['pesan'] = "Email telah Terdaftar";
            return json_encode($with);
        }else{

            $users = User::where('email',$request->email)->first();
            if($users){
                $with['success'] = false;
                $with['pesan'] = "Email telah Terdaftar";
                return json_encode($with);
            }

            $users['name']  = $request->name;
            $users['email'] = $request->email;
            $users['password'] = Hash::make($request->password);

            $userssave = User::create($users);

            $row['user_id']  = $userssave->id;
            $row['akses_id'] = $request->akses_id;
            $row['active'] = 0;
            if(isset($request->active)){
                $row['active'] = 1;
            }

            $this->tabel->create($row);
            $with['success'] = true;
            $with['pesan'] = "Email telah Terdaftar";
            return json_encode($with);

        }
    }

    function delete(Request $request){

        $delete = $this->tabel->find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        return json_encode(array("success"=>$success));
    }

    function resetpassword(Request $request){

        $akses = $this->tabel->find($request->id);

        $users = User::find($akses->user_id);
        if($users){

            $users->password = Hash::make('sekolah2022');
            $users->save();
        }

        $success = true;
        return json_encode(array("success"=>$success));
    }


}
