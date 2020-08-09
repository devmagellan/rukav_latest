<?php

namespace App\Containers\Site\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GenerateProductCategoriesViewTask extends Task
{

    protected $repository;
    public $level;
    public $lang = 'en';

    public function __construct(AdminMenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
                if (!$data) {
                    return NULL;
                }
                $arr_cat = array();
                if (count($data) != 0) {

                    //В цикле формируем массив

                    foreach ($data as $key => $row) {
                        //Формируем массив где ключами являются адишники на родительские категории
                        if (empty($arr_cat[$row['parent_id']])) {
                            $arr_cat[$row['parent_id']] = array();
                        }
                        $arr_cat[$row['parent_id']][] = $row;
                    }


                    //возвращаем массив
                    return $this->view_cat($arr_cat,0,0);


                }





    }

    //вывод каталогa с помощью рекурсии
    public function view_cat($arr, $parent_id = 0, $level, $parents_approved=[] ) {

        //Условия выхода из рекурсии
        if (empty($arr[$parent_id])) {
            return;
        }
        if($parent_id !== 0) {
            echo '<ul >';
        }
        //перебираем в цикле массив и выводим на экран
        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
            //Если пермишен присутствуют у текущего юзера выводить нулевой уровень

                    echo '<li>
                      <span class="leaf-content">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="dropdown-icon glyphicon glyphicon-minus-sign"></span>';






                echo  $arr[$parent_id][$i]['name'];
                if($parent_id !== 0){
                    echo"
                     <div style='float:right' class=\"btn-group pull-right\">
                     <input type='hidden' class='hidden_rubric' value='".$arr[$parent_id][$i]['id']."'>
                      <button type=\"button\" class=\"btn btn-danger btn-xs transfer_rubric\">Переместить сюда</button>
                    </div>
                    ";
                }
                //рекурсия - проверяем нет ли дочерних категорий
                $this->view_cat($arr, $arr[$parent_id][$i]['id'], 1,$parents_approved);
                echo '     </div>
                        </div>
                      </span>
                                                        </li> ';

           /* }*/

        }
        if($parent_id !== 0) {
            echo '</ul>';
        }
    }
}
