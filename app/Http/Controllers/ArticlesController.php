<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function getPosts()
    {
    	$objArt = new Article();
    	$articles = $objArt->orderBy('id', 'desc')->paginate(10);    	
        return view('welcome', ['articles' => $articles]);
    }

    public function getArticle($id) {
        $article = Article::find($id);
       return view('article', ['article' => $article]);
    }

    public function addArticle(Request $request) {
        $article = new Article;
        if ($request->method()=='POST') {
            $this -> validate($request, [
                'title' => 'required|max:255',
                'short_text' => 'required',
                'full_text' => 'required',
                'publication_date' => 'required',
                 'image' => 'required',       
            ],
            [
                'title.required' => 'пустая строка статьи',
                'short_text.required' => 'пустая строка короткого содержания',
                'full_text.required' => 'нет текста статьи',
                'publication_date.required' => 'не указана дата',
                'image.required' => 'нет файла',
                ]);
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = $image->getClientOriginalName();
                $destinationPath = public_path('images');
                $image->move($destinationPath, $fileName);
                $imgPath = '/blog2/public/images/'.$fileName;
            }
            $article->title = $request->title; // вот отсюда доделать добавление поста
            $article->short_text = $request->short_text;
            $article->full_text = $request->full_text;
            $article->user_id = $request->user_id;
            $article->publication_date = $request->publication_date;
            $article->photo_path = $imgPath;
            $article->save();            
            return redirect()->route('welcome'); // возвращаемся в админку
        }
        return view('create_post');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'title' => 'required|string|max:255',
    //         'short_text' => 'required|string|max:255',
    //         'full_text' => 'required|string|email|max:255|unique:users',
    //         //'publication_date' => 'required|string|min:3|confirmed',
    //     ]);
    // }

    public function selectUsersArticles($id) {
        //$objArt = new Article();
        $user = User::find($id);
        $user->articles;
        $user_name = $user->name;
        $user_surname = $user->surname;
        return view('users_articles', 
            ['articles' => $user->articles], 
            ['user_name' => $user_name.' '.$user_surname]);
    }

    public function publishedArticles($id) {
        $user = User::find($id);
        $user->articles;
        $user_name = $user->name;
        $user_surname = $user->surname;
        return view('user\published_articles', ['articles' => $user->articles], ['user_name' => $user_name.' '.$user_surname]);
    }

    public function unpublishedArticles($id) {
        $user = User::find($id);
        $user->articles;
        $user_name = $user->name;
        $user_surname = $user->surname;
        return view('user\unpublished_articles', ['articles' => $user->articles], ['user_name' => $user_name.' '.$user_surname]);
    }

}
