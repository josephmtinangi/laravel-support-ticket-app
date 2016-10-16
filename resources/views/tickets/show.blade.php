@extends('layouts.app')

@section('title', $ticket->title)

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"># {{ $ticket->ticket_id }}</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<tbody>
							<tr>
								<th>Title</th>
								<td>{{ $ticket->title }}</td>
							</tr>
							<tr>
								<th>Category</th>
								<td>{{ $ticket->category->name }}</td>
							</tr>
							<tr>
								<th>Status</th>
								<td>{{ $ticket->status }}</td>
							</tr>
							<tr>
								<th>Created</th>
								<td>{{ $ticket->created_at->diffForHumans() }}</td>
							</tr>
							<tr>
								<th colspan="2">Message</th>
							</tr>
							<tr>
								<td colspan="2">
									{{ $ticket->message }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Comments</h3>
			</div>
			<div class="panel-body">

				<div class="comments">
					@if($ticket->comments->count() > 0)
						@foreach($ticket->comments as $comment)
							<div class="panel panel-{{ $ticket->user->id == $comment->user_id ? 'default' : 'success' }}">
								<div class="panel-heading">
									{{ $comment->user->name }}
									<span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
								</div>
								<div class="panel-body">
									<blockquote>
										{{ $comment->comment }}
									</blockquote>
								</div>
							</div>
						@endforeach
					@else
						@if($ticket->status == 'Open')
							<strong>Be the first to comment.</strong>
							<hr>
						@endif
					@endif
				</div>

				@if($ticket->status == 'Open')
				<div class="comment-form">
					@include('includes.flash')

					<form action="{{ url('comment') }}" method="POST">
						{!! csrf_field() !!}
						<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
						<div class="form-group{{ $errors->has('comment') ? 'has-error' : '' }}">
							<textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Write"></textarea>
							@if($errors->has('comment'))
								<span class="help-block">
									<strong>{{ $errors->first('comment') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>					
				</div>
				@else
					<strong>This ticket has been closed.</strong>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection