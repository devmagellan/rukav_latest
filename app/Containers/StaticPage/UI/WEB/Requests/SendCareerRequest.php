<?php

namespace App\Containers\StaticPage\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class GetAllStaticPagesRequest.
 */
class SendCareerRequest extends Request
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
       'file' => 'required|mimes:pdf,docx,doc|max:8000',
        ];
    }

	public function messages()
    {
        return [
            'sender_name.required' => ' | Необходимо ввести имя отправителя',
            'sender_email.required' => " | Необходимо ввести email адрес",
            'sender_email.email' => " | Емайл указан неверно",
            'sender_phone.required' => ' | Необходимо ввести телефон',
          'file.required' => ' | Необходимо добавить резюме',
          'file.mimes' => "| Файл должен быть документом PDF или DOC",
          'file.max' => "| Максимальный размер файла для загрузки 8MB (8192 KB).",

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