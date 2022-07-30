<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_family extends Model {
  use SoftDeletes;

      protected $table = 'student_family';
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

    public function student(){
      return $this->belongsTo('App\Models\Student','student_id','id');
    }

    public function filterlist($request){
      if (!empty($request->search['value'])){
          $value = $request->search['value'];
              $data =  Student_family::where('code', 'LIKE', '%' . $value . '%')
              ->orWhere('name', 'LIKE', '%' . $value . '%');
        }else {
              $data = Student_family::select(['*']);
      }
      return $data;
    }
}
