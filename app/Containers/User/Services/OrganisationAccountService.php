<?php


namespace App\Containers\User\Services;

use App\Containers\User\Models\OrganisationAccount;
use Composer\DependencyResolver\Transaction;
use Illuminate\Support\Facades\DB;

class OrganisationAccountService
{
  public function createOrganisationAccount($data, $userId)
  {
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
    ]);
  }
}
