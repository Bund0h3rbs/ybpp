<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_akses extends Model {
  use SoftDeletes;

    protected $table = 'user_akses';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public static $rules = array(
        'user_id' => 'required',
        'akses_id' => 'required'
    );

    public function validate($data)
    {
        $v = Validator::make($data, User_akses::$rules);
        return $v;
    }

    public function akses()
    {
        return $this->belongsTo('App\Models\Menu_akses','akses_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\user','user_id','id');
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
                $data =  User_akses::whereHas('users',function ($q) use($value){
                    $q->where('email', 'LIKE', '%' . $value . '%')
                ->orWhere('name', 'LIKE', '%' . $value . '%');
                })->orwhereHas('akses',function ($q) use($value){
                    $q->Where('name', 'LIKE', '%' . $value . '%');
                });
          }else {
                $data = User_akses::select(['*']);
        }

        $data->whereHas('akses',function($q){
            $q->where('code','!=','SPADM');
        });
        return $data;
    }

}
