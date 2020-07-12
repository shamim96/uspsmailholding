<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order cancelled</title>
</head>
<body>
    <table style="width: 100%">
        <tr>
            <td>
                <p> Dear {{$body['firstName']}} , </p>

                <p> Your request to cancel your mail hold with order ID  <span style="font-weight: bold">{{$body['id']}}</span> has been completed. </p>

             <p>  If you have any issues or questions please contact support at support@uspsmailholding.com</p>

                <p> Thank you for using the USPS Mail Holding.<br/>

                    USPS Mail Holding Team </p>


             <p style="margin-top: 50px"> <small> This is an automated email please do not reply to this message. This message is for the designated recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please delete. Any other use of the email by you is prohibited. </small> </p>
            </td>
        </tr>
    </table>
</body>
</html>
