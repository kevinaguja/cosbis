<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <base href="cosbis.dev">
</head>
<body>
<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
</style>

<table class="wrapper" width="100%" cellpadding="30" cellspacing="0">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0">
                {{ $header or '' }}
                <div class="custom-header" style="text-align: left">
                    <div>
                        <div>
                            <img src="{{asset('img/cosbis/cosbr-logo.png')}}" class="logo" style="float:left">
                            <div style="display: inline;">
                                <h1 style="text-align: left; padding-top: 10px; margin-bottom: 0px; display: inline">
                                    <br>College Of San Benildo-Rizal
                                    <br></h1>
                                <h6 style="text-align: left; padding-top: 0px; margin-top: 0px; display:inline">Sumulong
                                    Highway, Brgy. Sta. Cruz, Antipolo City, Rizal 1870 <br>
                                    +(632) 660-8107 / 584-6382 </h6>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="left" width="100%" cellpadding="0" cellspacing="0">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    {{ Illuminate\Mail\Markdown::parse($slot) }}

                                    {{ $subcopy or '' }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{ $footer or '' }}
            </table>
        </td>
    </tr>
</table>
</body>
</html>
