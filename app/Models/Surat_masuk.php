<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat_masuk extends Model {
  use SoftDeletes;

      protected $table = 'surat_masuk';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];

      public static $rules = array(
        'code' => 'required',
        'name' => 'required'
    );

    public function validate($data)
    {
        $v = Validator::make($data, Kelas::$rules);
        return $v;
    }

    public function filterlist($request){
      if (!empty($request->search['value'])){
          $value = $request->search['value'];
              $data =  Surat_masuk::where('code', 'LIKE', '%' . $value . '%')
              ->orWhere('name', 'LIKE', '%' . $value . '%');
        }else {
              $data = Surat_masuk::select(['*']);
      }
      return $data;
    }
}
