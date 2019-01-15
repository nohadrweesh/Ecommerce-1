<?php
/**
 * Created by PhpStorm.
 * User: Lenovo02
 * Date: 1/7/2019
 * Time: 10:32 AM
 */

namespace App\Http\Controllers;


use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class GlobalController
{
    public  static function upload($data=[]){
        if(!empty($data['delete_file']) && Storage::has($data['path'].'/'.'large/'.$data['delete_file'])){
                Storage::delete($data['path'].'/'.'large/'.$data['delete_file']);
        }
        if(!empty($data['delete_file']) && Storage::has($data['path'].'/'.'medium/'.$data['delete_file'])){
            Storage::delete($data['path'].'/'.'medium/'.$data['delete_file']);
        }
        if(!empty($data['delete_file']) && Storage::has($data['path'].'/'.'small/'.$data['delete_file'])){
            Storage::delete($data['path'].'/'.'small/'.$data['delete_file']);
        }

        if($data['upload_type']=='single'&&request()->hasFile($data['file']) ){
            $image_tmp=Input::file($data['file']);
            $image_name=time().'_'.Input::file($data['file'])->getClientOriginalName();


            $large_image=Image::make($image_tmp)->resize(900, 900);
            $medium_image=Image::make($image_tmp)->resize(600, 600);
            $small_image=Image::make($image_tmp)->resize(300, 300);

            Storage::disk('public')->put($data['path'].'/large/'.$image_name, $large_image->encode());
            Storage::disk('public')->put($data['path'].'/medium/'.$image_name, $medium_image->encode());
            Storage::disk('public')->put($data['path'].'/small/'.$image_name, $small_image->encode());



            return $image_name;

        }else if($data['upload_type']=='multiple'   ){
            //dd($data);
            $image_tmp=$data['data'];
            //dd($image_tmp);
            $image_name=time().'_'.($data['data'])->getClientOriginalName();
            //dd($data['file'][$data['index']]);

            $large_image=Image::make($image_tmp)->resize(900, 900);
            $medium_image=Image::make($image_tmp)->resize(600, 600);
            $small_image=Image::make($image_tmp)->resize(300, 300);

            Storage::disk('public')->put($data['path'].'/large/'.$image_name, $large_image->encode());
            Storage::disk('public')->put($data['path'].'/medium/'.$image_name, $medium_image->encode());
            Storage::disk('public')->put($data['path'].'/small/'.$image_name, $small_image->encode());



            return $image_name;

        }else{

        }

    }
}