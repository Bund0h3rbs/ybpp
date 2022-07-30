<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProgramController extends Controller
{
    protected $folder = "website.program";

    public function index()
    {

      return view($this->folder.'.index');
    }

}
