<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        $posts = Post::all();//get all data from model
        return view('post.index',compact('posts'));//return datas to Ui with compact
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');//post folder out ka create page ko return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //need to fill textboxes 
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        //Insert into database
        Post::create([
            'title' => $request->title, // fist title is name in db, second is name in Ui
            'content' => $request->content// fist content is name in db, second is name in Ui
        ]);
        return redirect('/posts')->with('successAlert','You have successfully added');// redirect to index page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);//find id in Post model if exist compact it into return
        return view('post.edit',compact('post'));

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

        //need to fill textboxes 
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        //
        Post::find($id)->update([
            'title' => $request->title, // fist title is name in db, second is name in Ui
            'content' => $request->content// fist content is name in db, second is name in Ui
        ]);
        return redirect('/posts')->with('successAlert','You have successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Post::find($id)->delete();
        return redirect('/posts')->with('successAlert','You have successfully delete');
    }
}
