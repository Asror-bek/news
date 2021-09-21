<?php

namespace App\Services\Frontend;

use App\Models\News;
use App\Models\Category;

class FrontendService
{

    public function fetchAllWithPaginate()
    {
        $newsQuery = News::query();
        foreach(request()->query() as $key => $value) {
            if($key === 'filter' && $value != null) {
                    $newsQuery->where('CategoryId', $value);
            }
        }
        return $newsQuery->get();
    }

    public function index()
    {
        return Category::query()->get();
    }

}


?>
