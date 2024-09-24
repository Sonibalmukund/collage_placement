<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        strong {
            color: #333;
        }

        .details {
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
        }

        .details:last-child {
            border-bottom: none;
        }

        .company-logo {
            display: block;
            margin: 20px 0;
            text-align: center;
        }

        .company-logo img {
            max-width: 150px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Interview Details</h1>

        <div class="details">
            <p><strong>Job Title:</strong> {{ $job->title }}</p>
            <p><strong>Student Name:</strong> {{ $student->full_name }}</p>
            <p><strong>Company:</strong> {{ $job->company->name }}</p>
            <p><strong>Interview Date:</strong> {{ $interviewDate }}</p>
        </div>

        <!-- Display Company Logo -->
        <div class="company-logo">
            <img src="{{ $companyLogoUrl }}" alt="Company Logo">
        </div>

        <!-- Add any other interview-related details here -->
    </div>
</body>
</html>
