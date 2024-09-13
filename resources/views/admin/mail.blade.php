<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            border-bottom: 1px solid #dddddd;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .email-header h1 {
            color: #333333;
            font-size: 24px;
            margin: 0;
        }

        .email-body {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }

        .email-body p {
            margin: 10px 0;
        }

        .otp-card {
            margin-top: 20px;
            padding: 20px;
            background-color: #f7f9fc;
            border-left: 4px solid #0044cc;
            border-radius: 6px;
            text-align: center;
        }

        .otp-card p {
            font-size: 18px;
            color: #333333;
            margin: 0;
        }

        .otp {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0044cc;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            border-radius: 4px;
            margin-top: 10px;
        }

        .email-footer {
            text-align: center;
            margin-top: 30px;
            color: #888888;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="email-header">
            <h1>V.M Agri Exim</h1>
        </div>

        <div class="email-body">
            <p>Dear Admin,Password Change Otp</p>
            <div class="otp-card">
                <p>Your OTP is:</p>
                <div class="otp">{{ $otp }}</div>
            </div>
            <p>This OTP will expire in 10 minutes.</p>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} VM Agri Exim. All rights reserved.</p>
        </div>
    </div>

</body>

</html>