<?php

namespace App;
use File;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table='banner_photos';
    protected $fillable=['path'];
    protected  $baseDir='images/photos';

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

//    public static function named($name)
//    {
//        $photo=new static;
//        $photo->saveAs($name);
//        return $photo;
//    }


//---------------------------------------------------------------------------------
    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;//hon fun static ast pas in ebarat jaighozine $this ast
        $name = time() . $file->getClientOriginalName();
        $photo->path = $photo->baseDir . '/' . $name;    //DIRECTORY_SEPARATOR='/'
        $file->move($photo->baseDir, $name);
        return $photo;

//        $photo->saveAs($file->getClientOriginalName());
//        $name=time().$file->getClientOriginalName();
//
    }
//--------------------------------------------------------------------------------

//--------------------------------------------------------------------------------




//    public function makePhoto(UploadedFile $file)
//    {
//         $file->move($this->baseDir,$this->name);
//    }
//
//    public function saveAs($name)
//    {
//        $this->name=sprintf("%s-%s",time(),$name);
//        $this->path=sprintf("%s/%s",$this->baseDir,$this->name);
//        $this->thumbnail_path=sprintf("%s/%tn-%s",$this->baseDir,$this->name);
//
//    }
//
//    public function move(UploadedFile $file)
//    {
//        $file->move($this->baseDir,$this->name);
//       $this->makeThumbnail();
//        return $this;
//    }
//
//    public function makeThumbnail()
//    {
//        Image::make($this->path)->fit(200)->save($this->thumbnail_path);
//        return $this;
//    }

    public function delete()
    {
        parent::delete();

        File::delete([
            $this->path,
            $this->thumbnail_path

        ]);
   }

}
