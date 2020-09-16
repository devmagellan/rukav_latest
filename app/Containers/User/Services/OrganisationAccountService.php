<?php


namespace App\Containers\User\Services;

use App\Containers\User\Models\OrganisationAccount;
use Composer\DependencyResolver\Transaction;
use Illuminate\Support\Facades\DB;

class OrganisationAccountService
{
  public function createOrganisationAccount($data, $userId)
  {
      try {
      if(!is_array($data)) {
          $data=$data->toArray();
      }
      \Log::info('createOrganisationAccount',array($data));
      OrganisationAccount::create([
      'www' => $data['www'],
      'organisation_name' => $data['organisation_name'],
      'address' => $data['address'],
      'post_code' => $data['postCode'],
      'user_id' => $userId,
      'hours_from_weekday'=> (isset($data['hours_from_weekday'])) ? $data['hours_from_weekday'] : null,
      'minutes_from_weekday'=> (isset($data['minutes_from_weekday'])) ? $data['minutes_from_weekday'] : null,
      'hours_till_weekday'=> (isset($data['hours_till_weekday'])) ? $data['hours_till_weekday'] : null,
      'minutes_till_weekday'=> (isset($data['minutes_till_weekday'])) ? $data['minutes_till_weekday'] : null,
      'hours_from_saturday'=> (isset($data['hours_from_saturday'])) ? $data['hours_from_saturday'] : null,
      'minutes_from_saturday'=> (isset($data['minutes_from_saturday'])) ? $data['minutes_from_saturday'] : null,
      'hours_till_saturday'=> (isset($data['hours_till_saturday'])) ? $data['hours_till_saturday'] : null,
      'minutes_till_saturday'=> (isset($data['minutes_till_saturday'])) ? $data['minutes_till_saturday'] : null,
      'hours_from_sunday'=> (isset($data['hours_from_sunday'])) ? $data['hours_from_sunday'] : null,
      'minutes_from_sunday'=> (isset($data['minutes_from_sunday'])) ? $data['minutes_from_sunday'] : null,
      'hours_till_sunday'=> (isset($data['hours_till_sunday'])) ? $data['hours_till_sunday'] : null,
      'minutes_till_sunday'=> (isset($data['minutes_till_sunday'])) ? $data['minutes_till_sunday'] : null,
      'show_work_hours'=> (isset($data['show_work_hours'])) ? $data['show_work_hours'] : null,

    ]);
      } catch (\Throwable $exception) {
          \Log::info('exception',array($exception));
      }
  }
}
