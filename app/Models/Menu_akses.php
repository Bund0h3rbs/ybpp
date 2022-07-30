<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu_akses extends Model {
  use SoftDeletes;

      protected $table = 'menu_akses';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];


}
