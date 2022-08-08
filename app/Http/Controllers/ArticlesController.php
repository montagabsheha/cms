<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleItems;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class ArticlesController extends Controller
{
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $user_id =  auth('web')->user()->id;
        $articles = Article::latest()->where('user_id',$user_id)->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('articles.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['user_id']= auth('web')->user()->id;
//        $blocksarray = preg_split ("/\,/", $_POST['output']);


        $input['title']= $request['title']?$request['title']:"non titled";//$request['title'];



        $article = Article::create($input);


        $blocksarray = json_decode($_POST['output']);
//        var_dump($blocksarray->blocks);
        $temp_array=$blocksarray->blocks;
        if(count($temp_array)){
            foreach ($temp_array as $item) {
                if ($item->type == "paragraph") {
                    $data = $item->data;
                    $itemp['type'] = 2;
                    $itemp['article_id'] = $article->id;
                    $itemp['content'] = $data->text;
                    $article_item = ArticleItems::create($itemp);
    //                var_dump($data->text);
                } elseif ($item->type == "image") {
                    $data = $item->data;
                    $itemp['type'] = 1;
                    $itemp['article_id'] = $article->id;
                    $itemp['content'] = $data->url;
                    $article_item = ArticleItems::create($itemp);
    //                var_dump($data->url);
                }

            }
        }
//
//        $itemp['type']= $request['type'];
//        $itemp['article_id']= $article->id;
//        $itemp['content']= $request['content'];

//        $article_item = ArticleItems::create($itemp);
        return redirect()->route('articles.index')
            ->withSuccess(__('Article created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        $article = Article::latest()->where('id',$article_id)->first();
        $article_items = ArticleItems::latest()->where('article_id',$article_id)->orderby('id','ASC')->get();
        return view('articles.show', [
            'article' => $article,
            'article_items' => $article_items
        ]);
    }




}
