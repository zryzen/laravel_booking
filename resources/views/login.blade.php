<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>



<form id=login action="{{route('login-user')}}" method="post">
@csrf
@if(Session::has('success'))
    <div>
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div style="color:red">
        {{Session::get('fail')}}
    </div>
@endif
    <table border=0px cellspacing=0 cellpadding=0
    style="
    width:50%;
    margin:auto;
    text-align:center;
    border-collapse:collapse;">
        <div id=area_title>
            <tr><td id=title_signup class=title colspan=100% >LOGIN</td></tr>
        </div>

        <tr><td><br></td></tr>

        <div id=area_email>
            <tr>
                <td class=label id=label_email>email</td>
                <td><input id=input_email type="text" name="email" value=""></td>
            </tr>
            <tr><td>
                <span style="color:red">@error('email'){{$message}} @enderror</span>
            </td></tr>
        </div>
        <div id=area_password>
            <tr>
                <td class=label id=label_password>password</td>
                <td><input id=input_password type="text" name="pass" value=""></td>
            </tr>
            <tr><td>
                <span style="color:red">@error('pass'){{$message}} @enderror</span>
            </td></tr>
        </div>

        <tr><td><br></td></tr>

        <div id=area_buttons>
            <tr>
                <td><a href="register">don't have an account? REGISTER</td>
                <td><button id=button_login >LOGIN</button></td>
            </tr>
        </div>
    </table>
</form>









    
</body>
</html>