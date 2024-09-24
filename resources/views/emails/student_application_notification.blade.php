<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
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
            <h1>Application Submitted</h1>
        </div>
        <div class="content">
            <p>Dear <span class="highlight">{{ $studentName }}</span>,</p>
            <p>Thank you for applying for the job position of <strong class="highlight">{{ $jobTitle }}</strong>.</p>
            <p>Your resume <strong class="highlight">{{ $resumeName }}</strong> has been received and is currently under review.</p>
            <p>We will get back to you soon. Congratulations on taking this important step in your career!</p>
        </div>
        <div class="footer">
            <p>Thank you for your interest!</p>
            <p>{{ $companyname }}</p>
        </div>
    </div>
</body>
</html>
