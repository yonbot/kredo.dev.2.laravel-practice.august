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

    #CREATE
    public function save()
    {
        //$post = new Post;
        $this->post->title = "This is Another Post";
        $this->post->content = "Testing Post";
        $this->post->save();

        // save also be used to update model

        //Insert Into post(title, content) values('Laravel 10 Release', 'As you may know, we updated the Laravel relase cycle.');
        return "New post saved successfully!";
    }

    public function create()
    {
        //$post = New Post;

        // mass assignment
        $new_post = [
            'title' => 'How to Stay Productive',
            'content' => 'To be truly productive, you must first set your goal.'
        ];

        $this->post->create($new_post);
        return "New post saved!";
    }

    #READ
    public function index()
    {
        //$post_m = new Post;
        $all_posts = $this->post->all(); // SELECT * FROM posts
        /*
            $all_posts = [
                [
                    'id' => 1,
                    'title' => 'Laravel 10 Release',
                    'content' => 'As you may know, we updated'
                ],
                [
                    'id' => 2,
                    'title' => 'How to Stay Productive',
                    'content' => 'To be truly productive, you must first set goal.'
                ]
            ];
        */

        foreach ($all_posts as $post) {
            echo "Title: $post->title";
            echo "<br>";
            echo $post->content;
            echo "<hr>";
        }
    }

    public function show($post_id)
    {
        //$post_m = New Post;

        $post = $this->post->findOrFail($post_id);
        // SELECT * FROM posts WHERE id = $post_id
        // Only looking for an id
        // throw exception.

        echo "Title: $post->title";
        echo "<br>";
        echo $post->content;
    }

    public function showWhere($post_id)
    {
        //$post_m = new Post;

        //$post = $this->post->where('id', $post_id)->get();
        //$post = $this->post->where('id', '>', $post_id)->get();
        //$post = $this->post->where('title', 'like', '%10%')->get();
        $post = $this->post->orderBy('title', 'desc')->take(1)->get();

        foreach ($post as $p) {
            echo "Title: $p->title";
            echo "<br>";
            echo $p->content;
            echo "<hr>";
        }
    }

    public function update($post_id)
    {
        //$post_obj = new Post;
        $post_details = $this->post->findOrFail($post_id);
        $post_details->title = "New Title";
        $post_details->content = "New Content";

        $post_details->save();

        return "Post " . $post_id . " is updated!";
    }

    public function destroy($post_id)
    {
        //$post_m = new Post;

        $this->post->destroy($post_id);

        // $post_m->destroy(4, 5, 6);

        // $ids = [7, 8, 9];
        // $post_m->destroy($ids);

        return $post_id . " is deleted";
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
        //$post_titles = [];

        return view('view-all')
            ->with('post_titles', $post_titles);
    }

    // public function show($username)
    // {
    //     $post_titles = [
    //         'How to Make French Toast',
    //         'Japanese Cheesecake Recipe',
    //         'How to Cook Steak',
    //         'The Best Places in Tokyo for Shokkupan Bread',
    //         'Cambodian Style Fried Chicken Wings'
    //     ];

    //     return view('show')
    //             ->with('username', $username)
    //             ->with('post_titles', $post_titles);
    // }
}
