<?php

namespace App\Containers\StaticPage\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllStaticPagesRequest.
 */
class SendAdvRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    //protected $transporter = \App\Containers\StaticPage\Data\Transporters\GetAllStaticPagesTransporter::class;

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
        return [
            'sender_name'=>'required',
			'sender_email' => 'required|email',
			'sender_phone' => 'required',
        ];
    }

	public function messages()
    {
        return [
            'sender_name.required' => 'Вам необходимо ввсети имя отправителя в форму обратной связи',
            'sender_email.required' => "Вам необходимо ввсети email адрес в форму обратной связи ",
            'sender_phone.required' => 'Вам необходимо ввсети телефон отправителя в форму обратной связи',

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
