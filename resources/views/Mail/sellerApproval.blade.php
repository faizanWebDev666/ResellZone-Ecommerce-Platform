<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <p>{!! nl2br(e($details['message'])) !!}</p>
</body>
</html>
