@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Tickets</h3>
				</div>
				<div class="panel-body">
					@if($tickets->count() > 0)

						@include('includes.flash')

						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>SN</th>
										<th>Title</th>
										<th>Category</th>
										<th>Priority</th>
										<th>Status</th>
										<th>Created</th>
										<th>Last Update</th>
										<th class="text-center" colspan="2"><i class="fa fa-cog"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									@foreach($tickets as $ticket)
										<tr>
											<td>{{ $i++ }}</td>
											<td><a href="{{ url('tickets/' . $ticket->id) }}">{{ $ticket->title }}</a></td>
											<td>{{ $ticket->category->name }}</td>
											<td>{{ $ticket->priority }}</td>
											<td>
												@if( $ticket->status == 'Open')
													<span class="label label-info">{{ $ticket->status }}</span>
												@else
													<span class="label label-success">{{ $ticket->status }}</span>
												@endif
											</td>
											<td>{{ $ticket->created_at->diffForHumans() }}</td>
											<td>{{ $ticket->updated_at->diffForHumans() }}</td>
											<td>
												@unless($ticket->status == 'Closed')
													<a href="{{ url('tickets/' . $ticket->id) }}">Comment</a>
												@endunless
											</td>
											<td>
												@if($ticket->status == 'Open')
													<form action="{{ url('close-ticket') }}" method="POST">
														{!! csrf_field() !!}
														<input type="hidden" name="ticket" value="{{ $ticket->id }}">
														<button type="submit" class="btn btn-success">Close</button>
													</form>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@else
						<div class="alert alert-info text-center"><strong>There are currently no tickets.</strong></div>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection
