<?php
namespace App\Containers\Ad\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class AdsTableSeeder_2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       \DB::table('ads')->insert([
            /*1*/
           [
               'category_id' => 15,
               'sender' => 1,
               'status' => 3,
               'title' => 'Взрослые футболочки',
               'message' => 'Lorem ipsum dolor measure amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,
               'city'=>'London',
               'active'=>1,'administrative'=>'England'
           ],
           /*2*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England',
               'status' => 1,
           ],
           /*3*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England',
               'status' => 1,
           ],
           /*4*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*5*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
              'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,

           ],
           /*6*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*7*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*8*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],

           /*9*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*10*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*11*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*12*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*13*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*14*/
           [
               'category_id' => 14,
               'sender' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'London','administrative'=>'England','status' => 1,
           ],
           /*15*/
           [
               'category_id' => 15,
               'sender' => 2,
               'title' => 'Детские футболочки',
               'message' => 'Lorem measure dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1,'city'=>'Manchester','administrative'=>'Scotland','status' => 2,
           ],


       ]);

        \DB::table('pictures')->insert([
            /*1*/
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 1,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 2,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 3,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 4,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 5,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 6,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 7,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 8,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 9,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 10,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 11,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 12,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 13,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 14,
                'photo'=>'tshort.jpg'
            ],
            [
                'entity_model' => 'App\Containers\Ad\Models\Ad',
                'entity_id' => 15,
                'photo'=>'tshort.jpg'
            ]
            ]);

        \DB::table('ad_statuses')->insert([
            /*1*/
            [
                'name' => 'Опубликовано',

            ],
            /*2*/
            [
                'name' => 'На утверждении',

            ],
            /*3*/
            [
                'name' => 'Черновик',

            ],
            /*4*/
            [
                'name' => 'Отвергнуто',

            ],
            /*5*/
            [
                'name' => 'Просрочено',

            ],



        ]);
    }
}
