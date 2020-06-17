<?php
namespace App\Containers\Connect\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class ConnectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       \DB::table('connects')->insert([
            /*1*/
           [
               'sender_id' => 4,
               'receiver_id' => 1,
               'text' => 'test',
               'message_id' => 1,

           ],
           /*2*/
           [
               'sender_id' => 1,
               'receiver_id' => 4,
               'text' => 'test reply',
               'message_id' => 1,

           ],



       ]);


    }
}
