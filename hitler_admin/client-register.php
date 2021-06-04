<?php
include "session.php";
include "db.php";

if(isset($_POST['submit'])){

 // $qry_email = "SELECT * FROM bcp_client where email = '" . $_POST["email"] . "'";
  // $result  = mysqli_query($conn, $qry_email);
 // $rowcount = mysqli_num_rows($result);
 // if($rowcount==0) {

  $fname = $_POST['fname'];
    $lname = $_POST['lname'];  
      $fathername = $_POST['fathername'];
        $bdate = $_POST['bdate'];
          $acc = $_POST['acc'];
            $accname = $_POST['accname'];
              $ifsc = $_POST['ifsc'];  //aa
                $email = $_POST['email'];
                  $phone = $_POST['phone'];  
                    $pan = $_POST['pan'];
                      $adhar = $_POST['adhar'];
                        $bank = $_POST['bank'];
                          $address = $_POST['address'];     
                             $pwd = uniqid();
                                $photo = $_FILES['photo']['name'];
                                   $sign = $_FILES['sign']['name'];

      $str = '29250'.substr($fname,0,1);    
$result = mysqli_query($conn,"SELECT MAX(client_id) AS max_page FROM bcp_client Where client_id LIKE '$str%'");
$row7 = mysqli_fetch_array($result);
$largestid = $row7["max_page"];
if (empty($largestid)) {
       
  $form_no = 1;
    $unique_id = str_pad($form_no, 5, "0", STR_PAD_LEFT);  //00002
      $largestid= '29250'.substr($fname,0,1).$unique_id;
}else{
   $largestid++;
}
 

    $new_str = str_replace(' ', '-', $fname);
  $ext = "-photo-".rand(1000, 9999).".".pathinfo($photo, PATHINFO_EXTENSION); 
    $photo_name= "$new_str$ext";
    $tmp_photo =  $_FILES['photo']['tmp_name'];
    $photo_path ='upload/client-photo/';
    
    $new_sign = str_replace(' ', '-', $fname);
    $extention = "-sign-".rand(1000, 9999).".".pathinfo($sign, PATHINFO_EXTENSION); 
    $sign_name= "$new_sign$extention";
    $tmp_sign =  $_FILES['sign']['tmp_name'];
    $sign_path ='upload/client-sign/';



 $query = "INSERT INTO `bcp_client`(`client_id`, `pwd`, `fname`, `lname`, `fathername`, `bdate`, `acc`, `accname`, `ifsc`, `email`, `phone`, `pan`, `adhar`, `bank`, `address`, `photo`, `sign`) VALUES ('$largestid', '$pwd', '$fname', '$lname', '$fathername', '$bdate', '$acc', '$accname', '$ifsc', '$email', '$phone', '$pan', '$adhar', '$bank', '$address','$photo_name', '$sign_name')";
 $exec= mysqli_query($conn,$query);
  if ($exec) {
  
     // Upload file
     move_uploaded_file($tmp_photo, $photo_path.$photo_name);
     move_uploaded_file($tmp_sign, $sign_path.$sign_name);
      $add_by=$_SESSION['name'];
  $monthly="INSERT INTO `bcp_monthly_update`(`client_id`,`add_by`) VALUES ('$largestid','$add_by')";
    $exec2= mysqli_query($conn,$monthly);
    if($exec2)
    {

    $actual_link = "https://www.blackcrescentpartners.in/login.php";
      $toEmail = $email;
      $subject = "User Registration Activation Email";
    
$content = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width">
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <title></title>
  <!--[if !mso]><!-->
  <!--<![endif]-->
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
    }

    table,
    td,
    tr {
      vertical-align: top;
      border-collapse: collapse;
    }

    * {
      line-height: inherit;
    }

    a[x-apple-data-detectors=true] {
      color: inherit !important;
      text-decoration: none !important;
    }
  </style>
  <style type="text/css" id="media-query">
    @media (max-width: 740px) {

      .block-grid,
      .col {
        min-width: 320px !important;
        max-width: 100% !important;
        display: block !important;
      }

      .block-grid {
        width: 100% !important;
      }

      .col {
        width: 100% !important;
      }

      .col_cont {
        margin: 0 auto;
      }

      img.fullwidth,
      img.fullwidthOnMobile {
        max-width: 100% !important;
      }

      .no-stack .col {
        min-width: 0 !important;
        display: table-cell !important;
      }

      .no-stack.two-up .col {
        width: 50% !important;
      }

      .no-stack .col.num2 {
        width: 16.6% !important;
      }

      .no-stack .col.num3 {
        width: 25% !important;
      }

      .no-stack .col.num4 {
        width: 33% !important;
      }

      .no-stack .col.num5 {
        width: 41.6% !important;
      }

      .no-stack .col.num6 {
        width: 50% !important;
      }

      .no-stack .col.num7 {
        width: 58.3% !important;
      }

      .no-stack .col.num8 {
        width: 66.6% !important;
      }

      .no-stack .col.num9 {
        width: 75% !important;
      }

      .no-stack .col.num10 {
        width: 83.3% !important;
      }

      .video-block {
        max-width: none !important;
      }

      .mobile_hide {
        min-height: 0px;
        max-height: 0px;
        max-width: 0px;
        display: none;
        overflow: hidden;
        font-size: 0px;
      }

      .desktop_hide {
        display: block !important;
        max-height: none !important;
      }
    }
  </style>
  <style type="text/css" id="menu-media-query">
    @media (max-width: 740px) {
      .menu-checkbox[type="checkbox"]~.menu-links {
        display: none !important;
        padding: 5px 0;
      }

      .menu-checkbox[type="checkbox"]~.menu-links span.sep {
        display: none;
      }

      .menu-checkbox[type="checkbox"]:checked~.menu-links,
      .menu-checkbox[type="checkbox"]~.menu-trigger {
        display: block !important;
        max-width: none !important;
        max-height: none !important;
        font-size: inherit !important;
      }

      .menu-checkbox[type="checkbox"]~.menu-links>a,
      .menu-checkbox[type="checkbox"]~.menu-links>span.label {
        display: block !important;
        text-align: center;
      }

      .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
        display: block !important;
      }

      .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
        display: none !important;
      }

      #menu2r68ze~div label {
        border-radius: 50% !important;
      }

      #menu2r68ze:checked~.menu-links {
        background-color: #00d09c !important;
      }

      #menu2r68ze:checked~.menu-links a {
        color: #ffffff !important;
      }

      #menu2r68ze:checked~.menu-links span {
        color: #ffffff !important;
      }
    }
  </style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #ffffff;">
  <!--[if IE]><div class="ie-browser"><![endif]-->
  <table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#ffffff" valign="top">
    <tbody>
      <tr style="vertical-align: top;" valign="top">
        <td style="word-break: break-word; vertical-align: top;" valign="top">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#ffffff"><![endif]-->
          <div style="background-color:transparent;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" align="center" role="presentation" height="5" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="5" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:transparent;">
            <div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="img-container left fixedwidth" align="left" style="padding-right: 0px;padding-left: 25px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 25px;" align="left"><![endif]-->
                        <div style="font-size:1px;line-height:10px">&nbsp;</div><img class="left fixedwidth" border="0" src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/619363_601234/bcp%28jpeg%29.jpg" alt="Alternate text" title="Alternate text" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 234px; display: block;" width="234">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
                        <tr style="vertical-align: top;" valign="top">
                          <td style="word-break: break-word; vertical-align: top; padding-top: 0px; padding-bottom: 0px; padding-left: 0px; padding-right: 20px; text-align: right; font-size: 0px;" align="right" valign="top">
                            <!--[if !mso><!--> <input class="menu-checkbox" id="menu2r68ze" type="checkbox" style="display:none !important;max-height:0;visibility:hidden;">
                            <!--<![endif]-->
                            <div class="menu-trigger" style="display:none;max-height:0px;max-width:0px;font-size:0px;overflow:hidden;"> <label class="menu-label" for="menu2r68ze" style="height:36px;width:36px;display:inline-block;cursor:pointer;mso-hide:all;user-select:none;align:right;text-align:center;color:#ffffff;text-decoration:none;background-color:#00d09c;"><span class="menu-open" style="mso-hide:all;font-size:26px;line-height:36px;">☰</span><span class="menu-close" style="display:none;mso-hide:all;font-size:26px;line-height:36px;">✕</span></label></div>
                            <div class="menu-links">
                              <!--[if mso]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td style="padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:15px">
<![endif]--><a href="https://blackcrescentpartners.in/login.php" style="padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:20px;display:inline;color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;font-size:16px;text-decoration:none;">Log In</a>
                              <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                          </td>
                        </tr>
                      </table>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" align="center" role="presentation" height="5" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="5" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid two-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="360" style="background-color:#ffffff;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 10px; width: 100%;" align="center" role="presentation" height="10" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="10" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#1f0b0b;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:25px;padding-bottom:10px;padding-left:25px;">
                        <div style="line-height: 1.2; font-size: 12px; color: #1f0b0b; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                          <p style="font-size: 38px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 46px; margin: 0;"><span style="font-size: 38px;"><strong><span style>We"re happy</span></strong></span></p>
                          <p style="font-size: 38px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 46px; margin: 0;"><span style="font-size: 38px;"><strong><span style>you"re here.</span></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 10px; padding-bottom: 25px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:25px;padding-bottom:25px;padding-left:25px;">
                        <div style="line-height: 1.8; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 22px;">
                          <p style="line-height: 1.8; word-break: break-word; font-size: 16px; mso-line-height-alt: 29px; margin: 0;"><span style="font-size: 16px;">Thank you for choosing&nbsp;<strong>BCP Capital Management</strong>&nbsp;as your preferred investment solutions provider, we heartily welcome you to&nbsp;BCP&nbsp;family. At&nbsp;BCP, we offer you the entire spectrum of financial services under one roof. We are committed to the highest levels of transparency, accountability and integrity in all our transactions with you.</span><br><br><span style="font-size: 16px;">And because we care, Your Growth is always our Objective.</span><br><br></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="360" style="background-color:#ffffff;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="img-container center autowidth" align="center" style="padding-right: 5px;padding-left: 0px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 5px;padding-left: 0px;" align="center"><![endif]--><img class="center autowidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/first_imag.png" alt="Alternate text" title="Alternate text" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 355px; display: block;" width="355">
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;" align="center" role="presentation" height="20" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="20" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;" align="center" role="presentation" height="20" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="20" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#e4faf4;">
            <div class="block-grid two-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#e4faf4;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 35px; padding-left: 35px; padding-top: 5px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#34495e;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:5px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
                        <div style="line-height: 1.5; font-size: 12px; color: #34495e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                          <p style="font-size: 20px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 30px; margin: 0;"><span style="font-size: 20px;"><strong><span style>Trusted by Millions of People</span></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:transparent;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;" align="center" role="presentation" height="20" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="20" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid two-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="img-container center fullwidthOnMobile fixedwidth" align="center" style="padding-right: 10px;padding-left: 10px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 10px;padding-left: 10px;" align="center"><![endif]-->
                        <div style="font-size:1px;line-height:10px">&nbsp;</div><img class="center fullwidthOnMobile fixedwidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Guy_computer.png" alt="Alternate text" title="Alternate text" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 340px; display: block;" width="340">
                        <div style="font-size:1px;line-height:10px">&nbsp;</div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 15px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="15%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid transparent; height: 30px; width: 15%;" align="left" role="presentation" height="30" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="30" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#34495e;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:25px;padding-bottom:10px;padding-left:25px;">
                        <div style="line-height: 2; font-size: 12px; color: #34495e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                          <p style="font-size: 24px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 48px; margin: 0;"><span style="font-size: 24px;"><strong>Our Services</strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 0px; padding-bottom: 5px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:25px;padding-bottom:5px;padding-left:25px;">
                        <div style="line-height: 2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                          <ul>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Platform for equity</span></li>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Platform for Derivatives</span></li>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Platform for Commodity</span></li>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Platform for currency trading in NSE,BSE and MCX.</span></li>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Depository services NSDL & CDSL.</span></li>
                            <li style="line-height: 2; font-size: 16px; mso-line-height-alt: 32px;"><span style="font-size: 16px;">IPO Services</span></li>
                          </ul>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <div class="button-container" align="left" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:25px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 25px" align="left"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://blackcrescentpartners.in/why-to-choose-us.php" style="height:39pt; width:206.25pt; v-text-anchor:middle;" arcsize="8%" stroke="false" fillcolor="#00d09c"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:16px"><![endif]--><a href="https://blackcrescentpartners.in/why-to-choose-us.php" target="_blank" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #00d09c; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; width: auto; border-top: 0px solid #8a3b8f; border-right: 0px solid #8a3b8f; border-bottom: 0px solid #8a3b8f; border-left: 0px solid #8a3b8f; padding-top: 10px; padding-bottom: 10px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"><span style="padding-left:50px;padding-right:45px;font-size:16px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><strong>Get Started</strong></span></span></a>
                        <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:transparent;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 30px; width: 100%;" align="center" role="presentation" height="30" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="30" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-image:url("https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Background_green.png");background-position:top left;background-repeat:no-repeat;background-color:#ffffff;">
            <div class="block-grid two-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-image:url("https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Background_green.png");background-position:top left;background-repeat:no-repeat;background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 15px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="15%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid transparent; height: 45px; width: 15%;" align="left" role="presentation" height="45" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="45" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#34495e;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:25px;padding-bottom:10px;padding-left:25px;">
                        <div style="line-height: 2; font-size: 12px; color: #34495e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                          <p style="font-size: 24px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 48px; margin: 0;"><span style="font-size: 24px;"><strong><span style="font-size: 15px;">Our Different Strategies of Hedge fund</span><br></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 0px; padding-bottom: 5px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:25px;padding-bottom:5px;padding-left:25px;">
                        <div style="line-height: 2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                          <ul>
                            <li style="font-size: 16px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Macro & Managed Future Funds</span></li>
                            <li style="font-size: 16px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Equity Hedge Funds</span></li>
                            <li style="font-size: 16px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Event-Driven Hedge Funds</span></li>
                            <li style="font-size: 16px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 32px;"><span style="font-size: 16px;">Funds of Hedge Funds</span></li>
                          </ul>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 15px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="15%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid transparent; height: 15px; width: 15%;" align="left" role="presentation" height="15" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="15" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="360" style="background-color:transparent;width:360px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 360px; width: 360px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="95%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 95%;" align="center" role="presentation" height="35" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="img-container center fixedwidth" align="center" style="padding-right: 10px;padding-left: 10px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 10px;padding-left: 10px;" align="center"><![endif]-->
                        <div style="font-size:1px;line-height:10px">&nbsp;</div><img class="center fixedwidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Guy_texting.png" alt="Alternate text" title="Alternate text" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 340px; display: block;" width="340">
                        <div style="font-size:1px;line-height:10px">&nbsp;</div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 10px; width: 100%;" align="center" role="presentation" height="10" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="10" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 25px; width: 100%;" align="center" role="presentation" height="25" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="25" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 35px; padding-left: 35px; padding-top: 5px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#34495e;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:5px;padding-right:35px;padding-bottom:10px;padding-left:35px;">
                        <div style="line-height: 1.5; font-size: 12px; color: #34495e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                           <p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><strong><span style="font-size: 16px;">We have opened your&nbsp;BCP&nbsp;account with the following details submitted by you:</span></strong></p>
                          <p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;">&nbsp;</p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Client Code: ' .$largestid. '</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Name: '. $fname.$fathername.$lname .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Correspondence Address: '. $address .'</span></p>
                          
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Mobile No: '. $phone .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Email Id: '. $email .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Password :'. $pwd. '</span></p>
                          <p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;">&nbsp;</p>
                          <p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;"><strong><span style="font-size: 16px;">Registered Client Bank Details:</span></strong></p>
                          <p style="line-height: 1.5; word-break: break-word; mso-line-height-alt: 18px; margin: 0;">&nbsp;</p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Bank Name: '. $bank .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Account Number: '. $acc .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">Account Holder Name: '. $accname .'</span></p>
                          <p style="line-height: 1.5; word-break: break-word; font-size: 16px; mso-line-height-alt: 24px; margin: 0;"><span style="font-size: 16px;">IFSC Code: '. $ifsc .'</span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 10px; padding-bottom: 25px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:25px;padding-bottom:25px;padding-left:25px;">
                        <div style="line-height: 1.8; font-size: 12px; color: #393d47; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 22px;">
                          <p style="line-height: 1.8; word-break: break-word; font-size: 16px; mso-line-height-alt: 29px; margin: 0;"><span style="font-size: 16px;">In case you wish to modify any of the above details in future please contact us.</span></p>
                          <p style="line-height: 1.8; word-break: break-word; mso-line-height-alt: 22px; margin: 0;">&nbsp;</p>
                          
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:transparent;">
            <div class="block-grid four-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="180" style="background-color:transparent;width:180px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 180px; width: 180px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="180" style="background-color:transparent;width:180px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 180px; width: 180px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="180" style="background-color:transparent;width:180px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 180px; width: 180px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="180" style="background-color:transparent;width:180px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 180px; width: 180px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="mobile_hide">
                        <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                          <tbody>
                            <tr style="vertical-align: top;" valign="top">
                              <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" align="center" role="presentation" height="0" valign="top">
                                  <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                      <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="0" valign="top"><span></span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-image:url("https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Bottom_section.png");background-position:center top;background-repeat:no-repeat;background-color:#ffffff;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-image:url("https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1831/Bottom_section.png");background-position:center top;background-repeat:no-repeat;background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 100%;" align="center" role="presentation" height="35" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 100%;" align="center" role="presentation" height="35" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 100%;" align="center" role="presentation" height="35" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 100%;" align="center" role="presentation" height="35" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid three-up" style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="240" style="background-color:transparent;width:240px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 240px; width: 240px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#00d09c;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:20px;">
                        <div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #00d09c; mso-line-height-alt: 14px;">
                          <p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 19px; margin: 0;"><strong>&nbsp;Quick Links</strong></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:20px;">
                        <div style="line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #393d47; mso-line-height-alt: 22px;">
                          <p style="font-size: 16px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 29px; margin: 0;"><span style="font-size: 16px;"><a style="text-decoration: none; color: #393d47;" href="https://blackcrescentpartners.in/about-us.php" target="_blank" rel="noopener">About Us</a></span></p>
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;"><a style="text-decoration: none; color: #393d47;" href="https://blackcrescentpartners.in/career.php" target="_blank" rel="noopener"><span style="font-size: 16px;">Career</span></a></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table class="social_icons" cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="social_table" align="left" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top; display: inline-block; text-align: left;" align="left" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/BlackCrescentPartners/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/facebook@2x.png" alt="Facebook" title="Facebook" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://twitter.com/BlackcrescentP/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/twitter@2x.png" alt="Twitter" title="Twitter" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/bcp_capitalmanagement/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/instagram@2x.png" alt="Instagram" title="Instagram" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/company/blackcrescentpartners/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/linkedin@2x.png" alt="LinkedIn" title="LinkedIn" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="240" style="background-color:transparent;width:240px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 240px; width: 240px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#00d09c;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #00d09c; mso-line-height-alt: 14px;">
                          <p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 19px; margin: 0;"><strong>Contact Info</strong></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #393d47; mso-line-height-alt: 22px;">
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;">(+91) 9904618678</p>
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;">(+91) 8866773380</p>
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;">&nbsp;</p>
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;">info@blackcrescentpartners.in</p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="240" style="background-color:transparent;width:240px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 240px; width: 240px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#00d09c;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="line-height: 1.2; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #00d09c; mso-line-height-alt: 14px;">
                          <p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 19px; margin: 0;"><strong>Blackcrescent Partners<br></strong></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <div style="line-height: 1.8; font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #393d47; mso-line-height-alt: 22px;">
                          <p style="font-size: 14px; line-height: 1.8; word-break: break-word; text-align: left; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 25px; margin: 0;">202, Rudra Complex On Near Kalyan Jewelers,<br>3 Road Corner, Ambawadi,<br>Ahmedabad - 380006.</p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#ffffff;">
            <div class="block-grid " style="min-width: 320px; max-width: 720px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:720px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="720" style="background-color:transparent;width:720px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 720px; display: table-cell; vertical-align: top; width: 720px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 35px; width: 100%;" align="center" role="presentation" height="35" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" height="35" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
      </tr>
    </tbody>
  </table>
  <!--[if (IE)]></div><![endif]-->
</body>

</html>';


            $headers .= 'From: <info@blackcrescentpartners.in>' . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      if(mail($toEmail, $subject, $content, $headers)) {
      
      }
      unset($_POST);

      ?> <script>alert('Client Registered Successfully');
   window.location="client-register.php";</script> <?php
       }       
     }
