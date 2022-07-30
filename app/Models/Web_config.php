<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Web_config extends Model {
  use SoftDeletes;

      protected $table = 'web_config';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];

      public static $rules = array(
        'code' => 'required',
        'name' => 'required'
    );

    public function validate($data)
    {
        $v = Validator::make($data, Web_config::$rules);
        return $v;
    }

}
