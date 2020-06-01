<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('isarticleowner', ['only' => ['edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('main')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createarticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (($request->input('title') == null) or ($request->input('body') == null))
        {
            return back()->withInput($request->all())->with('error', 'Your article missing either title or body.');
        }
        $allowed_files_ext = array('png', 'jpg', 'jpeg', 'bmp');
        if ($request->hasFile('image'))
        {
            if (in_array($request->file('image')->getClientOriginalExtension(), $allowed_files_ext)) 
            {
                $imgurl = $request->file('image')->store('articleimages', 'public');
            }
            else 
            {
                return back()->withInput($request->all())->with('error', 'Your file type is now allowed.');
            }
        }
        else 
        {
            $imgurl = 'articleimages/none.jpg';
        }
        $article = Article::create([
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'imgurl' => $imgurl,
        ]);
        $article->user()->associate($request->user());
        $request->user()->articles()->save($article);
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('viewarticle')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('editarticle')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if ($request->hasFile('image'))
        {
            $imgurl = $request->file('image')->store('articleimages', 'public');
            Storage::delete($article->imgurl);
        }
        else
        {
            $imgurl = $article->imgurl;
        }
        $article->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'imgurl' => $imgurl,
        ]);
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article->imgurl != 'articleimages/none.jpg')
        {
            Storage::delete($article->imgurl);
        }
        $article->delete();
        // if ($request->segment(1) == "articles")
        return redirect()->route('usersarticles');
    }
}
