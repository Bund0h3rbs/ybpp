<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Librari\GlobalTools;
use App\Models\Web_config;
use App\Models\Web_config_detail;

class AwalController extends Controller
{
    protected $folder = "website";

    public function index()
    {
      $tools = new GlobalTools();
      $with = $this->section2List();
      $with['tools']  = $tools;
      $with['section1List']  = $this->section1List();
      $with['kegiatanList']  = $this->kegiatanList();
      $with['pengurusList']  = $this->pengurusList();

      return view($this->folder.'.index',$with);
    }


    public function section1list()
    {
        $datas = Web_config::where('type',1)->where('code','SKP')->first();
        return $datas;
    }

    public function section2List()
    {
        $datas = Web_config::where('type',1)->where('code','!=','SKP')->first();
        $detail = Web_config_detail::where('web_config_id',$datas->id)->orderBy('id','desc')
        ->where('active',1)->paginate(5);
        $data['data'] = $datas;
        $data['detail'] = $detail;
        return $data;
    }

    public function kegiatanList()
    {
        $data = [];
        return $data;
    }

    public function pengurusList()
    {

        $data = [];
        return $data;
    }

}
