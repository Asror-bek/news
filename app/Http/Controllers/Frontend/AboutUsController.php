<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\AboutUsService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $aboutUsService;

    public function __construct(AboutUsService $aboutUsService)
    {
        $this->aboutUsService = $aboutUsService;
    }

    public function index()
    {
        $aboutUs = $this->aboutUsService->fetchAllWithPaginate();

        return view('user.aboutUs',[
            'aboutUs' => $aboutUs
        ]);
    }

}
