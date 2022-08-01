<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>


<form id=register method="post" action="{{route('register-user')}}">
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
            <tr><td id=title_signup class=title colspan=100% >REGISTER</td></tr>
        </div>

        <tr><td><br></td></tr>

        <div id=area_fname>
            <tr>
                <td class=label id=label_fname>first name</td>
                <td><input id=input_fname type="text" name="fname" value=""></td>
            </tr>
            <tr><td>
                <span style="color:red">@error('fname'){{$message}} @enderror</span>
            </td></tr>
        </div>
        <div id=area_lname>
            <tr>
                <td class=label id=label_lname>last name</td>
                <td><input id=input_lname type="text" name="lname" value=""></td>
            </tr>
            <tr><td>
                <span style="color:red">@error('lname') {{$message}} @enderror</span>
            </td></tr>
        </div>
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
                <td><a href="login">have an account? LOGIN</td>
                <td><button id=button_register >REGISTER</button></td>
            </tr>
        </div>
    </table>
</form>



    
</body>
</html>