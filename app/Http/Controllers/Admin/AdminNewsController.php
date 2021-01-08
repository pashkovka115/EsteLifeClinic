<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatPost;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate();

        return view('admin.news.index', ['posts' => $posts]);
    }


    public function create()
    {
        $categories = CatPost::all(['id', 'name']);

        return view('admin.news.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'read_time' => 'nullable|string',
            'content' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'keywords' => 'nullable|string',
            'img' => 'nullable|image',
            'bg_img' => 'nullable|image',
            'cat_post_id' => 'required|numeric',
        ]);

        $data = $request->except(['_method', '_token']);
        $folder = date('Y/m/d');

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/posts/$folder");
            $data['img'] = $img;
        }

        if ($request->hasFile('bg_img')) {
            $img = $request->file('bg_img')->store("images/posts/$folder");
            $data['bg_img'] = $img;
        }

        $post = new Post($data);
        $post->save();

        return redirect()->route('admin.pages.news.edit', ['news' => $post->id]);
    }


    public function edit($id)
    {
        $post = Post::with('category')->where('id', $id)->firstOrFail();
        $cats = CatPost::all();

        return view('admin.news.edit', ['post' => $post, 'categories' => $cats]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'read_time' => 'nullable|string',
            'content' => 'nullable|string',
            'title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'keywords' => 'nullable|string',
            'img' => 'nullable|image',
            'bg_img' => 'nullable|image',
            'cat_post_id' => 'required|numeric',
        ]);

        $data = $request->except(['_method', '_token']);
        $folder = date('Y/m/d');
        $post = Post::where('id', $id)->firstOrFail();

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store("images/posts/$folder");
            $data['img'] = $img;
            $old_file = storage_path('app/public') . '/' . $post->img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        if ($request->hasFile('bg_img')) {
            $img = $request->file('bg_img')->store("images/posts/$folder");
            $data['bg_img'] = $img;
            $old_file = storage_path('app/public') . '/' . $post->bg_img;
            if (is_file($old_file)){
                unlink($old_file);
            }
        }

        $post->update($data);

        return back();
    }


    public function destroy($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $old_file = storage_path('app/public') . '/' . $post->img;
        if (is_file($old_file)){
            unlink($old_file);
        }
        $post->delete();

        return back();
    }
}
