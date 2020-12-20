<?php

namespace App\Containers\StaticPage\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use GuzzleHttp\Client;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Request as Req;

/**
 * Class GetAllStaticPagesRequest.
 */
class SendContactRequest extends Request
{
  public function __construct(ValidationFactory $validationFactory)
  {

$recaptcha=Req::input('recaptcha');
    $validationFactory->extend(
      'recaptcha',
      function ($attribute, $value, $parameters) use ($recaptcha)  {
        {
          $client = new Client;
          $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
              'form_params' =>
                [
                  'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                  'response' => $recaptcha
                ]
            ]
          );

          $body = json_decode((string)$response->getBody());
          return $body->success;
        }
      },
      'reCaptcha обязательна для заполнения!'
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
       'name'=>'required',
			'email' => 'required|email',
			'text' => 'required',
      'recaptcha' => 'required|recaptcha'
        ];
    }

	public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести имя отправителя',
            'email.required' => "Необходимо ввести email адрес",
            'email.email' => "Емайл указан неверно",
            'text.required' => 'Необходимо ввести текст',
			'recaptcha.required'=>'reCaptcha обязательна для заполнения!'

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
