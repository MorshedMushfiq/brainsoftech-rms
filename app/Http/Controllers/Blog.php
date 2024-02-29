<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Blog extends Controller
{

    public function allPosts(){
        $blog = Post::all();
        return view('allposts', compact("blog"));
    }


     //upload blog method
     public function uploadBlog(Request $request){
        
            $post = new Post;
            $post->title = $request->post_title;
            $post->description = $request->post_description;
            $post->save();
            return redirect()->back()->with("success", "Post Upload Succcess");
    
    }

        //update post
        public function updatePost(Request $request){
           
                $post = Post::find($request->id);
                $post->title=$request->post_title;
                $post->description = $request->post_description;
                $post->save();
                return redirect()->back()->with("success", "Post Updated Successfull!!");
      

            
        }

        //delete post.
        public function deletePost($id){
            $delete_post = Post::find($id);
            $delete_post->delete();            
            return redirect()->back()->with('success', "post deleted Successfull");
        }
}
