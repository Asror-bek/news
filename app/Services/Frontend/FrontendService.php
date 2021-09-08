<?php

namespace App\Services\Frontend;

use App\Models\News;

class FrontendService
{

    public function fetchAllWithPaginate()
    {
        return News::query()->get();
    }

}


?>
