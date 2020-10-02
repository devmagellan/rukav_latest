<?php

namespace App\Containers\Ad\Services;

use App\Containers\Ad\Models\Ad;
use App\Containers\Ad\Models\Picture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Containers\Filter\Models\AddFilter;
use App\Containers\Filter\Models\AddFilterDeals;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\DB;
use App\Containers\HomePage\Services\GlobalService;
class AdService
{
    protected $ad;
  public function createAd($data): Ad
  {

    if($data->is_admin_format){

      $user=\App\Containers\User\Models\User::where('id',$data->user_id)->first();
    }
    else{
      $user=Auth::user();
    }
    \Log::info('data_information',array($data));
    $mutable = Carbon::now();
    $modifiedMutable = $mutable->add($data->select_time, 'day');
    \Log::info('date_information'.$modifiedMutable);
      DB::transaction(function () use ($data,$user,$modifiedMutable) {
          if (null!=(session()->get('deletedImgsToSession')) && count(session()->get('deletedImgsToSession')) > 0) {
              foreach (session()->get('deletedImgsToSession') as $key=>$value) {
                  \Log::info('IMG=>'.$value['img']);
                  if(is_array($value)){
                  $picturePath=explode("/", $value['img']);
                      $id=$value['id'];
                  }
                  else{
                      $picturePath=explode("/", $value['img']);
                      $id=$value['id'];
                  }
                  \Log::info('IMG2=>',$value);
                  \Log::info('$picturePath[3]=>'.$picturePath[3]);
                Picture::where('ads_id',$id)->where('photo',$picturePath[3])->forceDelete();
              }
              session()->forget('deletedImgsToSession');
          }

          $this->ad = Ad::updateOrCreate(['id' => $data->add_id], [
              'title' => $data->name_ad,
              'email' => $user->email,
              'phone' => ($user->phone) ? $user->phone : '',
              'price' => $data->price,
              'message' => $data->description,
              'city' => $data->city,
              'place_id' => $data->place_id,
              'name' => $user->name,
              'category_id' => $data->category_id,
              'sender' => (isset($data->sender)) ? $data->sender : $user->id,
              'is_tmp' => (isset($data->save)) ? false : true,
              'select_time' => $data->select_time,
              'expired' => $modifiedMutable->toDateTimeString(),
              'administrative' => $data->administrative,
              'visibility' => false,
              'show_name' => $user->name
          ]);
      });
      return $this->ad;

  }



  public function savePhoto($data, $adId)
  {
      \Log::info('beforeValidation');
      $validator = \Validator::make($data->all(), [
          'files' => 'max:500',
      ]);
      \Log::info('AfterbeforeValidation');
      \Log::info('Files3=>', array($data->file('files')));
      if ($data->file('files')){
          foreach ($data->file('files') as $file) {

              $filePath = Storage::disk('public')->put('', $file);

            $this->createPicture($filePath, $adId);

              \Log::info('filepath1' . $file);
              \Log::info('filepath2' . $filePath);
              $oldPath = storage_path('app/public/messages/') . $filePath;
              $newPath = storage_path('app/public/messages/') . 'small_' . $filePath;
              $middlePath = storage_path('app/public/messages/') . 'middle_' . $filePath;

              if (\File::copy($oldPath, $newPath)) {
                  \Log::info('filepath2' . $filePath);
                $this->createThumbnail($newPath, 200, 200);
              }

              if (\File::copy($oldPath, $middlePath)) {
                  \Log::info('filepath2' . $filePath);
                $this->createThumbnail($middlePath, 800, 800);
              }

          }
  }



  }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
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
    \Log::info('ForValue',$data->input('filter_value'));
    foreach ($data->input('filter_id') as $key=>$filter) {
      \Log::info('FilterSave=>key',array($filter));
      $filterId=$data->input('filter_id')[$key];
      \Log::info('Error=>key'.$key);
      \Log::info('EndError=>key'.$data->input('filter_value')[$key]);
      $filterValue=$data->input('filter_value')[$key];
      $this->createFilter($filterId,$filterValue, $adId);
    }
  }

    public function saveFilterDeals($data, $adId)
    {
        \Log::info('add_filter_deals'.$data->filterDeals);
        AddFilterDeals::create([
        'add_id' => $adId,
        'filter_deals_id' => $data->filterDeals,
        ]);
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
