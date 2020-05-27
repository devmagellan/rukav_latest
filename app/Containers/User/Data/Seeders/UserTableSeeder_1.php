<?php

namespace App\Containers\User\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserPermissionsSeeder_1
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class UserTableSeeder_1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            /*1*/
            [
                'name' => ' .',
                'sername'=>'Игрушки',
                'email'=> 'imediasun@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,

            ],
            /*2*/
            [
                'name' => 'Sergey ',
                'sername'=>'Miroshnichenko',
                'email'=> 'imediasun8@gmail.com',
                'password'=> Hash::make('sunimedia'),

                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,

            ],
            /*3*/
            [
                'name' => 'Дома',
                'sername'=>' .',
                'email'=> 'test_email@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
            ],
            /*4*/
            [
                'name' => 'Детские',
                'sername'=>'Коляски',
                'email'=> 'senior.dev.php@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
            ],
            /*5*/
            [
                'name' => 'Детская',
                'sername'=>'Одежда',
                'email'=> 'dev.magellan@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,

            ],

        ]);

    }
}
