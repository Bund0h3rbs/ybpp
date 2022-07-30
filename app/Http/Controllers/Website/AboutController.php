<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Librari\GlobalTools;
use App\Models\Web_config;
use App\Models\Web_config_detail;

class AboutController extends Controller
{
    protected $folder = "website.about";

    public function index()
    {
        $tools = new GlobalTools();
        $visi = Web_config_detail::whereHas('webconfig',function($q){
            $q->where('type',2)->where('code','VS');
        })->get();

        $misi = Web_config_detail::whereHas('webconfig',function($q){
            $q->where('type',2)->where('code','MS');
        })->get();

        $with['tools']   = $tools;
        $with['ttgyys']  = Web_config::where('type',2)->where('code','TYYS')->first();
        $with['mdt']     = Web_config::where('type',2)->where('code','MDT')->first();
        $with['visi']    = $visi;
        $with['misi']    = $misi;

        $with['ketua']  = null;

        return view($this->folder.'.tentang-kami',$with);
    }


    public function struktur(Request $reqeust)
    {
        return view($this->folder.'.stuktur');
    }

    public function legalitas(Request $reqeust)
    {
        return view('website.maintance');
    }



}
