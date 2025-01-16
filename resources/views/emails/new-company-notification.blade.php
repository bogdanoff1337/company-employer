<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Company Notification</title>
</head>
<body>
<h1>New Company Added</h1>
<p>A new company has been added:</p>
<ul>
    <li>Name: {{ $companyName }}</li>
        @if($companyEmail)
            <li>Email: {{ $companyEmail }}</li>
       @endif
</ul>
</body>
</html>
