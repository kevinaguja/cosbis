@component('mail::message')

#Verify Your Email Address!

To verify your email address, visit the following link:

@component('mail::button', ['url' => 'http://cosbis.dev/verify/'.$user->token])
Verify Yor Account!
@endcomponent

If you did not request this verification, please ignore this email. If you feel that something is wrong (eg. this email is a spam), please contact us
at <a href="http://cosbis.dev/verify/{{$user->token}}">College of San Benildo-Rizal</a>

@endcomponent
