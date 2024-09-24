<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header h1 {
            color: #333;
        }
        .content {
            margin-top: 20px;
            line-height: 1.6;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }
        .highlight {
            color: #007bff; /* Bootstrap primary color */
            font-weight: bold;
        }
        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contact Form Submission</h1>
        </div>
        <div class="content">
            <p><strong>Name:</strong> <span class="highlight">{{ $data['name'] }}</span></p>
            <p><strong>Email:</strong> <span class="highlight">{{ $data['email'] }}</span></p>
            <p><strong>Subject:</strong> <span class="highlight">{{ $data['subject'] }}</span></p>
            <p><strong>Message:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
        <div class="footer">
            <p>Thank you for your inquiry!</p>
            <p>Your Company Name</p>
        </div>
    </div>
</body>
</html>
