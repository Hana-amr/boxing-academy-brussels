<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Comment;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $news->load('likes', 'comments.user');

        return view('news.show', compact('news'));
    }

    public function toggleLike(News $news)
    {
        $user = Auth::user();

        if ($news->likes()->where('user_id', $user->id)->exists()) {
            // Unlike
            $news->likes()->detach($user->id);
        } else {
            // Like
            $news->likes()->attach($user->id);
        }

        return back();
    }

    public function storeComment(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'news_id' => $news->id,
            'content' => $request->content,
        ]);

        return back();
    }
}
