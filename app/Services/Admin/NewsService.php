<?php

namespace App\Services\Admin;

use App\Models\News;
use App\Models\NewsTags;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public function fetchAllWithPaginate()
    {
        return News::query()->get();
    }

    public function createNews(array $validated)
    {

        $file = $this->saveFile($validated["Media"]);
        $news = new News();
        $news->Title = $validated['Title'];
        $news->Text = $validated['Text'];
        $news->Media = $file;
        $news->CategoryId = $validated['CategoryId'];
        $news->UserId = Auth::id();
        $news->save();
        foreach ($validated["TagId"] as $key => $value) {
            $tag = new Tags();
            $tag->Name = $value;
            $tag->save();
            $newsTag = new NewsTags();
            $newsTag->NewsId = $news->id;
            $newsTag->TagId = $tag->id;
            $newsTag->save();
        }
        return $news;

    }

    public function updateExistingNews(array $validated, News $news)
    {

        $news->Title = $validated['Title'];
        $news->Text = $validated['Text'];
        $news->CategoryId = $validated['CategoryId'];
        $news->UserId = Auth::id();


        if($validated['Media'])
        {

            $destination = 'public/news'. $news->Media;
            Storage::disk('public')->delete($destination);

            $extension = $validated['Media']->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $mediaFile = $validated['Media'];
            $mediaFile->storeAs('news', $filename, 'public');

            $news->Media = $filename;
        }

        $news->save();
        $modelTags = [];
        foreach($validated["TagId"] as $tag) {
            $modelTag = Tags::query()->firstOrCreate([
                'Name' => $tag
            ]);
            array_push($modelTags, [
                'TagId' => $modelTag->id,
                'NewsId' => $news->id
            ]);
        }

        $news->tags()->detach();
        $news->tags()->attach($modelTags);
        return $news;
    }

    public function deleteNews(News $news)
    {
        $news->tags()->detach();
        $news->delete();
    }

    protected function saveFile(UploadedFile $file) {
        $f_name = "IMG_".date("d-m-Y_H-i-s").".".$file->getClientOriginalExtension();
        $file->storeAs("public/news", $f_name);
        return $f_name;
    }


}


?>
