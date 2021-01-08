<?php

namespace App\Http\Controllers;

use App\Models\CatPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class NewsController extends Controller
{
    public function index()
    {
        $news = Post::paginate(9);
        $cats = CatPost::all(['slug', 'name']);

        return view('pages.news.index', ['news' => $news, 'categories' => $cats]);
    }

    public function categoryIndex($slug)
    {
        $news = Post::whereHas('category', function (Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->paginate(9);

        $cats = CatPost::all(['slug', 'name']);

        return view('pages.news.category_index', ['news' => $news, 'categories' => $cats]);
    }


    public function ajax()
    {
        $news = Post::paginate(9);

        return view('pages.news.ajax', ['news' => $news]);
    }


    public function categoryAjax($slug)
    {
        $news = Post::whereHas('category', function (Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->paginate(9);

        return view('pages.news.ajax', ['news' => $news]);
    }


    public function show($slug)
    {
        $news = Post::with('category')->where('slug', $slug)->firstOrFail();
        $categories = CatPost::all(['slug', 'name']);
        $latest_news = Post::orderBy('updated_at', 'DESC')->limit(2)->get();
        $random_news = Post::inRandomOrder()->limit(3)->get();

        return view('pages.news.show', [
            'news' => $news,
            'categories' => $categories,
            'latest_news' => $latest_news,
            'random_news' => $random_news
        ]);
    }
}
