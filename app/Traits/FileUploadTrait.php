<?php
namespace App\Traits;


use File;
use Illuminate\Http\Request;

trait FileUploadTrait {
    public function uploadImage(Request $request, ?string $inputName, string $oldpath = null, string $path ='/uploads' ): ?string{
        if($request->hasFile($inputName)){
           $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
             $imageName = 'media_' . uniqid().'.' . $ext;

             $image->move(public_path($path), $imageName);

             $excludedFolder = '/default';

             if($oldpath && File::exists(public_path($oldpath)) && strpos($oldpath, $excludedFolder)!== 0){
                File::delete(public_path($oldpath));
             }
             return $path . '/' . $imageName;
        }
        return null;
    }
    public function deleteFile($path):void{
        $excludedFolder = '/default';

        if($path && File::exists(public_path($path)) && strpos($path, $excludedFolder)!== 0){
           File::delete(public_path($path));
        }
    }
}
