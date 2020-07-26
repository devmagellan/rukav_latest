<?php

namespace App\Containers\Ad\Services;

use App\Containers\Ad\Models\Ad;
use App\Containers\Ad\Models\Picture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdService
{
  public function createAd($data): Ad
  {
    return Ad::create([
      'title' => $data->name_ad,
      'email' => $data->email,
      'phone' => $data->phone,
      'price' => $data->price,
      'message' => $data->description,
      'city' => $data->city,
      'place_id' => $data->place_id,
      'name' => $data->name,
      'category_id' => $data->category_id,
      'sender' => Auth::user()->id,
      //TODO не забыть узнать что с этим делать
      'administrative' => $data->administrative,
      'visibility' => false,
      'show_name' => $data->hide_name
    ]);
  }

  public function savePhoto($data, $adId)
  {
\Log::info('beforeValidation');
      $validator = \Validator::make($data->all(), [
          'files' => 'max:500',
      ]);
      \Log::info('AfterbeforeValidation');
    foreach ($data->file('files') as $file) {

      $filePath = Storage::disk('public')->put('', $file);
      $this->createPicture($filePath, $adId);
    }
  }

  public function createPicture($path, $adId)
  {
    Picture::create([
      'ads_id' => $adId,
      'photo' => $path
    ]);
  }
}
