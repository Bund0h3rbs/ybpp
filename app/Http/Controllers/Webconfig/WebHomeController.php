<?php

namespace App\Http\Controllers\Webconfig;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Form;


use App\Librari\GlobalTools;
use App\Models\Web_config;
use App\Models\Web_config_detail;

class WebHomeController extends Controller
{
    protected $folder = "webconfig.home";
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

            $with['folder']  = $this->folder;
            $with['request'] = $request->all();
            return view($this->folder.'.index', $with);
        }else{
            return redirect('/home');
        }
    }

    public function getlist(Request $request)
    {
        $tools = new GlobalTools();

        $with['data'] = $this->tabel->where('type',1)->get();
        $with['tools'] = $tools;
        return view($this->folder.'.listdata', $with);
    }


    public function create(Request $request)
    {
        $id    = $request->id;
        $datas = $this->tabel->find($id);
        $detail =  Web_config_detail::where('web_config_id',$datas->id ?? null)->get();

        $with['data']   = $datas;

        if($datas){
            if($datas->code == 'SKP'){
                return view($this->folder.'.formedit', $with);
            }else{
                $with['detail'] = $detail;
                return view($this->folder.'.formEdit_kedua', $with);
            }
        }else{
            return redirect('/webhome');
        }
    }

    public function store(Request $request)
    {
        $tools = new GlobalTools();
        $input = $request->all();

            foreach ($input as $k => $v) //get value from $_POST
            {
                if(!in_array($k, array("_token","filename","id")))
                {
                    $row[$k]=$v;
                }
            }

            $row['active']       = 0;
            if($request->active){
                $row['active']   = 1;
            }

            $detail_id        = $request->detail_id;
            $detail_name        = $request->detail_name;
            $detail_description = $request->detail_description;

            $row['date_publish']   = date('Y-m-d');
            $data_artikel = $this->tabel->find($request->id);
            if($data_artikel){
                if(isset($request->filename)){
                    $row['filename'] = $tools->uploadFile($request, 'artikel');
                }

                $data_artikel->update($row);

                if(count($detail_id) > 0){
                    Web_config_detail::whereNotin('id',$detail_id)->where('web_config_id', $data_artikel->id)->delete();
                    foreach($detail_id as $x => $value){
                        $detail['name']        = isset($detail_name[$x]) ? $detail_name[$x] : null;
                        $detail['description'] = isset($detail_description[$x])? $detail_description[$x] : null;
                        $detail['web_config_id'] = $data_artikel->id;

                        $detail_web = Web_config_detail::find($value);
                        if($detail_web){
                            $detail_web->update($detail);
                        }else{
                            Web_config_detail::create($detail);
                        }
                    }
                }
            }
        // dd($row);
        $success = true;
        return json_encode(array("success"=>$success));
    }


}
