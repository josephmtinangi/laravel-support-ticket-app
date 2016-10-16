<!DOCTYPE html>
<html>
<head>
	<title>Support Ticket Information</title>
</head>
<body>
<div class="container">
	<h2>Ticket Created</h2>
	<p>
		Thank you {{ $user->name }} for contacting out support team. A support ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below.
	</p>
	<p>
		<strong>Title</strong>: {{ $ticket->title }}
	</p>
	<p>
		<strong>Priority:</strong> {{ $ticket->priority }}
	</p>
	<p>
		<strong>Status</strong>: {{ $ticket->status }}
	</p>
	<p>
		You can view the ticket at any time at <a href="{{ url('tickets/' . $ticket->id) }}">here</a>.
	</p>
	<p>
		<strong>Thank you.</strong>
	</p>
</div>
</body>
</html>