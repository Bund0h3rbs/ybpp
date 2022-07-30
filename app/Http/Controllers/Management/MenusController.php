<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Form;

use App\Models\Menu_app;
use App\Librari\GlobalTools;

class MenusController extends Controller
{
    protected $folder = "management.menus";
    protected $tabel;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tabel = new Menu_app();
    }

    public function index(Request $request)
    {
        $checkAkses = GlobalTools::aksesSuperAdmin();
        if($checkAkses->status == true){
            $with['title'] = "Menu Sistem";
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

            if($x->active == '1'){
              $status = '<span class="badge badge-primary p-2"> Publish </span>';
            }else{
              $status = "<span class='badge badge-danger p-2'> Draf </span>";
            }

            if($x->icon){
              $icon = "<i class='".$x->icon ."'></i>";
            }else{
              $icon = "-";
            }
            $parent = $x->parents->name ?? '-';
            $tombol ="<div class='text-center'>"
             ."<a href='javascript:;' class='badge btn-outline-danger p-2' onclick='deletemenu(".$x->id.");' title='Hapus Data'><i class='fa fa-trash-alt text-9'></i></a>&nbsp;"
             ."<a href='javascript:;' class='badge btn-outline-primary p-2' onclick='editMenu(".$x->id.");' title='Edit Data' ><i class='fas fa-pencil-alt text-9'></i></a>"
             ."<a href='javascript:;' class='badge btn-outline-success p-2' onclick='aksesMenu(".$x->id.");' title='Role Menu' ><i class='fas fa-cogs text-9'></i></a>"
             ."</div>";

           $row[] = $tombol;
           $row[] = $icon;
           $row[] = "<div style='width:150px'>".$x->name ?? 'na'."</div>";
           $row[] = "<div style='width:150px'>".$parent."</div>";
           $row[] = "/".$x->link ?? '';
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
        $checkmenu = Menu_app::find($id);

        $with['data']   = $checkmenu;
        $with['parent'] = Menu_app::nestedSelect();
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
        $saveMenus = Menu_app::find($request->id);
        if($saveMenus){
            $menuSystem = $saveMenus->update($row);
            // $idmenus = $request->id;
        }else{
            $menuSystem = Menu_app::create($row);
            $idmenus = $menuSystem->id;
            GlobalTools::storeAksesDefault($idmenus);
        }


        $success = true;
        echo json_encode(array("success"=>$success));
    }

    function delete(Request $request){

        $delete = $this->tabel->find($request->id);
        if($delete){
            \App\Models\Menu_role::where('menu_id',$request->id)->delete();
            $delete->delete();
        }

        $success = true;
        echo json_encode(array("success"=>$success));
    }

    public function settingAkses(Request $request)
    {

        $menu_id = $request->id;

        $checkMenuakses = \App\Models\Menu_role::where('menu_id',$menu_id)->get();
        $menuAkses      = \App\Models\Menu_akses::pluck('name','id')->all();
        $data           = \App\Models\Menu_app::find($request->id);

        foreach($menuAkses as $key => $value){
            $menuRole[$key] = \App\Models\Menu_role::where(['menu_id'=>$menu_id,'akses_id'=>$key,'active'=>1])->first();
        }

        // dd($menuRole, $menu_id);

        $with['menuRole']  = $menuRole;
        $with['menuAkses'] = $menuAkses;
        $with['data']      = $data;

        return view($this->folder.'.formMenuAkses', $with);
    }


    public function storeakses(Request $request)
    {
        $select_akses = isset($request->select_cek) ? $request->select_cek : [];
        $menu_id      = $request->menu_id;

        if(count($select_akses ) > 0){
            $checkaksesmenu = \App\Models\Menu_role::where('menu_id',$menu_id)->whereNotin('akses_id',$select_akses)->count();
            // dd($checkaksesmenu);
            if($checkaksesmenu > 0){
                $row_update['active'] = 0;
                \App\Models\Menu_role::where('menu_id',$menu_id)->whereNotin('akses_id',$select_akses)->update($row_update);
            }

            foreach($select_akses as $key => $value){
                $row['menu_id']  = $menu_id;
                $row['akses_id'] = $value;
                $row['active']   = 1;
                $aksesmenu = \App\Models\Menu_role::where('menu_id',$menu_id)->where('akses_id',$value)->first();
                if($aksesmenu){
                    $aksesmenu->update($row);
                }else{
                    \App\Models\Menu_role::create($row);
                }
            }
        }

        echo json_encode(array("success"=>true));
    }

}
