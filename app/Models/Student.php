<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model {
  use SoftDeletes;

      protected $table = 'student';
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

    public function student_level(){
        return $this->hasOne('App\Models\Student_level','id','student_id')->where('active',1)->orderBy('id','desc');
      }

    public function filterlist($request){
      if (!empty($request->search['value'])){
          $value = $request->search['value'];
              $data =  Student::where('code', 'LIKE', '%' . $value . '%')
              ->orWhere('name', 'LIKE', '%' . $value . '%');
        }else {
              $data = Student::select(['*']);
      }
      return $data;
    }
}
