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
      'city' => $data->address,
      'place_id' => $data->post_code,
      'name' => $data->name,
      'category_id' => rand(1, 10),
      'sender' => Auth::user()->id,
      //TODO не забыть узнать что с этим делать
      'administrative' => false,
      'visibility' => false
    ]);
  }

  public function savePhoto($data, $adId)
  {
    foreach ($data->file('files') as $file) {
      $filePath = Storage::disk('public')->put('/adsImages/' . $adId, $file);
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
