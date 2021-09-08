<?php

namespace App\Services\Frontend;

use App\Models\AboutUs;

class AboutUsService
{

    public function fetchAllWithPaginate()
    {
        return AboutUs::query()->get();
    }


}


?>
