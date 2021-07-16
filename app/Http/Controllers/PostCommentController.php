<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class PostCommentController extends Controller
{
    
    public function getCommentById($id)
    {
        $comments = Post::find($id)->comments;
        
        //return $comments;
        return view('comment.index',compact('comments'));
    }

    public function createcommments()
    {
        //
        return view('comment.createcomment');//post folder out ka create page ko return
    }

    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "This is second comment";
        $post->comments()->save($comment);
        //return "comment has been posted";



    }


}
