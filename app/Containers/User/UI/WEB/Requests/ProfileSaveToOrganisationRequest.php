<?php

namespace App\Containers\User\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllAdminPanelsRequest.
 */
class ProfileSaveToOrganisationRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
   // protected $transporter = \App\Containers\User\Data\Transporters\GetAllAdminPanelsTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
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
    \Log::info('to_organisation_request');
    return [
      'organisation_name' => 'required',
      'www' => 'required',
      'address' => 'required',
      'postCode' => 'required',
	  'phone' => 'required|numeric|size:9',

    ];
  }

  public function messages()
  {
    return [
      'organisation_name.required' => 'Необходимо добавить название организации',
      'www.required' => 'Необходимо добавить адрес вебсайта',
      'address.required' => 'Необходимо добавить адрес организации',
      'postCode.required' => 'Необходимо добавить почтовый код организации',
	  'phone.required' => 'Необходимо добавить телефон организации',
      'phone.size' => 'Телефон содержит не верное количество цифр',
      'phone.numeric' => 'Телефон содержит не верные символы',


    ];
  }
    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
