<?php


namespace App\Containers\User\Services;

use App\Containers\User\Models\BusinessAccount;
use Composer\DependencyResolver\Transaction;
use Illuminate\Support\Facades\DB;

class BusinessAccountService
{
  public function createBusinessAccount($data, $userId)
  {

    if(!is_array($data)) {
        $data=$data->toArray();
    }
    \Log::info('Data--=>',$data);
    BusinessAccount::create([

      'company_name' => $data['company_name'],
      'address' => $data['address'],
      'post_code' => $data['postCode'],
      'reg_number' => $data['regNumber'],
      'vat_number' => $data['vatNumber'],
      'user_id' => $userId,
    ]);
  }
}
