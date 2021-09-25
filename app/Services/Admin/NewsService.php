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
        $validated['Media'] = $file;
        $validated['UserId'] = auth()->id();
        $news = News::query()->create($validated);
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
        if ($validated['Media']) {
            Storage::disk('public')->delete("news/{$news->Media}");
            $validated['Media'] = $this->saveFile($validated['Media']);
        }

        $news = tap($news)->update($validated);

        $modelTags = [];
        foreach ($validated["TagId"] as $tag) {
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

    protected function saveFile(UploadedFile $file)
    {
        $f_name = "IMG_" . date("d-m-Y_H-i-s") . "." . $file->getClientOriginalExtension();
        $file->storeAs("news", $f_name, 'public');
        return $f_name;
    }


}


?>
