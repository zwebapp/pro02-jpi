<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>An Order was received in your Application</h2>

		<div>
			<p> Client: {{ 6 == $order->client->lookup_user_type ? $order->client->firstname . ' ' . $order->client->lastname : $order->client->company_name  }}</p>
			<p> Please see the application for complete info. </p>			
		</div>
	</body>
</html>