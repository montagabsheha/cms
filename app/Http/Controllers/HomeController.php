<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleItems;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {

        $articles = Article::latest()->orderby('id','DESC')->get();

        return view('home.index', compact('articles'));
    }
}
