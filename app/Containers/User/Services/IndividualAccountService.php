<?php


namespace App\Containers\User\Services;

use App\Containers\User\Models\IndividualAccount;
use Composer\DependencyResolver\Transaction;
use Illuminate\Support\Facades\DB;

class IndividualAccountService
{
  public function createIndividualAccount($data, $userId)
  {
      if(!is_array($data)) {
          $data=$data->toArray();
      }
      \Log::info('createIndividualAccount',$data);
    IndividualAccount::create([
      'www' => $data['www'],
      'business_name' => $data['business_name'],
      'address' => $data['address'],
      'post_code' => $data['postCode'],
      'user_id' => $userId,
    ]);
  }
}
