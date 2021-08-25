<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Services\AboutUsService;

class AboutUsController extends Controller
{

    private $aboutUsService;

    public function __construct(AboutUsService $aboutUsService)
    {
        $this->aboutUsService = $aboutUsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = $this->aboutUsService->fetchAllWithPaginate();
        return view('aboutUs.index',[
            'aboutUs' => $aboutUs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutUs.create',[
            'aboutUs' => AboutUs::query()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutUsRequest $request)
    {
        $this->aboutUsService->createNewAboutUs($request->validated());
        return redirect()->route('aboutUs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        return view('aboutUs.edit',[
            'aboutUs' => $aboutUs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUsRequest $request, AboutUs $aboutUs)
    {
        $this->aboutUsService->updateExistingAboutUs($request->validated(), $aboutUs);
        return redirect()->route('aboutUs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        $this->aboutUsService->deleteAboutUs($aboutUs);
        return redirect()->route('aboutUs.index');
    }
}
