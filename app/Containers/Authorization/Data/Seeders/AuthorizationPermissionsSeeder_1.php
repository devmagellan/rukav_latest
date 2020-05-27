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
        Apiato::call('Authorization@CreatePermissionTask', ['manage-roles', 'Create, Update, Delete, Get All, Attach/detach permissions to Roles and Get All Permissions.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-admins', 'Create new Users (Admins) from the dashboard.']);
        Apiato::call('Authorization@CreatePermissionTask', ['manage-admins-access', 'Assign users to Roles.']);
        Apiato::call('Authorization@CreatePermissionTask', ['access-dashboard', 'Access the admins dashboard.']);
        Apiato::call('Authorization@CreatePermissionTask', ['access-opt-dashboard', 'Access the wholesalers dashboard.']);
        Apiato::call('Authorization@CreatePermissionTask', ['access-import-wholesalers', 'Access the wholesalers import page.']);



        Apiato::call('Authorization@CreatePermissionTask', ['view_slider', 'view_slider.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_ads', 'view_ads.']);
        Apiato::call('Authorization@CreatePermissionTask', ['edit_viewable_interfaces', 'edit_viewable_interfaces.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_customer_interface', 'view_customer_interface.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_main_admin_badges', 'view_main_admin_badges.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_admin_profile', 'view_admin_profile.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_managers_menu', 'view_company_managers_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_companies_menu', 'view_companies_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_clients_analytics_menu', 'view_clients_analytics_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_admins_accesses_menu', 'view_admins_accesses_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_manager_statistics_menu', 'view_manager_statistics_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_statistics_menu', 'view_company_statistics_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_users_menu', 'view_company_users_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_company_managment_menu', 'view_company_managment_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_roles_and_permissions_menu', 'view_roles_and_permissions_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_companies_managment_menu', 'view_companies_managment_menu.']);
        Apiato::call('Authorization@CreatePermissionTask', ['view_static_pages', 'view_static_pages.']);




        // ...

    }
}
