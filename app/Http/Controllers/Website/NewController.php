<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NewController extends Controller
{
    protected $folder = "website.news";

    public function index()
    {

      return view($this->folder.'.index');
    }

}
