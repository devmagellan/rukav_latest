<?php


namespace App\Containers\User\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Factory as ValidationFactory;
class RegisterUserRequest extends Request
{


public function __construct(ValidationFactory $validationFactory)
    {

        $validationFactory->extend(
            'custom_phone',
            function ($attribute, $value, $parameters) {
				$this->fullphone=$this->code.$this->phone;
				$notUnique=\App\Containers\User\Models\User::where('phone',$this->fullphone)->first();
				if($notUnique){
					return false;
				}

                return true;
            },
            'Sorry, it failed unique_phone validation!'
        );

    }

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
      "firstName" => "required|between:2,30",
      "lastName" => "required|between:2,30","vid_user" => "required|max:30",
      "country" => "required|max:30",
      //"phone" =>  "nullable|unique:users,phone,NULL,id,deleted_at,NULL|required_if:vid_user,Организация|required_if:vid_user,Предприниматель|required_if:vid_user,Компания|max:30",
      "phone"=>"custom_phone|required_if:vid_user,Организация|required_if:vid_user,Предприниматель|required_if:vid_user,Компания|max:30",
	  "password" => "required|between:6,30",
      "email" => "required|email|unique:users,email,NULL,id,deleted_at,NULL",
      "nameJob" => "required_if:vid_user,Бизнес",
      "address" => "required_if:vid_user,Бизнес",
      "postCode" => "required_if:vid_user,Бизнес",

    ];


    $optionalRules = [
      'regNumber' => 'required',
      'vatNumber' => 'required',
    ];
    //если в форме юзер выбрал компания тогда смержить правила для компании
    if ($this->vid_user == 'Бизнес' && $this->optionUser == 'Компания') {
      return array_merge($majorRules, $optionalRules);
    }
    return $majorRules;
  }

  public function messages()
  {
    return [
      'firstName.required' => 'Нужно Имя',
      'lastName.required' => 'Нужна Фамилия',
      'email.required' => 'Нужен email',
      'password.required' => 'Нужно указать пароль',


    ];
  }

  public function customPhone($phone){
	  if($phone!==12345){return false;}
	  return true;
  }

  /**
   * @return  bool
   */
  public function authorize()
  {
    return true;
  }
}
