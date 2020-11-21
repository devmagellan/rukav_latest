<?php
namespace App\Exports;

use \App\Containers\User\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserDataExport implements FromCollection,WithHeadings
{
  protected $date;
  public function __construct($date)
  {
    $this->user_id = $date;
  }

  /**
   * @return Collection
   */
  public function collection()
  {
    return \App\Containers\User\Models\User::select('name','sername','ip','phone','created_at','email')->where('id', $this->user_id)->get();
  }

  public function headings():array
  {
    return ["name", "sername", "IP", "phone","RegistrationDate","email"];
  }
}
