<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index' ,compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'title' => 'bail|required|unique:posts|max:255',
         'body' => 'bail|required']);
   
                $post= new Post;
                $post->title= $request->input('title');
                $post->body= $request->input('body');
                $post->save();

                return redirect('/posts')->with('success', 'le poste a été créé avec succes');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        return view('posts.edit')->with('post', $post);

        
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
        
       $this->validate($request,[
        'title' => 'bail|required|unique:posts|max:255',
         'body' => 'bail|required']);
   
                $post=  Post::find($id);
                $post->title= $request->input('title');
                $post->body= $request->input('body');
                $post->save();

                return redirect('/posts')->with('success', 'le poste a été madifer avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy( Post $post ){

        $post ->delete();
         return redirect()->route('posts.index')->with(['success' => 'supprimer avec succès']);
    }


    
}
