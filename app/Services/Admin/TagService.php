<?php

namespace App\Services\Admin;

use App\Models\Tags;

class TagService
{
    public function fetchAllWithPaginate()
    {
        return Tags::query()->get();
    }

    public function createNewTag(array $validated)
    {
        $tag = new Tags();
        $tag->name = $validated['name'];
        $tag->save();
        return $tag;
    }

    public function updateExistingTag(array $validated, Tags $tag)
    {
        $tag->name = $validated['name'];
        $tag->save();
        return $tag;
    }

    public function deleteTag(Tags $tag)
    {
        $tag->delete();
    }
}



?>
