<?php

namespace App\Services;

use App\Models\News;
use App\Models\Tags;
use App\Models\NewsTags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

class NewsService
{
    public function fetchAllWithPaginate()
    {
        return News::query()->get();
    }

    public function createNews(array $validated)
    {

        $file = $this->saveFile($validated["media"]);
        $news = new News();
        $news->title = $validated['title'];
        $news->text = $validated['text'];
        $news->media = $file;
        $news->CategoryId = $validated['CategoryId'];
        $news->UserId = Auth::id();
        $news->save();
        foreach ($validated["TagId"] as $key => $value) {
            $newsTag = new NewsTags();
            $newsTag->NewsId = $news->id;
            $newsTag->TagId = $value;
            $newsTag->save();
        }
        return $news;

    }

    public function updateExistingNews(array $validated, News $news)
    {
        $news->title = $validated['title'];
        $news->text = $validated['text'];
        $news->CategoryId = $validated['CategoryId'];
        $news->UserId = Auth::id();
        $news->save();
        $news->tags()->attach($validated['TagId']);
        return $news;
    }

    public function deleteNews(News $news)
    {
        $news->tags()->detach();
        $news->delete();
    }

    protected function saveFile(UploadedFile $file) {
        $f_name = "IMG_".date("d-m-Y_H-i-s").".".$file->getClientOriginalExtension();
        $file->storeAs("public/about-us", $f_name);
        return $f_name;
    }

}


?>
