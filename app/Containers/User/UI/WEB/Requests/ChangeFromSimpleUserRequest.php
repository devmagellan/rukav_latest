<?php


namespace App\Containers\User\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class ChangeFromSimpleUserRequest extends Request
{

  /**
   * Define which Roles and/or Permissions has access to this request.
   *
   * @var  array
   */
  protected $access = [
    'permissions' => '',
    'roles' => '',
  ];

  /**
   * Id's that needs decoding before applying the validation rules.
   *
   * @var  array
   */
  protected $decode = [
    // 'id',
  ];

  /**
   * Defining the URL parameters (e.g, `/user/{id}`) allows applying
   * validation rules on them and allows accessing them like request data.
   *
   * @var  array
   */
  protected $urlParameters = [
    // 'id',
  ];

  /**
   * @return  array
   */
  public function rules()
  {
    $majorRules = [
      'name' => 'required|between:2,30',
      'sername' => 'required|between:2,30',
      //'phone' => 'required|max:30|unique:users,phone',
      //'password' => 'between:6,30',
      'email' => 'required|email',
      'address' => 'required_if:vid_user,Организация|required_if:vid_user,Предприниматель|required_if:vid_user,Компания',
      'postCode' => 'required_if:vid_user,Организация|required_if:vid_user,Предприниматель|required_if:vid_user,Компания',
    ];

    $optionalRules = [
      'regNumber' => 'required',
      'vatNumber' => 'required',
    ];
    //если в форме юзер выбрал компания тогда смержить правила для компании
    if ($this->optionUser == 'Компания') {
      return array_merge($majorRules, $optionalRules);
    }
    return $majorRules;
  }

  /**
   * @return  bool
   */
  public function authorize()
  {
    return true;
  }
}
