<?php

namespace App\Containers\User\Services;

use App\Containers\User\Models\User;
use Twilio\Jwt\ClientToken;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use App\Containers\User\UI\WEB\Requests\RegisterUserRequest;

/**
 * Class Controller
 *
 * @package App\Containers\Authorization\UI\WEB\Controllers
 */
class SmsService
{
    protected $code, $smsVerifcation;

    function __construct()
    {
        $this->smsVerifcation = new \App\Containers\Authorization\Models\SmsVerification();
    }

    public function store($request)
    {
        $code = rand(1000, 9999); //generate random code
        //$request->input('code') = $code; //add code in $request body

      if ($request->all()[0] instanceof User) {


        \Log::info('request-info',$request->all()[0]->toArray());
        $reqArray=[];
        $reqArray['code']=$code;
        $reqArray['phone']=$request->all()[0]->toArray()['phone'];
        $data['store']=$this->smsVerifcation->store($reqArray)['id'];

        $data['message']=$this->sendSms($reqArray);
      }
      else{
        $request->request->add(['code' => $code]);
        $data['store']=$this->smsVerifcation->store($request)['id']; //call store method of model
        $data['message']=$this->sendSms($request->all());}
        return $data;
    }

    public function sendSms($request)
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $authTelephone = config('app.twilio')['TWILIO_PHONE'];
        try
        {

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
            $sid    = $accountSid;
            $token  = $authToken;
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create($request['phone'], // to
                    ["body" => "Hi there! your confirmation code is ".$request['code'], "from" => $authTelephone]
                );

            return $message;
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verifyContact(Request $request)
    {
        $smsVerifcation =
            $this->smsVerifcation::where('contact_number','=',
                $request->contact_number)
                ->latest() //show the latest if there are multiple
                ->first();
        if($request->code == $smsVerifcation->code)
        {
            $request["status"] = 'verified';
            return $smsVerifcation->updateModel($request);
            $msg["message"] = "verified";
            return $msg;
        }
        else
        {
            $msg["message"] = "not verified";
            return $msg;
        }
    }


}
