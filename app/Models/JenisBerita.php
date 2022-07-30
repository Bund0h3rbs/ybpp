<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBerita extends Model {
  use SoftDeletes;

      protected $table = 'jenis_berita';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];

      public static $rules = array(
        'code' => 'required',
        'name' => 'required'
    );

    public function validate($data)
    {
        $v = Validator::make($data, Jabatan::$rules);
        return $v;
    }

    public function filterlist($request){
      if (!empty($request->search['value'])){
          $value = $request->search['value'];
              $data =  JenisBerita::where('code', 'LIKE', '%' . $value . '%')
              ->orWhere('name', 'LIKE', '%' . $value . '%');
        }else {
              $data = JenisBerita::select(['*']);
      }
      return $data;
    }
}
