<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Feedback;
use App\Follower;
use App\Note;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index()
    {
        Auth::user()->id;
        $users = User::where("id", Auth::user()->id)->get();
        $user = $users[0];
        $posts = Post::where("user_id", Auth::user()->id)->get();
        return view('home', compact('user'), compact('posts'));
    }


    public function update(Request $request, $userID)
    {

        $users = User::where("id", $userID)->get();
        $user = $users[0];
        $file = $request->file('profile');

        //Display File Name
        $destinationPath = 'images';
        $file->move($destinationPath, $file->getClientOriginalName());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->sex = $request->sex;
        $user->description = $request->education;
        $user->phone = $request->phone;
        $user->place = $request->place;
        $user->birthdate = $request->birthdate;
        $user->profile = "../images/" . $file->getClientOriginalName();
        $user->save();

        return redirect()->route('home');

    }//end of update

    public function edit($userID)
    {
        $users = User::where("id", $userID)->get();
        $user = $users[0];

        return view('user/settings', compact('user'));

    }//end of edit


    public function delete($postID)
    {
        $posts = Post::where("id", $postID)->get();
        $post = $posts[0];
        $post->delete();
        return redirect()->route('home');

    }

    public function deleteNote($noteID)
    {
        $notes = Note::where("id", $noteID)->get();
        $note = $notes[0];
        $note->delete();
        return redirect()->back();

    }


    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->comment_content;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        // $product->image = $file->getClientOriginalName();
        $comment->save();

        return redirect()->back();

    }


    public function likePost($post_id)
    {
        $post = Post::find($post_id);
        $post->likes += 1;
        $post->save();
        return redirect()->back();
    }


    public function likeComment($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->likes += 1;
        $comment->save();
        return redirect()->back();
    }


    public function news()
    {
        $following = Follower::where('follower_id', Auth::user()->id)->get();
        $ids = array();
        foreach ($following as $f) {
            $ids[] = $f->user_id;
            // echo $f->user_id;
        }

        $posts = array();
        for ($i = 0; $i < count($ids) - 1; $i++) {
//            $post = DB::table('posts')
//                ->where('user_id', $f->user_id)->get();
            $post = Post::where('user_id', $ids[$i])->get();

            $posts [] = $post[0];
        }

        $ss = User::find(Auth::user()->id)->posts;

        foreach ($ss as $s) {

            $posts [] = $s;
        }


        return view('user\news', compact('posts'));
    }


    public function storePost(Request $request)
    {

        $file = $request->file('image');
        echo 'File Name: ' . $file->getClientOriginalName();
        $destinationPath = 'images';
        $file->move($destinationPath, $file->getClientOriginalName());
        $post = new Post();
        $post->content = $request->post_content;
        $post->user_id = $request->user_id;
        $post->image = "../images/" . $file->getClientOriginalName();
        $post->save();

        return redirect()->route('news');
    }


    public function feedback()
    {
        return view('user\feedback');
    }

    public function storeFeedback(Request $request)
    {

        $feedback = new Feedback();
        $feedback->content = $request->feedback_content;
        $feedback->user_id = $request->user_id;
        $feedback->starts = $request->starts;
        $feedback->save();
        return redirect()->route('news');

    }

    public function notes()
    {
        Auth::user()->id;
        $users = User::where("id", Auth::user()->id)->get();
        $user = $users[0];
        $notes = $user->notes;
        return view('user\note', compact('notes'));
    }

    public function storeNote(Request $request)
    {

        $note = new Note();
        $note->content = $request->note_content;
        $note->user_id = $request->user_id;
        $note->save();
        return redirect()->back();

    }

    public function followers()
    {
        Auth::user()->id;
        $users = User::where("id", Auth::user()->id)->get();
        $user = $users[0];
        $followers = $user->followers;

        $ids = array();
        foreach ($followers as $f) {
            $ids[] = $f->follower_id;
            // echo $f->user_id;
        }

        $us = array();
        for ($i = 0; $i < count($ids); $i++) {
            $user1 = User::where('id', $ids[$i])->get();

            $us [] = $user1[0];
        }

        // dd($user->followers);
        // echo  $followers->id;
        return view('user\followers', compact('us'));
    }

    public function following()
    {
        Auth::user()->id;
        $users = User::where("id", Auth::user()->id)->get();
        $user = $users[0];

        $following = Follower::where('follower_id', $user->id)->get();

        $ids = array();
        foreach ($following as $f) {
            $ids[] = $f->user_id;
            // echo $f->user_id;
        }

        $us = array();
        for ($i = 0; $i < count($ids); $i++) {
            $user1 = User::where('id', $ids[$i])->get();

            $us [] = $user1[0];
        }

        // dd($user->followers);
        // echo  $followers->id;
        return view('user\followers', compact('us'));
    }


    public function search(Request $request)
    {

        $user_name = $request->name;
        $users = User::where('name', 'like', $user_name . '%')->get();
        return view('user\search', compact('users'));
    }
}
