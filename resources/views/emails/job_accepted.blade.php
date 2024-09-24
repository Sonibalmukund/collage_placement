<!DOCTYPE html>
<html>
<head>
    <title>Job Accepted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            color: #28a745;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            color: #333333;
        }
        .success-message {
            font-size: 18px;
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Company Logo -->
        <div class="logo">
            <img src="{{ $companyLogoUrl }}" alt="Company Logo" style="width: 150px; height: auto;">
        </div>

        <!-- Success Message -->
        <h1>Congratulations, {{ $studentName }}!</h1>
        <div class="success-message">
            You have successfully passed the next round for the job <strong>{{ $jobTitle }}</strong>.
        </div>

        <!-- Interview Information -->
        <p>Your interview is scheduled for <strong>{{ $interviewDate }}</strong>.</p>
        <p>Best of luck!</p>

        <!-- Button (optional) -->
        <a href="{{ $interviewDetailsUrl }}" class="button">View Interview Details</a>
    </div>
</body>
</html>
