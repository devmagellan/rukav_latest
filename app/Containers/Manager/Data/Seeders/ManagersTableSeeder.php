<?php
namespace App\Containers\Manager\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('managers')->insert([
            /*1*/
           [
               'user_id' => 4,
               //'company_id' => 1,

           ],
           /*1*/
           [
               'user_id' => 1,
               //'company_id' => 1,

           ],
       ]);

 /*       DB::table('admins_companies')->insert([

            [
                'admin_id' => 5,
                'company_id' => 1,

            ],
            [
                'admin_id' => 1,
                'company_id' => 1,

            ],

        ]);*/


    }
}
