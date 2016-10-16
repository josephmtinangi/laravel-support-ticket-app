<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

use Auth;

use Mail;

use App\Mail\SendTicketComments;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
    	$this->validate($request, [
    		'comment' => 'required'
    	]);

    	$comment = Comment::create([
    		'ticket_id'	=>	$request->input('ticket_id'),
    		'user_id'	=> Auth::user()->id,
    		'comment' 	=> $request->input('comment'),
    	]);

    	if($comment->ticket->user->id !== Auth::user()->id) {
    		$email = new SendTicketComments($comment->ticket->user, $comment->ticket, $comment);
    		Mail::to($comment->ticket->user->email)->send($email);
    	}

    	return redirect()->back()->with('status', 'Your comment has been submitted.');
    }
}
