<?php

namespace App\Services\Frontend;

use App\Models\Contact;

class ContactService
{

    public function fetchAllWithPaginate()
    {
        return Contact::query()->get();
    }

}


?>
