<?php

namespace App\Services;

use App\Models\AboutUs;
use Illuminate\Http\UploadedFile;
class AboutUsService
{
    public function fetchAllWithPaginate()
    {
        return AboutUs::query()->get();
    }

    public function createNewAboutUs(array $validated)
    {
        $file = $this->saveFile($validated["media"]);
        $aboutUs = new AboutUs();
        $aboutUs->text = $validated['text'];
        $aboutUs->media = $file;
        $aboutUs->save();
        return $aboutUs;
    }

    public function updateExistingAboutUs(array $validated, AboutUs $aboutUs)
    {
        $aboutUs->text = $validated['text'];
        $aboutUs->save();
        return $aboutUs;
    }

    public function deleteAboutUs(AboutUs $aboutUs)
    {
        $aboutUs->delete();
    }

    protected function saveFile(UploadedFile $file) {
        $f_name = "IMG_".date("d-m-Y_H-i-s").".".$file->getClientOriginalExtension();
        $file->storeAs("public/about-us", $f_name);
        return $f_name;
    }

    
}



?>
