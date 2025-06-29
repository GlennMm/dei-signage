
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #00796b;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #00796b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">Name:</div>
                <div>{{ $submission->name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div>{{ $submission->email }}</div>
            </div>
            
            @if($submission->phone)
            <div class="field">
                <div class="label">Phone:</div>
                <div>{{ $submission->phone }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">Subject:</div>
                <div>{{ $submission->subject }}</div>
            </div>
            
            @if($submission->service_interest)
            <div class="field">
                <div class="label">Service Interest:</div>
                <div>{{ $submission->service_interest }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">Message:</div>
                <div>{{ nl2br(e($submission->message)) }}</div>
            </div>
            
            <div class="field">
                <div class="label">Submitted:</div>
                <div>{{ $submission->created_at->format('F j, Y \a\t g:i A') }}</div>
            </div>
        </div>
    </div>
</body>
</html>