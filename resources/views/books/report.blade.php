<!DOCTYPE html>
<html>
<head>
    <title>Book report email</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>

<h5>Submitted by: {{ $details['user_name'] }} . Email: {{ $details['user_email'] }}</h5>
<p>Complaint: {{ $details['complaint'] }}</p>


<p>Thanks</p>
</body>
</html>
