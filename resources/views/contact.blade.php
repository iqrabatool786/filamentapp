<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('contact.send') }}">
    @csrf
    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" required>{{ old('message') }}</textarea><br><br>

    <button type="submit">Send</button>
</form>
</body>
</html>
