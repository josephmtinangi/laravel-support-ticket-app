<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class TicketController extends Controller
{
    public function create(){
    	$categories = Category::all();
    	return view('tickets.create', compact('categories'));
    }
}
