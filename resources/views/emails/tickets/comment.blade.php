<!DOCTYPE html>
<html>
<head>
	<title>Support Ticket</title>
</head>
<body>
<p>
	{{ $comment->comment }}
</p>
---
<p>
	<strong>Replied by</strong>: {{ $user->name }}
</p>
<p>
	<strong>Title</strong>: {{ $ticket->title }}
</p>
<p>
	<strong>Ticket ID</strong>: {{ $ticket->ticket_id }}
</p>
	<p>
		You can view the ticket at any time at <a href="{{ url('tickets/' . $ticket->id) }}">here</a>.
	</p>
	<p>
		<strong>Thank you.</strong>
	</p>
</body>
</html>