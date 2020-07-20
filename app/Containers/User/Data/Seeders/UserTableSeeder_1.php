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
                'country'=>'ua',
                'sername'=>'Игрушки',
                'email'=> 'imediasun@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
                'vid_user'=>'Организация',
                'avatar'=>'avatar-admin-lg.png'

            ],
            /*2*/
            [
                'name' => 'Sergey ',
                'country'=>'ua',
                'sername'=>'Miroshnichenko',
                'email'=> 'imediasun8@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'vid_user'=>'Предприниматель',
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
                'avatar'=>'avatar-admin-lg.png'

            ],
            /*3*/
            [
                'name' => 'Дома',
                'sername'=>' .',
                'country'=>'ua',
                'email'=> 'test_email@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
                'vid_user'=>'Компания',
                'avatar'=>'avatar-admin-lg.png'
            ],
            /*4*/
            [
                'name' => 'Детские',
                'sername'=>'Коляски',
                'country'=>'ua',
                'email'=> 'senior.dev.php@gmail.com',
                'password'=> Hash::make('sunimedia'),
                'active'=>true,
                'confirmed'=>true,
                'is_client'=>true,
                'vid_user'=>'Частная',
                'avatar'=>'avatar-admin-lg.png'
            ],

        ]);


        \DB::table('organisation_accounts')->insert([
            /*1*/
            [
        'organisation_name'=>'ASDF',
        'www'=>'asdfg',
        'address'=>'asdf',
        'post_code'=>'asdf543',
        'user_id'=>1

            ],


        ]);

        \DB::table('individual_accounts')->insert([
            /*1*/
            [
                'business_name'=>'ASDF',
                'www'=>'asdfg',
                'address'=>'asdf',
                'post_code'=>'asdf543',
                'user_id'=>2

            ],


        ]);


        \DB::table('business_accounts')->insert([
            /*1*/
            [
        'company_name' =>'company_name',
        'option_user'=>'asdfg',
        'name_job'=>'asdf',
        'address'=>'asdfg',
        'post_code'=>'asdf34',
        'reg_number'=>'asdfg',
        'vat_number'=>'1asfgd',

        'user_id'=>3

            ],


        ]);




    }
}
