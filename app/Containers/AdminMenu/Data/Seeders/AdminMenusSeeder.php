<?php

namespace App\Containers\AdminMenu\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AdminMenusSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admin_menus')->insert([



            /*1*/
            [
                'parent_id' => 0,
                'name' => 'News Feed',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/news_feed',
                'system_name'=>'news_feed',
                'type'=>'linked',
                'permission'=>'view_customer_interface'
            ],
            /*2*/ //Role=>God  1)Impresonate by users
            [
                'parent_id' => 0,
                'name' => 'Управление компаниями',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/admin/companies',
                'system_name'=>'companies_managment',
                'type'=>'not_linked',
                'permission'=>'view_companies_managment_menu'
            ],

            /*3*/ //Role=>God
            [
                'parent_id' => 0,
                'name' => 'Роли и пермишены',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/roles_and_permissions',
                'system_name'=>'roles_and_permissions',
                'type'=>'linked',
                'permission'=>'view_roles_and_permissions_menu'
            ],
            /*4*/ //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Управление компанией',
                'icon'=> 'fal fa-tag',
                'link'=> '/admin/company_managment',
                'system_name'=>'company_managment',
                'type'=>'not_linked',
                'permission'=>'view_company_managment_menu'
            ],

            /*5*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Логотип',
                'icon'=> 'fal fa-window',
                'link'=> '/company/company_logo',
                'system_name'=>'company_logo',
                'type'=>'linked',
                'permission'=>null
            ],

            /*6*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Кастомные бейджи',
                'icon'=> 'fal fa-window',
                'link'=> '/company/custom_badges',
                'system_name'=>'custom_badges',
                'type'=>'linked',
                'permission'=>null
            ],
            /*7*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Кастомные подложки',
                'icon'=> 'fal fa-window',
                'link'=> '/company/custom_layouts',
                'system_name'=>'custom_layouts',
                'type'=>'linked',
                'permission'=>null
            ],
            /*8*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Пользователи',
                'icon'=> 'fal fa-window',
                'link'=> '/company/users',
                'system_name'=>'company_users',
                'type'=>'not_linked',
                'permission'=>'view_company_users_menu'
            ],
            /*9*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 8,
                'name' => 'Список администраторов',
                'icon'=> 'fal fa-window',
                'link'=> '/admins_list',
                'system_name'=>'company_users_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*10*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Статистика администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/company/statistics',
                'system_name'=>'company_statistics',
                'type'=>'not_linked',
                'permission'=>'view_company_statistics_menu'
            ],

            /*11*/  //Role=>company_admin
            [
                'parent_id' => 10,
                'name' => 'Статистика по бейджам ',
                'icon'=> 'fal fa-window',
                'link'=> '/company/badges_statistics',
                'system_name'=>'badges_statistics',
                'type'=>'linked',
                'permission'=>null
            ],
            /*12*/  //Role=>manager
            [
                'parent_id' => 0,
                'name' => 'Статистика менеджера',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/manager/statistics',
                'system_name'=>'manager_statistics',
                'type'=>'linked',
                'permission'=>'view_manager_statistics_menu'
            ],
            /*13*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Управление доступом',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/accesses',
                'system_name'=>'admins_accesses',
                'type'=>'linked',
                'permission'=>'view_admins_accesses_menu'
            ],
            /*14*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Аналитика по клиенту',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/clients_analytics',
                'system_name'=>'clients_analytics',
                'type'=>'linked',
                'permission'=>'view_clients_analytics_menu'
            ],
            /*15*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Компании',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/companies',
                'system_name'=>'companies',
                'type'=>'linked',
                'permission'=>'view_companies_menu'
            ],
            /*16*/  //Role=>all
            [
                'parent_id' => 0,
                'name' => 'Профиль администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'linked',
                'permission'=>null
            ],
            /*17*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Менеджеры',
                'icon'=> 'fal fa-window',
                'link'=> '/company/managers',
                'system_name'=>'company_managers',
                'type'=>'not_linked',
                'permission'=>'view_company_managers_menu'
            ],
            /*18*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 19,
                'name' => 'Список менеджеров',
                'icon'=> 'fal fa-window',
                'link'=> '/company/managers_list',
                'system_name'=>'company_managers_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*19*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Цветовые схеммы',
                'icon'=> 'fal fa-window',
                'link'=> '/company/themes',
                'system_name'=>'themes',
                'type'=>'linked',
                'permission'=>null
            ],
            /*20*/  //Role=>all_admin
            [
                'parent_id' => 0,
                'name' => 'Собственный профиль',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'not_linked',
                'permission'=>'view_customer_interface'
            ],
            /*21*/  //Role=>all_admin
            [
                'parent_id' => 22,
                'name' => 'Управление профилем',
                'icon'=> 'fal fa-window',
                'link'=> '/profile',
                'system_name'=>'admin_profile_avatar',
                'type'=>'linked',
                'permission'=>null
            ],
            /*22*/  //Role=>all_admin
            [
                'parent_id' => 22,
                'name' => 'Аватарки',
                'icon'=> 'fal fa-window',
                'link'=> '/profile/avatar/index',
                'system_name'=>'admin_profile_avatar',
                'type'=>'linked',
                'permission'=>null
            ],
            /*23*/  //Role=>system_admin
            [
                'parent_id' => 0,
                'name' => 'Бэйджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges',
                'system_name'=>'main_admin_badges',
                'type'=>'not_linked',
                'permission'=>'view_main_admin_badges'
            ],
            /*24*/  //Role=>system_admin
            [
                'parent_id' => 23,
                'name' => 'Группы бэйджей',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges_groups',
                'system_name'=>'main_admin_badges_groups',
                'type'=>'linked',
                'permission'=>null
            ],
            /*25*/  //Role=>system_admin
            [
                'parent_id' => 23,
                'name' => 'Кастомные бэйджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/custom_badges',
                'system_name'=>'main_admin_custom_badges',
                'type'=>'linked',
                'permission'=>null
            ],
            /*26*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Оформление',
                'icon'=> 'fal fa-window',
                'link'=> '/company/categories',
                'system_name'=>'categories',
                'type'=>'not_linked',
                'permission'=>'edit_viewable_interfaces'
            ],
            /*27*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 26,
                'name' => 'Редактирование категорий',
                'icon'=> 'fal fa-window',
                'link'=> '/edit_categories',
                'system_name'=>'edit_categories',
                'type'=>'linked',
                'permission'=>null
            ],

            /*11*/  //Role=>company_admin
            /*       [
                       'parent_id' => 10,
                       'name' => 'Статистика по людям',
                       'icon'=> 'fal fa-window',
                       'link'=> '/company/users_statistics',
                       'system_name'=>'users_statistics',
                       'type'=>'linked',
                       'permission'=>null
                   ],*/
            /*12*/  //Role=>company_admin
            /*   [
                   'parent_id' => 10,
                   'name' => 'Статистика по менеджерам ',
                   'icon'=> 'fal fa-window',
                   'link'=> '/company/users_statistics',
                   'system_name'=>'users_statistics',
                   'type'=>'linked',
                   'permission'=>null
               ],*/


            /*28*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Объявления',
                'icon'=> 'fal fa-window',
                'link'=> '/customer/messages',
                'system_name'=>'messages',
                'type'=>'not_linked',
                'permission'=>'view_messages'
            ],
            /*29*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 28,
                'name' => 'Просмотр объявлений',
                'icon'=> 'fal fa-window',
                'link'=> '/ads',
                'system_name'=>'view_messages',
                'type'=>'linked',
                'permission'=>null
            ],
            /*30*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Слайдер',
                'icon'=> 'fal fa-window',
                'link'=> '/customer/slider',
                'system_name'=>'slider',
                'type'=>'not_linked',
                'permission'=>'view_slider'
            ],
            /*31*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 30,
                'name' => 'Просмотр слайдера',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/view_slider',
                'system_name'=>'view_slider',
                'type'=>'linked',
                'permission'=>null
            ],
          /*32*/
          [
                'parent_id' => 26,
                'name' => 'Просмотр статических страниц',
                'icon'=> 'fal fa-window',
                'link'=> '/staticpages',
                'system_name'=>'view_static_pages',
                'type'=>'linked',
                'permission'=>'view_static_pages'
            ],
          /*33*/
          [
            'parent_id' => 26,
            'name' => 'Редактирование фильтров',
            'icon'=> 'fal fa-window',
            'link'=> '/filters',
            'system_name'=>'view_filters_pages',
            'type'=>'linked',
            'permission'=>'view_filters_pages'
          ],
          /*34*/  //Role=>company_admin 1)Impresonate by user
          [
            'parent_id' => 28,
            'name' => 'Добавление объявлений',
            'icon'=> 'fal fa-window',
            'link'=> '/admin/add_ads',
            'system_name'=>'add_messages',
            'type'=>'linked',
            'permission'=>null
          ],
          /*35*/  //Role=>company_admin 1)Impresonate by user
          [
            'parent_id' => 8,
            'name' => 'Список пользователей',
            'icon'=> 'fal fa-window',
            'link'=> '/users_list',
            'system_name'=>'company_users_list',
            'type'=>'linked',
            'permission'=>null
          ],
            /*33*/
            [
                'parent_id' => 26,
                'name' => 'Редактирование типов сделок',
                'icon'=> 'fal fa-window',
                'link'=> '/filter_deals',
                'system_name'=>'view_filter_deals_pages',
                'type'=>'linked',
                'permission'=>'view_filter_deals_pages'
            ],
            [
                'parent_id' => 8,
                'name' => 'Список удаленных пользователей',
                'icon'=> 'fal fa-window',
                'link'=> '/users_list/deleted',
                'system_name'=>'deleted_users_list',
                'type'=>'linked',
                'permission'=>null
            ],
            [
                'parent_id' => 8,
                'name' => 'Список удаленных админов',
                'icon'=> 'fal fa-window',
                'link'=> '/admins_list/deleted',
                'system_name'=>'deleted_admins_list',
                'type'=>'linked',
                'permission'=>null
            ],






        ]);
    }
}
