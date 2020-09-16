<?php

namespace App\Containers\Authorization\Models;

use Illuminate\Database\Eloquent\Model;

class SmsVerification extends Model
{
    protected $fillable = [
        'phone','code','status'
    ];
    public function store($request)
    {
      $request['phone']=$request['phonecode'].$request['phone'];
      $req=(is_array($request)) ? $request : $request->all();
        $this->fill($req);
        $sms=[];
        $sms['response'] = $this->save();
        $sms['id']=$this->id;
        return $sms;
        //return response()->json($sms, 200);
    }
    public function updateModel($request)
    {
        $this->update($request->all());
        return $this;
    }
}
