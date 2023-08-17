<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function show($post_id)
    {
        $post = $this->post->findOrFail($post_id);

        return view('posts.show')->with('post', $post);
    }

    #CREATE
    public function save()
    {
        $post = new Post;
        $post->title    = "This is Another Post";
        $post->content  = "Testing post";
        $post->save();
        //INSERT INTO posts(title, content) VALUES ('Laravel 10 Release', 'As you may know, we updated the Laravel release cycle.')

        return "New post saved successfully!";
    }

    public function create()
    {
        $post = new Post;

        $new_post = [
            'title'     => 'How to Stay Productive',
            'content'   => 'To be truly productive, you must first set your goals.'
        ];

        $post->create($new_post);
        return "New post saved!";
    }

    #READ
    public function index()
    {
        $post_m = new Post;

        $all_posts = $post_m->all();
        //SELECT * FROM posts
        /* $all_posts = [
            [
                'id'        => 1,
                'title'     => 'Laravel 10 Release',
                'content'   => 'As you may know, we updated the Laravel release cycle.' 
            ],
            [
                'id'        => 2,
                'title'     => 'How to Stay Productive',
                'content'   => 'To be truly productive, you must first set your goals.'
            ]
        ];
        */

        foreach ($all_posts as $post) {
            echo "TITLE: $post->title";
            echo "<br>";
            echo $post->content;
            echo "<hr>";
        }
    }

    // public function show($post_id)
    // {
    //     $post_m = new Post;

    //     $post =  $post_m->findOrFail($post_id);
    //     // SELECT * FROM posts WHERE id = $post_id

    //     echo "Title: $post->title";
    //     echo "<br>";
    //     echo $post->content;
    // }

    public function showWhere($post_id)
    {
        $post_m = new Post;

        // $post = $post_m->where('id', $post_id)->get();
        // SELECT * FROM posts WHERE id = $post_id

        // $post = $post_m->where('id', '<', $post_id)->get();
        // SELECT * FROM posts WHERE id > $post_id

        // $post = $post_m->where('title', 'like', '%P%')->get();
        // SELECT * FROM posts WHERE title like '%P%'

        $post = $post_m->orderBy('title', 'desc')->get();

        foreach ($post as $p) {
            echo "Title: $p->title";
            echo "<br>";
            echo $p->content;
            echo "<hr>";
        }
    }

    public function viewPost($post_id)
    {
        return "Post Controller: This is post $post_id";
    }

    public function viewUserPost($username, $post_id)
    {
        // return "Post $post_id. This is the post of $username";

        return view('view-post')
            ->with('UName', $username)
            ->with('post_number', $post_id);
    }

    public function viewAllPosts()
    {
        $post_titles = [
            'Python vs Java',
            'The Cloud',
            'How to Stay Productive',
            'Coding during a Pandemic'
        ];
        // $post_titles = [];

        return view('view-all')
            ->with('post_titles', $post_titles);
    }
}
