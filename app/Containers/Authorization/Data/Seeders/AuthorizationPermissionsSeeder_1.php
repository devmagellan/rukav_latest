<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationPermissionsSeeder_1
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationPermissionsSeeder_1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Permissions ----------------------------------------------------------
        Apiato::call('Authorization@CreatePermissionTask', ['manage-roles', 'Управление ролями и пермишенами','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-admins', 'Создавать админов','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['manage-admins-access', 'Управление доступом админов','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['access-dashboard', 'Доступ к дашборду','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_slider', 'Просмотр редактирование слайдера','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_messages', 'Просмотр редактирование объявлений','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['edit_viewable_interfaces', 'Редактировать видимые интерфейсы','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_customer_interface', 'Редактировать пользовательские интерфейсы','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_main_admin_badges', 'Просмотр главных админ бейджей','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_admin_profile', 'Просмотр профиля администратора','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_managers_menu', 'Просмотр меню менеджеров компании','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_companies_menu', 'Просмотр меню компаний','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_clients_analytics_menu', 'Просмотр меню клиентской аналитики','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_admins_accesses_menu', 'Просмотр меню доступа админов','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_manager_statistics_menu', 'Просмотр меню статистики менеджеров','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_statistics_menu', 'Просмотр меню статистики компаний','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_users_menu', 'Просмотр меню пользователей компаний','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_managment_menu', 'Просмотр меню менеджеров компаний','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_roles_and_permissions_menu', 'Просмотр меню ролей и пермишенов','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_companies_managment_menu', 'Просмотр меню менеджеров компаний','menu']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_static_pages', 'Просмотр статичных страниц','menu']);
      Apiato::call('Authorization@CreatePermissionTask', ['view_filters_pages', 'Просмотр фильтров','menu']);
      Apiato::call('Authorization@CreatePermissionTask', ['add_messages', 'Добавление объявлений','menu']);






    }
}
