<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    // Display all posts based on some rules
    public function index()
    {
        $posts = Post::where('status', 'published')->paginate(10);
        return view('pages.blog.category')->with([
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }
    
    // Display the categories from witch to select
    public function blog()
    {
        $categories = Category::all();
        return view('pages.blog.blog')->with('categories', $categories);
    }

    // Display all posts from one category
    public function category(Category $category)
    {
        $posts = $category->posts()->where('status', 'published')->paginate(10);
        return view('pages.blog.category')->with([
            'posts'      => $posts,
            'categories' => Category::all(),
            'category'   => $category
        ]);
    }

    // Display all posts for a user
    public function userPosts(User $user)
    {
        $posts = $user->posts()->where('status', 'published')->paginate(10);
        return view('pages.blog.category')->with([
            'posts' => $posts,
            'user'  => $user
        ]);
    }

    // Display one specific post
    public function post(Category $category, Post $post)
    {
        return view('pages.blog.post')->with([
            'post' => $post,
            'related_posts' => Post::take(3)->get()
        ]);
    }
}
