<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <a href="{{ $mailData['url'] }}" class="btn btn-primary justify-content-center">Detail</a>
</body>

</html>
