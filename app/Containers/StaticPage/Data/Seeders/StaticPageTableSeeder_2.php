<?php
namespace App\Containers\StaticPage\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class StaticPageTableSeeder_2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('staticpage_groups')->insert([
            /*1*/
            [
                'name'=>'help information',
                'link'=>'main',
                'staticpage_id'=>1
            ],
            [
                'name'=>'help information',
                'link'=>'adds',
                'staticpage_id'=>1
            ],
            [
                'name'=>'help information',
                'link'=>'from_users',
                'staticpage_id'=>1
            ],
            [
                'name'=>'help information',
                'link'=>'delete_reasons',
                'staticpage_id'=>1
            ],

        ]);

       \DB::table('static_pages')->insert([
            /*1*/
        [
        'name'=>'help',
        'content'=>'Lorem ipsum dollor',
        'group'=>1,
        'active'=>1,
        'editor'=>1
        ],
           [
               'name'=>'help',
               'content'=>'Lorem ipsum dollor',
               'group'=>1,
               'active'=>1,
               'editor'=>1
           ],
           [
               'name'=>'help',
               'content'=>'Lorem ipsum dollor',
               'group'=>1,
               'active'=>1,
               'editor'=>1
           ]


       ]);







    }
}
