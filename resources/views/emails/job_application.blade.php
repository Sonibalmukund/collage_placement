<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application</title>
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
            <h1>New Job Application</h1>
        </div>
        <div class="content">
            <p><strong>Student Name:</strong> <span class="highlight">{{ $studentName }}</span></p>
            <p><strong>Job Title:</strong> <span class="highlight">{{ $jobTitle }}</span></p>
            <p><strong>Resume:</strong> <span class="highlight">{{ $resumeName }}</span></p>
            <div class="divider"></div>
            <p>Congratulations on your application!</p>
        </div>
        <div class="footer">
            <p>Thank you for applying, and we wish you the best of luck!</p>
            <p>{{ $companyname }}</p>
        </div>
    </div>
</body>
</html>

