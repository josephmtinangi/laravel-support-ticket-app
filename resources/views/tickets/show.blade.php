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
				<form>
					<div class="form-group">
						<textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Write"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection