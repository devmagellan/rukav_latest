<?php

namespace App\Containers\Ad\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class StoreAdRequest.
 */
class StoreAdRequest extends Request
{

  /**
   * The assigned Transporter for this Request
   *
   * @var string
   */
  protected $transporter = \App\Containers\Ad\Data\Transporters\CreateAdTransporter::class;

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
    return [
      'name_ad' => 'required|max:70',
//      'category_ads' => 'required',
      'address' => 'required_if:select_addres,Полный адресс',
     // 'post_code' => 'required',
      //'email' => 'required|email',
      //'phone' => 'required',
        'city' => 'required',
      //'name' => 'required|between:2,10',
      'files.*' => 'required|image|max:7000',
      'category_id' => 'required'
    ];
  }

    public function messages()
    {
        return [
            'city.required' => 'Вам необходимо выбрать местоположение выбрав google location в полях секции Местоположение',
            'files.required' => "You must use the 'Choose file' button to select which file you wish to upload",
            'files.*.max' => "Maximum file size to upload is 8MB (8192 KB). If you are uploading a photo, try to reduce its resolution to make it under 8MB",
            'files.*.image' => "Not an image"

        ];
    }

  /**
   * @return  bool
   */
  public function authorize()
  {
    return true;
  }
}
