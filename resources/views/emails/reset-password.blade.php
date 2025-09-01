<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body style="background-color: #fff0f0; font-family: 'Lora', serif; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 15px; padding: 40px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <h2 style="color: #db9289; font-size: 24px;">Hello {{ $name }},</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 30px; color: #555;">
                            <p style="font-size: 16px;">
                                We received a request to reset your password for your Élan account. Click the button below to reset it.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 30px;">
                            <a href="{{ $resetUrl }}" 
                               style="display: inline-block; background-color: #ffbdbd; color: #fff; padding: 12px 30px; border-radius: 10px; text-decoration: none; font-weight: bold; font-size: 16px;">
                               Reset Password
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #555; font-size: 14px;">
                            <p>If you did not request a password reset, no further action is required.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px; color: #db9289; font-weight: bold;">
                            Thank you,<br>Élan Team
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
