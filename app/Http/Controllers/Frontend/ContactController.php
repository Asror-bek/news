<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\ContactService;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contact = $this->contactService->fetchAllWithPaginate();

        return view('user.contact',[
            'contact' => $contact
        ]);
    }
}
