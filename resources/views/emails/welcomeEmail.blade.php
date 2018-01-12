@component('mail::message')

#Hi {{ucwords(strtolower($user->firstname.' '.$user->lastname))}}!

Thank you for registering your account the Cosbis SC Event Management System.
Just a quick tour to our profile, we are an alternative solution to the
new dissemination system of the student council system. Basically, what we do
is provide an online alternative for the student council, and the student body
to communicate.

Listed below are the details of your account. If you find any errant in your
details, feel free to ask the OSA to correct it for you, or you can do it at
the account management page.

###Details
**Last Name:** {{ucwords(strtolower($user->firstname))}}

**First Name:** {{ucwords(strtolower($user->lastname))}}

**Email:** {{$user->email}}

**Phone Number:** {{$user->phone}}

Once Again we would like to welcome you to our Cosbis family. Lastly, in order
for us to verify your identity and to preserve confidentiality of information
to the school, please click the button below.

    @component('mail::button', ['url' => 'http://csbr.localhost.com/verify/'.$user->token])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
