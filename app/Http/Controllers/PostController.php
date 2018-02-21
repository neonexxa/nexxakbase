<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        $file = $request->file('pdf');
        $filename = str_replace(' ', '_', $file->getClientOriginalName());

        $request->file('pdf')->move(base_path() . '/public/pdf', $filename);

        $post = new Post;
        $post->title        = $param['title'];
        $post->description  = $param['description'];
        $post->pdf          = $filename;
        $post->save();

        // manual
        // $client = new \AlgoliaSearch\Client('id', 'secret');
        // $index = $client->initIndex('utp_index');
        // $index->addObject(
        //   $post
        // );
        // end of manual way

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /*
    *
    *   Changes for Search
    *   Description :   
    *   Last edited by : Firdausneonexxa
    *
    */
        
    public function search (Request $request){
        $parameters = $request->all();
        if (isset($parameters['query'])) {
            $posts = Post::search($parameters['query'])->paginate(5);
            return redirect()->back()->with('posts', $posts);
        }else{
            return view('home');
        }

    }
        
}
