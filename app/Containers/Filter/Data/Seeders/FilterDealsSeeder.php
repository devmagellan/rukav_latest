<?php

namespace App\Containers\Filter\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;

/**
 * Class SettingsDefaultSettingsSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class FilterDealsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        \DB::table('filter_deals')->insert([



                                          /*1*/
                                          [
                                              'name' => 'Все',
                                              'active'=>1

                                          ],
                                          /*2*/
                                          [
                                              'name' => 'Продажа',
                                              'active'=>1

                                          ],
                                          /*3*/
                                          [
                                              'name' => 'Покупка',
                                              'active'=>0

                                          ],
                                          /*4*/
                                          [
                                              'name' => 'Сдают',
                                              'active'=>1

                                          ],
                                          /*5*/
                                          [
                                              'name' => 'Снимут',
                                              'active'=>1

                                          ],
                                          /*6*/
                                          [
                                              'name' => 'Обмен',
                                              'active'=>1

                                          ],
                                          /*7*/
                                          [
                                              'name' => 'Даром',
                                              'active'=>1

                                          ],
                                          /*8*/
                                          [
                                              'name' => 'Аренда',
                                              'active'=>1

                                          ],
                                          /*9*/
                                          [
                                              'name' => 'Услуги',
                                              'active'=>1

                                          ],
                                          /*10*/
                                          [
                                              'name' => 'Мероприятия',
                                              'active'=>1

                                          ],
                                          /*11*/
                                          [
                                              'name' => 'Знакомства',
                                              'active'=>1

                                          ],
                                          /*12*/
                                          [
                                              'name' => 'Общение',
                                              'active'=>1

                                          ],
                                          /*13*/
                                          [
                                              'name' => 'Храмы',
                                              'active'=>1

                                          ],




                                      ]);

        \DB::table('add_filter_deals')->insert([



                                              /*1*/
                                              [
                                                  'add_id' => '16',
                                                  'filter_deals_id' => '1',

                                              ],
                                              /*2*/
                                              [
                                                  'add_id' => '16',
                                                  'filter_deals_id' => '2',

                                              ],
                                              /*3*/
                                              [
                                                  'add_id' => '16',
                                                  'filter_deals_id' => '3',

                                              ],
                                              /*4*/
                                              [
                                                  'add_id' => '16',
                                                  'filter_deals_id' => '4',

                                              ],




                                          ]);
    }
}
