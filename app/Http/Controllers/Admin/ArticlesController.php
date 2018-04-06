<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Article;
use App\User; // добавляем для того, чтобы получить доступ к модели с пользователями
use App\Http\Controllers\Controller; // добавил

class ArticlesController extends Controller
{
    public function getPosts()
    {    	
        $objArt = new Article;
        $objUser = new User;
        //dd($objUser);
    	$articles = $objArt->orderBy('id', 'desc')->paginate(4);
        //$user = $objUser->articles;
        //dd($user->articles);
        //dd($articles);
        return view('admin/articles/articles', ['articles' => $articles]);
    }

     public function deleteArticle($id) {
        $objArticle = new Article();
        $objArticle->where('id', $id)->delete();
        // $news = Article::find($id);
        // $articles->delete();
        return redirect()->route('articles_edit');
    }

    public function publArticle(Request $request, $id) {
        $articles = Article::find($id);
        $articles->isPublished = 1;
        $articles->save();
        return redirect()->route('articles_edit');        
    }
}
