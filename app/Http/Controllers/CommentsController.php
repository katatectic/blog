<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function addComment(Request $request) {
        $comment = new Comment;
        if ($request->method()=='POST') {
            $comment->comment = $request->comment; // вот отсюда доделать добавление поста
            $comment->user_id = $request->user_id;
            $comment->article_id = $request->article_id;            
            $comment->save();
            return redirect()->route('welcome'); // возвращаемся в админку
        }
        return view('article');
    }

    public function deleteComment($id) {
        $comment = new Comment;
        $article = new Article;        
        $comment->where('id', $id)->delete();
        return redirect()->route('welcome');
    }
}
