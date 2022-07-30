<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu_app extends Model {
  use SoftDeletes;

      protected $table = 'menu_app';
      protected $guarded = ['id'];
      protected $dates = ['deleted_at'];


      public function setName($value)
      {
          $this->attributes['name'] = $value;
      }

      public function setCode($value)
      {
          $this->attributes['code'] = $value;
      }

      public function parents()
      {
          return $this->hasOne('App\Models\Menu_app', 'id', 'parent');
      }

      public function parentsIndex()
      {
        $parentalIndex = "#" . str_pad($this->id, 3, '0', STR_PAD_LEFT);
        $this->level = 1;

        if ($this->parent !== null && $this->parent != 0 && $this->parents()) {
            $p = Menu_app::find($this->parent);
            if ($p) {
                $parentalIndex = str_pad($p->parentsIndex(), 3, '0', STR_PAD_LEFT) . "_" . $parentalIndex;
                $this->level += $p->level;
            }
        }
        $this->parentalIndex = $parentalIndex;
        return $parentalIndex;
      }

      public static function nestedSelect($tmp_depts = array())
      {
          if (empty($tmp_depts)) {
              $tmp_depts = Menu_app::all();
          }
          $depts = array();
          foreach ($tmp_depts as $key => $val) {
              $pi = $val->parentsIndex();
              $prefix = '';
              for ($i = 0; $i < $val->level - 1; $i++) {
                  $prefix .= '-';
              }
              $val->setName($prefix .' '. $val->name);
              $depts[$pi . '#id_' . $val->id] = $val->name;
          }
          ksort($depts);
          $result = array();
          foreach ($depts as $key => $r) {
              $key = substr($key, strpos($key, "#id_") + 4);
              $result[$key] = $r;
          }
          return $result;
      }

      public static function nestedList($tmp_depts = array())
      {
          if (empty($tmp_depts)) {
              $tmp_depts = Menu_app::get();
          }

          $depts = array();
          foreach ($tmp_depts as $key => $val) {
              $pi = $val->parentsIndex();
              $prefix = '';
              for ($i = 0; $i < $val->level - 1; $i++) {
                  $prefix .= '- ';
              }

              $val->setName($prefix . $val->name);
              $val->setCode($prefix . $val->code);
              $depts[$pi] = $val;
          }
          ksort($depts);
          $result = array();
          foreach ($depts as $key => $r) {
              $result[] = $r;
          }
          return $result;
      }


      public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
                $data =  Menu_app::where('id', 'LIKE', '%' . $value . '%')
                ->orWhere('name', 'LIKE', '%' . $value . '%')
                ->orWhere('link', 'LIKE', '%' . $value . '%');
         }else {
                $data = Menu_app::select(['*']);
        }
        return $data;
    }

}
