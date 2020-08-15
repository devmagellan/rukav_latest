<?php

namespace App\Containers\Ad\Services;

use App\Containers\Ad\Models\Ad;
use App\Containers\Ad\Models\Picture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Containers\Filter\Models\AddFilter;

class AdService
{
  public function createAd($data): Ad
  {
    return Ad::create([
      'title' => $data->name_ad,
      'email' => Auth::user()->email,
      'phone' => (Auth::user()->phone) ? Auth::user()->phone : '',
      'price' => $data->price,
      'message' => $data->description,
      'city' => $data->city,
      'place_id' => $data->place_id,
      'name' => Auth::user()->name,
      'category_id' => $data->category_id,
      'sender' => Auth::user()->id,
      //TODO не забыть узнать что с этим делать
      'administrative' => $data->administrative,
      'visibility' => false,
      'show_name' => Auth::user()->name
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

  public function saveFilters($data, $adId)
  {
    \Log::info('beforeValidation');
    $validator = \Validator::make($data->all(), [
      'filter_value'=>'required',
    ]);
    \Log::info('SaveFilter',array($data->all()));
    \Log::info('SaveFilterADID'.$adId);
    \Log::info('Foreach',$data->input('filter_id'));
    foreach ($data->input('filter_id') as $key=>$filter) {
     // dump($filter);
      \Log::info('FilterSave=>key',array($filter));
      $filterId=$data->input('filter_id')[$filter-1];
      \Log::info('Error=>key'.$filter);
      \Log::info('EndError=>key'.$data->input('filter_value')[$filter-1]);
      $filterValue=$data->input('filter_value')[$filter-1];

      $this->createFilter($filterId,$filterValue, $adId);
    }
  }

  public function createPicture($path, $adId)
  {
    Picture::create([
      'ads_id' => $adId,
      'photo' => $path,
    ]);
  }

  public function createFilter($filterId,$filterValue, $adId)
  {
    \Log::info('Creation of FilterId'.$filterId.' Creation of FilterValue'.$filterValue.' Creation of AdId'.$adId );
  AddFilter::create([
      'add_id' => $adId,
      'filter_id' => $filterId,
    'value'=>$filterValue
    ]);
  }
}
