<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    protected $folder = "website.contact";

    public function index()
    {

      return view($this->folder.'.index');
    }

}
