<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class PostCommentController extends Controller
{
    //
    public function addPost()
    {
        $post = new Post();
        $post->title = "First Post Title";
        $post->content = "First Post Content";
        $post->save();
        return "Post has been created";


    }
    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "This is third comment";
        $post->comments()->save($comment);
        return "comment has been posted";
    }

    public function getCommentById($id)
    {
        $comments = Post::find($id)->comments;
        return $comments;
    }
}
