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

use App\Mail\SendTicketStatusNotification;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function closeTicket(Request $request)
    {
        $ticket = Ticket::findOrFail($request->input('ticket'));
        $ticket->status = 'Closed';
        $ticket->save();

        $email = new SendTicketStatusNotification($ticket->user, $ticket);
        Mail::to($ticket->user->email)->send($email);

        return redirect()->back()->with('status', 'The ticket has been closed.');
    }

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

    	return redirect('my-tickets')->with('status', 'A ticket with ID: #'. $ticket->ticket_id .' has been opened.');
    }

    public function userTicket()
    {
        $tickets = Ticket::whereUserId(Auth::user()->id)->with('category')->paginate(10);
        return view('tickets.user', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::whereId($id)->with('category')->with('comments')->first();
        return view('tickets.show', compact('ticket'));
    }
}
