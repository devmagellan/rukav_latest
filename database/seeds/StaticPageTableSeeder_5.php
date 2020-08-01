<?php
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class StaticPageTableSeeder_5 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('staticpage_types')->insert([
            /*1*/
            [
                'name'=>'simple',
                'link'=>'',
            ],
            [
                'name'=>'adv',
                'link'=>'',
            ],
            [
                'name'=>'about_us',
                'link'=>'',

            ],
            [
                'name'=>'career',
                'link'=>'',

            ],
            [
                'name'=>'politics',
                'link'=>'',

            ],
            [
                'name'=>'help',
                'link'=>'',

            ],



        ]);






    }
}
