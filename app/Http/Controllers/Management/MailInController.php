<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Form;

use App\Librari\GlobalTools;
use App\Models\Surat_masuk;

class MailInController extends Controller
{
    protected $folder = "management.surat_masuk";
    protected $tabel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tabel = new Surat_masuk();
    }

    public function index(Request $request)
    {
        $checkAkses = GlobalTools::aksesmenu();
        if($checkAkses->status == true){
            $with['title'] = "Surat Masuk";
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
                $status = '<span class="badge badge-primary p-2"> Telah Dikirim </span>';
            }else{
                $status = "<span class='badge badge-danger p-2'> Belum Dikirim </span>";
            }

            $tombol ="<div class='text-center'>"
             ."<a href='javascript:;' class='badge btn-outline-danger p-2' onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt text-9'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge btn-outline-primary p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt text-9'></i></a>"
             ."</div>";

            $row[] = $tombol;
            $row[] = $x->no_surat ?? '-';
            $row[] = $x->tgl_kirim ?? '<span class="text-danger">N/A</span>';
            $row[] = $x->pengirim ?? '<span class="text-danger">N/A</span>';
            $row[] = $x->name ?? '<span class="text-danger">N/A</span>';
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

        $with['data']   = $checkmenu;
        return view($this->folder.'.formcreate', $with);

    }

    public function store(Request $request)
    {
        $input = $request->input();

            foreach ($input as $k => $v) //get value from $_POST
            {
                if(!in_array($k, array("_token","id")))
                {
                    $row[$k]=$v;
                }
            }

        $row['active'] = 0;
        if(isset($request->active)){
            $row['active'] = 1;
        }
        $saveMenus = $this->tabel->find($request->id);
        if($saveMenus){
            $success = true;
            $saveMenus->update($row);
        }else{
            $check_no_surat = $this->tabel->where('no_surat',$request->no_surat)->first();
            if($check_no_surat){
                $success = false;
            }else{
                $this->tabel->create($row);
                $success = true;
            }

        }
        return json_encode(array("success"=>$success));
    }

    function delete(Request $request){

        $delete = $this->tabel->find($request->id);
        if($delete){
            $delete->delete();
        }

        $success = true;
        return json_encode(array("success"=>$success));
    }


}
