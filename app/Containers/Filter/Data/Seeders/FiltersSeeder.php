<?php

namespace App\Containers\Filter\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class FiltersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('filters')->insert([



      /*1*/
      [
        'name' => 'состояние',
        'active'=>1

      ],
      /*2*/
      [
        'name' => 'марка',
        'active'=>1

      ],
      /*3*/
      [
        'name' => 'модель',
        'active'=>0

      ],
      /*4*/
      [
        'name' => 'год выпуска',
        'active'=>1

      ],




    ]);

      \DB::table('add_filters')->insert([



        /*1*/
        [
          'add_id' => '16',
          'filter_id' => '1',

        ],
        /*2*/
        /*1*/
        [
          'add_id' => '16',
          'filter_id' => '2',

        ],
        /*3*/
        [
          'add_id' => '16',
          'filter_id' => '3',

        ],
        /*4*/
        [
          'add_id' => '16',
          'filter_id' => '4',

        ],




      ]);
    }
}
