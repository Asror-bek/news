<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tags;
use App\Services\Admin\CommentService;
use App\Services\Admin\NewsService;

class NewsController extends Controller
{

    private $newsService;
    private $commentService;

    public function __construct(NewsService $newsService, CommentService $commentService)
    {
        $this->newsService = $newsService;
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->newsService->fetchAllWithPaginate();

        return view('admin.news.index',[
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create',[
            'category' => Category::query()->get(),
            'tags' => Tags::query()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $this->newsService->createNews($request->validated());
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        $comment = $this->commentService->fetchAllWithPaginate($id);
        return view('admin.news.show', [
            'news' => $news,
            'comment' => $comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'category' => Category::query()->get(),
            'tags' => Tags::query()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {

        $this->newsService->updateExistingNews($request->validated(), $news);
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->newsService->deleteNews($news);
        return redirect()->route('admin.news.index');
    }
}