else{   
       ?>   <script>alert('error');</script>   <?php
   }
// }
 // else{
     //   <script>alert('Email Already In Use');</script>
     // }
}

  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BCP - Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="icon" type="image/png" sizes="56x56" href="dist/img/fav.png">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php

include "header.php";

include "sidebar.php";

      ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Client Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Client Register</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
 <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter Client Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype='multipart/form-data' method="POST" action="">
                        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
                <div class="card-body">
                   <div class="row">
          <!-- left column -->
          <div class="col-md-6">
               <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" required class="form-control" placeholder="Enter First Name" <?php if (!empty($_POST['fname'])) {echo "value=\"" . $_POST["fname"] . "\"";} ?>>
                  </div>
          </div>
          <div class="col-md-6">  
            <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" required <?php if (!empty($_POST['lname'])) {echo "value=\"" . $_POST["lname"] . "\"";} ?>>
                  </div>
          </div>
        </div>
                 
                  <div class="form-group">
                    <label for="fathername">Father Name</label>
                    <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Enter Your Father's Full Name" required <?php if (!empty($_POST['fathername'])) {echo "value=\"" . $_POST["fathername"] . "\"";} ?>>
                  </div>

                  <div class="form-group">
                    <label for="bdate">Birth Date</label>
                    <input type="date" name="bdate" min="1920-01-01" class="form-control" id="datefield" required <?php if (!empty($_POST['bdate'])) {echo "value=\"" . $_POST["bdate"] . "\"";} ?>>
                  </div>

                  <div class="form-group">
                    <label for="acc">Bank Account Number</label>
                    <input type="number" class="form-control" name="acc" id="acc" placeholder="Enter Your Bank Account Number" required <?php if (!empty($_POST['acc'])) {echo "value=\"" . $_POST["acc"] . "\"";} ?>>
                  </div>
                  <div class="form-group">
                    <label for="accname">Account Holder Name</label>
                    <input type="text" class="form-control" name="accname" id="accname" placeholder="Enter Account Holder Name" required <?php if (!empty($_POST['accname'])) {echo "value=\"" . $_POST["accname"] . "\"";} ?>>
                  </div>
                  <div class="form-group">
                    <label for="ifsc">IFSC Code</label>
                    <input type="text" class="form-control" name="ifsc" id="ifsc" placeholder="Enter Your Bank's IFSC Code" required <?php if (!empty($_POST['ifsc'])) {echo "value=\"" . $_POST["ifsc"] . "\"";} ?>>
                  </div>
                  <div class="row">
          <div class="col-md-6">
    <div class="form-group">
                    <label for="photo">Passport Size Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" id="photo" class="custom-file-input" accept="image/*" id="photo" required>
                        <label class="custom-file-label" for="photo"><?php if (!empty($_POST['photo'])) {echo "value=\"" . $_POST["photo"] . "\"";} else{echo "Select file";} ?></label>
                      </div>                    
                    </div>
                  </div>
          </div>
          <div class="col-md-6">
                <div class="form-group">
                    <label for="sign">Signature Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="sign" accept="image/*" id="sign" required>
                        <label class="custom-file-label" for="sign"><?php if (!empty($_POST['sign'])) {echo "value=\"" . $_POST["sign"] . "\"";} else{echo "Select file";} ?></label>
                      </div>
                    </div>
                  </div>
        </div>
      </div>
                
                </div>
          </div>
          <div class="col-md-6">
            <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required <?php if (!empty($_POST['email'])) {echo "value=\"" . $_POST["email"] . "\"";} ?>>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" pattern='[0-9]{10}' maxlength="12" class="form-control" name="phone" id="phone" placeholder="Phone Number" required <?php if (!empty($_POST['phone'])) {echo "value=\"" . $_POST["phone"] . "\"";} ?>>
                  </div>
                   <div class="form-group">
                    <label for="pan">PAN Number</label>
                    <input type="text" class="form-control"  onkeyup="this.value = this.value.toUpperCase();" maxlength="10" name="pan" id="pan" placeholder="Enter Your PAN Number" required <?php if (!empty($_POST['pan'])) {echo "value=\"" . $_POST["pan"] . "\"";} ?>>
                  </div>
                   <div class="form-group">
                    <label for="adhar">ADHAR Number</label>
                    <input type="text" class="form-control" name="adhar" id="adhar" maxlength="19"  data-type="adhaar-number" placeholder="Enter Your ADHAR Number" required="fill Details" <?php if (!empty($_POST['adhar'])) {echo "value=\"" . $_POST["adhar"] . "\"";} ?>>
                  </div>
                  <div class="form-group">
                    <label for="bank">Bank Name</label>
                    <input type="text" class="form-control" name="bank" id="bank" placeholder="Enter Your Bank Name" required <?php if (!empty($_POST['bank'])) {echo "value=\"" . $_POST["bank"] . "\"";} ?>>
                  </div>
                       <div class="form-group">
                        <label for="address">Address</label>

                  <textarea class="form-control" rows="5" name="address" id="address" placeholder="Enter Your Address" required><?php if (!empty($_POST['address'])) {echo $_POST["address"] ;} ?></textarea>
                  </div>
                  
                </div>
          </div>
        </div>
                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      <?php

include "footer.php";

      ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
  $('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("form-control is-invalid");
  } else {
    $(this).removeClass("form-control is-invalid");
    $(this).addClass("form-control");
  }
});</script>
<script type="text/javascript">
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);



</script>
</body>
</html>



