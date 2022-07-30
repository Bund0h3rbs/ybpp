<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu_role extends Model {
  use SoftDeletes;

      protected $table = 'menu_role';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];

      public function menus(){
        return $this->belongsTo('App\Models\Menu_app','menu_id','id');
      }

      public function akses(){
        return $this->belongsTo('App\Models\Menu_akses','akses_id','id');
      }

}
