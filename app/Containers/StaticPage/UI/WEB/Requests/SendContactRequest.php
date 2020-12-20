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
var_dump(Req::all());
    $validationFactory->extend(
      'recaptcha',
      function ($attribute, $value, $parameters) {
        {
			
			
/*           $client = new Client;
		  $ip = $_SERVER['REMOTE_ADDR'];
          $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
			'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
              'form_params' =>
                [
                  'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                  'response' => $value,
				  'remoteip'=>$ip
                ]
            ]
          );
          $body = json_decode((string)$response->getBody());
var_dump($body);
          return $body->success; */
		  
		  var_dump($attribute, $value, $parameters);
    $secreto=env('GOOGLE_RECAPTCHA_SECRET');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify?");
    curl_setopt($ch, CURLOPT_POST, 1);
    $campos=array('secret'=>$secreto,'response'=>$attribute);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$campos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ch_exec = curl_exec($ch);
    $respuesta_google = json_decode($ch_exec,true);
    var_dump($ch_exec);
    var_dump($respuesta_google);
    curl_close ($ch);
    exit;
    return $respuesta_google;
        } 

      },
      'reCaptcha обязательна3 для заполнения!'
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
      'g-recaptcha-response' => 'recaptcha'
        ];
    }

	public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести имя отправителя',
            'email.required' => "Необходимо ввести email адрес",
            'email.email' => "Емайл указан неверно",
            'text.required' => 'Необходимо ввести текст',
			//'g-recaptcha-response.required'=>'reCaptcha обязательна2 для заполнения!'

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
