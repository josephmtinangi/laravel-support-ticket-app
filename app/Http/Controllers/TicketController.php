<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Ticket;

use Auth;

use Mail;

use App\User;

use App\Mail\TicketCreated;

class TicketController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function create(){
    	$categories = Category::all();
    	return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {

    	$this->validate($request, [
    		'title'		=>	'required',
    		'category'	=>	'required',
    		'priority'	=>	'required',
    		'message'	=>	'required'
    	]);

    	$ticket = new Ticket([
    		'title'		=> $request->input('title'),
    		'user_id'	=> Auth::user()->id,
    		'ticket_id'	=> strtoupper(str_random(10)),
    		'category_id' => $request->input('category'),
    		'priority'		=> $request->input('priority'),
    		'message'	=>	$request->input('message'),
    		'status'	=> 'Open',
    	]);
    	$ticket->save();

        $email = new TicketCreated(Auth::user(), $ticket);

        Mail::to(Auth::user()->email)->send($email);

    	return redirect()->back()->with('status', 'A ticket with ID: #'. $ticket->ticket_id .' has been opened.');
    }
}
