@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">My Tickets</h3>
			</div>
			<div class="panel-body">
				@if($tickets->count() > 0)
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>SN</th>
									<th>Title</th>
									<th>Category</th>
									<th>Priority</th>
									<th>Status</th>
									<th>Created</th>
									<th>Last Update</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@foreach($tickets as $ticket)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $ticket->title }}</td>
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
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				@else
					<div class="alert alert-info text-center">
						<strong>You have not created any ticket yet.</strong>
						<a href="{{ url('new-ticket') }}" class="btn btn-danger">Create One</a>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection