<?php 
session_start();
include('class.phpmailer.php');


//print_r($_REQUEST);

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$company = $_REQUEST['company'];
$message = $_REQUEST['message'];




$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Message</title>
</head>

<body>
   <div style="width: 600px;margin:0 auto; font-family:Arial, Helvetica, sans-serif;">
   		<table width="100%" cellspacing="0" cellpadding="2">
          <tbody>
            <tr>
              <td style="font-size:16px;font-weight:bold;padding: 10px 15px;background:#1c2559;color:#fff;" colspan="2">Enquiry from EndoShred</td>
            </tr>
            <tr>
              <td style="width:20%">&nbsp;</td>
              <td><br></td>
            </tr>
            <tr>
              <td style="font-family:Arial;font-size:12px;font-weight:bold;padding:5px">Full
                Name:</td>
              <td style="font-family:Arial;font-size:12px;padding:5px">'.$name.'</td>
            </tr>
            <tr>
              <td style="font-family:Arial;font-size:12px;font-weight:bold;padding:5px">Email:</td>
              <td style="font-font-family:Arial;font-size:12px;padding:5px"><a target="_blank" href="mailto:'.$email.'">'.$email.'</a></td>
            </tr>
            <tr>
              <td style="font-family:Arial;font-size:12px;font-weight:bold;padding:5px"> Telephone:</td>
              <td style="font-family:Arial;font-size:12px;padding:5px">'.$phone.' </td>
            </tr>
            <tr>
						<tr>
              <td style="font-family:Arial;font-size:12px;font-weight:bold;padding:5px"> Company:</td>
              <td style="font-family:Arial;font-size:12px;padding:5px">'.$company.' </td>
            </tr>
            <tr>
              <td style="font-family:Arial;font-size:12px;font-weight:bold;padding:5px"> Message:</td>
              <td style="font-family:Arial;font-size:12px;padding:5px">'.$message.' </td>
            </tr>
            <tr>
              <td><br></td>
              <td><br></td>
            </tr>
            <tr>
              <td style="font-size:16px;font-weight:bold;;background:#1c2559;color:#fff; padding: 0" colspan="2"><br></td>
            </tr>
          </tbody>
    </table>
   </div>
</body>
</html>';

$proceed = 1;

if(empty ($name)){

$proceed = 0;

}

if(empty ($email )){

$proceed = 0;

}

if(empty ($phone )){

$proceed = 0;

}
if(empty ($company)){

$proceed = 0;

}


if(empty ($message)){

$proceed = 0;

}

if($proceed){


echo "i am in";
	
		
    $address = 'mail@endoshred.com';
		$mail = new PHPMailer();
		$mail->SetFrom($email, $name);
		
		$mail->AddAddress($address, 'EndoShred');  
		//$mail->AddCC('', 'EndoShred');	
	  //$mail->AddCC('', 'EndoShred');	
	
		$mail->Subject = 'New Enquiry from EndoShred - '.$name;
		$mail->MsgHTML($body);
		
		if(!$mail->Send()) {
		  	$mail->ErrorInfo;
		  echo "Error";
		}
		else 
		{
			$mail = new PHPMailer();
			$mail->SetFrom('no-reply@endoshred.com', 'EndoShred');
			$mail->AddAddress($email, $name);		
			$mail->Subject = "Thank you for contacting us";
			$mail->MsgHTML($body);
				if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "Message sent!";
                }
		}
}
else{

echo "Some value is empty";
}

?>