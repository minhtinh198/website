<?php
namespace App\traits;
use Illuminate\Support\Str;
use Storage;

trait StorageImage {

    //Up_load 1 file
    public function Upload_FILE($request,$fileName, $fodername)
    {
            if($request->hasFile($fileName)){
                    $file= $request->$fileName;
                    $fileNameOrigin=$file->getClientOriginalName();
                    //$fileHash=Str::random(20) .'.'.$file->getClientOriginalExtension();
                    $path = $request->file($fileName)->storeAs('public/' .$fodername. '', $fileNameOrigin);
                    $dataUpload= [
                        'File_Name' => $fileNameOrigin,
                        'File_Path' => Storage::url($path),
                    ];
                        return $dataUpload;
            }
            return null;
    }


    //Up_load nhiều file
    public function Upload_FILES($file, $fodername)
    {
                    $fileNameOrigin=$file->getClientOriginalName();
                    //$fileHash=Str::random(20) .'.'.$file->getClientOriginalExtension();
                    $path = $file->storeAs('public/' .$fodername. '', $fileNameOrigin);
                    $dataUpload= [
                        'File_Name' => $fileNameOrigin,
                        'File_Path' => Storage::url($path),
                    ];
                    return $dataUpload;

    }
}
