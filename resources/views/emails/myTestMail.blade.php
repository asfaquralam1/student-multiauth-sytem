Hello {{$email_data['name']}}
<br><br>
Welcome to my Website!
<br>
Please enter the code to verify your email and activate your account!
<br><br>
<p>{{$email_data['verification_code']}}</p>
{{-- <a href="http://localhost/multi-auth/public/verify?code={{$email_data['verification_code']}}">Click Here!</a> --}}
{{-- <a href="http://multiauth.test/verify?code={{$email_data['verification_code']}}">Click Here!</a> --}}
<br><br>
Thank you!
<br>
