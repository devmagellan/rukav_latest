<?php

namespace App\Containers\StaticPage\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Validation\Factory as ValidationFactory;
use GuzzleHttp\Client;
/**
 * Class GetAllStaticPagesRequest.
 */
class SendAdvRequest extends Request
{

  public function __construct(ValidationFactory $validationFactory)
  {



    $validationFactory->extend(
      'recaptcha',
      function ($attribute, $value, $parameters) {
        {
          $client = new Client;
          $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
              'form_params' =>
                [
                  'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                  'response' => $value
                ]
            ]
          );

          $body = json_decode((string)$response->getBody());
          return $body->success;
        }
      },
      'reCaptcha бязательно для заполнения!'
    );

  }


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
			'sender_phone' => 'required|min:11|numeric',
          'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

	public function messages()
    {
        return [
            'sender_name.required' => ' Необходимо ввести имя отправителя |',
            'sender_email.required' => " Необходимо ввести email адрес |",
            'sender_email.email' => " Емайл указан неверно |",
            'sender_phone.required' => ' Необходимо ввести телефон |',
          'sender_phone.min' => ' Необходимо ввести телефон |',
          'sender_phone.numeric' => ' Необходимо ввести телефон |',

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
