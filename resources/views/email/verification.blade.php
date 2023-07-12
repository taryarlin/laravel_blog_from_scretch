<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table align="center" width="100%">
        <tr>
            <td>
                <p style="font-weight: bold;">Dear {{ $user->acsr_full_name }}</p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Please click on the verification to continue your registration.</p>
            </td>
        </tr>

        <tr>
            <td>
                <a href="{{ $verification_link }}">Click To Verify</a>
            </td>
        </tr>

        <tr>
            <td>
                <p>Thank you for using our application!</p>
            </td>
        </tr>

        <tr>
            <td></td>
        </tr>

        <tr>
            <td>
                <p>Best Regards,</p>
                <p>Blog Site</p>
            </td>
        </tr>

        <tr>
            <td>
                <em>This is a computer auto generated email and please do not reply.</em>
            </td>
        </tr>
    </table>
</body>
</html>
