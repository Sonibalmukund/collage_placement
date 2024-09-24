<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Status: Rejected</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        .header {
            color: rgba(255, 0, 0, 0.555); /* Change the color to red */
            padding: 10px;
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h5 style="color: red;">Application Status: Rejected</h5> <!-- Changed to h5 -->
        </div>
        <div class="content">
            <h2>Dear {{ $studentName }},</h2>
            <p>We regret to inform you that your application for the position of <strong>{{ $jobTitle }}</strong> has been rejected.</p>
            <p>We appreciate the time you took to apply and your interest in our company.</p>
            <p>Don't be discouraged; we encourage you to apply for future openings that match your skills and experience.</p>
            <p>Thank you, and we wish you the best of luck in your job search!</p>
        </div>
        <div class="footer">
            <p>Best Regards,</p>
            <p>{{ $companyname }}</p>
        </div>
    </div>
</body>
</html>
