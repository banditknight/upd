<div align="center" width="100%" style="display:block;margin:auto;padding:0;max-width:100%" bgcolor="#f2f2f2">


    <div align="center" style="padding:32px 10px 32px 10px;background-color:#f2f2f2">


        <table align="center" role="presentation" border="0" cellpadding="0" width="640" cellspacing="0" style="margin:0 auto;max-width:640px;border:1px solid #c8c8c8;border-radius:8px;overflow:hidden;background-color:#ffffff;background:#ffffff">


            <colgroup>

                <col width="640">

            </colgroup>
            <tbody>
                <tr>
                    <td colspan="3" align="center" style="padding-top:32px;padding-right:32px;padding-left:32px;background:#ffffff;border-top:8px solid #01902d">
                        <img width="40" height="auto" style="display:block" alt="On This Day Icon" src="{{ getenv('FE_URL') }}/assets/img/logo.png" data-image-whitelisted="" class="CToWUd">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="padding-top:16px;padding-right:32px;padding-left:32px;background:#ffffff">
                        <p style="color:#323130;font-size:24px;font-weight:600;line-height:28.13px;margin:0;max-width:400px;padding:0;text-align:center">{{ env('APP_NAME') }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" style="padding-top:7px;padding-right:32px;padding-bottom:0px;padding-left:32px;background:#ffffff">
                        <p style="color:#323130;font-size:16px;font-weight:400;line-height:18px;margin:0;max-width:400px;padding-bottom:29px;text-align:center">Vendor Registration</p>
                    </td>
                    <td align="center" width="640" height="29" style="background-color:#ffffff">
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="background-color:#ffffff;border-top:1px solid #dedede;padding:29px 20px 28px" align="center">
                        <p style="font-size:16px;line-height:20px;color:#323130;font-weight:400;margin:0px;padding:0px;text-align:center;max-width:560px">
                            Hi <b>{{ $vendor->name }}</b>,<br/><br/>Thank you for registering as vendor.<br/>
                            Your account will be checked by Admin, Once registration approved we will send the account username and password by email.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" align="center" style="background-color:#ffffff">


                        <table role="presentation" align="center" border="0" cellpadding="0" width="640" cellspacing="0" style="border-bottom:1px solid #c8c8c8;border-radius:8px;margin:0 auto;max-width:640px;overflow:hidden;background-color:#ffffff;background:#ffffff">
                            <tbody>
                                <tr>
                                    <td align="left" valign="top" width="640" style="background-color:#eaeaea">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="background-color:#f8f8f8;width:650px">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="640">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" align="center" style="padding-top:26px;padding-right:32px;padding-left:32px;background:#f8f8f8">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="padding-right:32px;padding-top:4px;padding-left:32px;padding-bottom:15px;background:#f8f8f8">
                                                        <p style="color:#000000;font-size:16px;font-weight:400;line-height:22px;margin:0;max-width:400px;padding:0px;text-align:center">Menara Imperium 10th Floor</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="center" style="border-bottom:1px solid #dedede;padding-bottom:25px;padding-right:32px;padding-left:32px;background:#f8f8f8">
                                                        <p style="color:#323130;font-size:16px;font-weight:300;line-height:22px;margin:0;max-width:400px;padding:0;text-align:center">Metropolitan Kuningan Superblock<br/>Jl. H.R Rasuna Said kav.1 Jakarta Selatan 12980.<br/>+62-21 8354081, +62-21 8354106</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <img src="{{ getenv('APP_URL') }}/mailtracking/view?em={{ base64_encode('test') }}" aria-hidden="true" role="presentation" height="1" width="1" class="CToWUd">
</div>