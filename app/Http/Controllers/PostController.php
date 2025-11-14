<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return back()->with('success', 'Post Berhasil dihapus (Soft Delete)');
    }

    public function trash(){
        $posts = Post::onlyTrashed()->get();
        return view('trash', compact('posts'));

    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return back()->with('success', 'Post berhasil direstore');
    }

    public function forceDelete($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        return back()->with('success', 'Post dihapus permanen');
    }   
}
