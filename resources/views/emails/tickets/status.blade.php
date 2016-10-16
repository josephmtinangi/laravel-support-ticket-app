<!DOCTYPE html>
<html>
<head>
	<title>Ticket Status</title>
</head>
<body>
	<p>
		Hello
	</p>
	<p>
		Your support ticket with ID #{{ $ticket->ticket_id }} has been marked as resolved and closed.
	</p>
	<p>
		You can view the ticket at any time at <a href="{{ url('tickets/' . $ticket->id) }}">here</a>.
	</p>
	<p>
		<strong>Thank you.</strong>
	</p>	
</body>
</html>