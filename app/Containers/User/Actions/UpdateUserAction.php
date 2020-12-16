<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\Hash;

/**
 * Class UpdateUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserAction extends Action
{

    /**
     * @param \App\Ship\Transporters\DataTransporter $data
     *
     * @return  \App\Containers\User\Models\User
     */
    public function run(/*DataTransporter */$data): User
    {
      \Log::info('updateUserInAction0',array($data));
        $userData = [
           // 'password'             => $data->password ? Hash::make($data->password) : null,
            'name'                 => $data->name,
            'phone'                 => $data->phone,
            'additional_phone'                 => $data->additional_phone,
            'show_email'                 => ($data->show_email=='on') ? true : false,
            'show_phone'                 => ($data->show_phone=='on') ? true : false,
            'show_additional_phone'      => ($data->show_additional_phone=='on') ? true : false,
            'sername'                 => $data->sername,
            'sex'                 => $data->sex,
            'position'                 => $data->position,
            'email'                => $data->email,
            'gender'               => $data->gender,
            'location'               => $data->location,
            'birth_date'                => $data->birth_date,
            'start_date'                => $data->start_date,
            //'non_hashed' => $data->non_hashed ? $data->non_hashed : 'PasswordYouCanChangeIT',
            'social_token'         => $data->token,
            'social_expires_in'    => $data->expiresIn,
            'social_refresh_token' => $data->refreshToken,
            'social_token_secret'  => $data->tokenSecret,
            'skype'=>$data->skype,
        'show_skype'=>$data->show_skype,
        'facebook'=>$data->facebook,
        'show_facebook'=>$data->show_facebook,
        'instagram'=>$data->instagram,
        'show_instagram'=>$data->show_instagram,
        'www'=>$data->www,
        'show_www'=>$data->show_www,
        ];
        // remove null values and their keys
      \Log::info('updateUserInAction1',$userData);
        $userData = array_filter($userData);
      \Log::info('updateUserInAction2',$userData);

        $user = Apiato::call('User@UpdateUserTask', [$userData, $data->id]);

        $additional=[
            'www'=>$data->www,
            'address'=>$data->address,
            'post_code'=>$data->postCode
        ];
      $additional['hours_from_weekday']=$data->hours_from_weekday;
      $additional['minutes_from_weekday']=$data->minutes_from_weekday;
      $additional['hours_till_weekday']=$data->hours_till_weekday;
      $additional['minutes_till_weekday']=$data->minutes_till_weekday;
      $additional['hours_from_saturday']=$data->hours_from_saturday;
      $additional['minutes_from_saturday']=$data->minutes_from_saturday;
      $additional['hours_till_saturday']=$data->hours_till_saturday;
      $additional['minutes_till_saturday']=$data->minutes_till_saturday;
      $additional['hours_from_sunday']=$data->hours_from_sunday;
      $additional['minutes_from_sunday']=$data->minutes_from_sunday;
      $additional['hours_till_sunday']=$data->hours_till_sunday;
      $additional['minutes_till_sunday']=$data->minutes_till_sunday;
        if($data->current_type=='Организация'){
          \Log::info('OrganisationAccount',$additional);
            $additional['organisation_name']=$data->organisation_name;
        \App\Containers\User\Models\OrganisationAccount::where('user_id',$data->id)->update($additional);
        }
        elseif($data->current_type=='Предприниматель'){
            $additional['business_name']=$data->business_name;
            \App\Containers\User\Models\IndividualAccount::where('user_id',$data->id)->update($additional);
        }
        elseif($data->current_type=='Компания'){
          \Log::info('popali to company');
            $additional['phisical_address']=$data->phisical_address;
            $additional['phisical_post_code']=$data->phisical_post_code;
            $additional['reg_number']=$data->regNumber;
            $additional['vat_number']=$data->vatNumber;

          $additional['company_name']=$data->company_name;

            \App\Containers\User\Models\BusinessAccount::where('user_id',$data->id)->update($additional);
        }
        return $user;
    }
}
