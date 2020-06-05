<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationRolesSeeder_2
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationRolesSeeder_2 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Roles ----------------------------------------------------------------
        Apiato::call('Authorization@CreateRoleTask', ['admin', 'Administrator', 'Administrator Role', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Administrator', 'Administrator Role', 'Administrator Role', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Gods_mode', 'Режим Бога', 'Режим Бога', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Main_administrator', 'Главный Администратор системы', 'Главный Администратор системы', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Designer', 'Дизайнер', 'Дизайнер', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Company_administrator', 'Администратор компании', 'Администратор компании', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Simple_user', 'Пользователь', 'Пользователь', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Manager', 'Менеджер', 'Менеджер', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['Clients_support', 'Поддержка клиентов', 'Поддержка клиентов', 999]);



        \DB::table('role_has_permissions')->insert([
            [

                'permission_id' =>1 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>9 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>11 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>2 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>12 ,
                'role_id'=>2


            ],

            [

                'permission_id' =>7 ,
                'role_id'=>2


            ],
            [

                'permission_id' =>8 ,
                'role_id'=>2


            ],
            [

                'permission_id' => 9 ,
                'role_id'=>2
            ],
            [

                'permission_id' =>11 ,
                'role_id'=>2


            ],
            [

                'permission_id' => 10,
                'role_id'=>4
            ],
            [

                'permission_id' => 4,
                'role_id'=>4
            ],
            [

                'permission_id' => 5,
                'role_id'=>4
            ],
            [

                'permission_id' => 3,
                'role_id'=>4
            ],
            [

                'permission_id' =>11 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>14 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>15 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>16 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>5


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>2


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>1


            ],
            [

                'permission_id' => 1 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 2 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>3 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 4 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 5 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>6 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 7 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 8 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>9 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 10 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 11 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>12 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 13 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 14 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>15 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 16 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 17 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>18 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 19 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 20 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>21 ,
                'role_id'=>6


            ],
            [

                'permission_id' => 22 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 23 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>24 ,
                'role_id'=>6


            ],


        ]);


        \DB::table('model_has_roles')->insert([
            /*1*/
            [

                'role_id' => 1,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>1
            ],
            [

                'role_id' => 2,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>2
            ],
            [

                'role_id' => 3,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>3
            ],
            [

                'role_id' => 4,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>5
            ],
            [

                'role_id' => 5,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>5
            ],
            [

                'role_id' => 6,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>4
            ],
            [

                'role_id' => 5,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>4
            ],
            [

                'role_id' => 5,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>1
            ],
            [

                'role_id' => 1,
                'model_type'=>'App\Containers\User\Models\User',
                'model_id'=>6
            ],
        ]);


    }
}
