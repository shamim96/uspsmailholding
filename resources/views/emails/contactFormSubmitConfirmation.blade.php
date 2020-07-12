<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <table style="width: 100%">
        <tr>
            <td>
                <p> Dear {{$body['name']}} , </p>

                <p> Thank you for reaching us. An agent will reply to your concerns within 24 hours.</p>



                <p>  Thank you for using USPS Mail Holding. <br/>

                    USPS Mail Holding Team </p>


             <p style="margin-top: 50px"> <small>This is an automated email please do not reply to this message. This message is for the designated recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please delete. Any other use of the email by you is prohibited.</small> </p>
            </td>
        </tr>
    </table>
</body>
</html>
