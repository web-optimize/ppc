<?php
//http://www.vdgraaf.info/google-analytics-without-javascript.html

define('TIMEZONE', 'America/Phoenix');
date_default_timezone_set(TIMEZONE);         //this can vary per client

 header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    
$var_utmac='UA-XXXXXXX-X'; //enter the new urchin code
$var_utmhn='domain.com'; //enter your domain
$var_utmn=rand(1000000000,9999999999);//random request number
$var_cookie=rand(10000000,99999999);//random cookie number
$var_random=rand(1000000000,2147483647); //number under 2147483647
$var_today=time(); //today
$var_referer=''; //referer url

$var_uservar='-'; //enter your own user defined variable
$var_utmp='/inboundcall/'.$_REQUEST["To"]; //this example adds a fake page request to the (fake) rss directory (the viewer IP to check for absolute unique RSS readers)

$urchinUrl='http://www.google-analytics.com/__utm.gif?utmwv=1&utmn='.$var_utmn.'&utmsr=-&utmsc=-&utmul=-&utmje=0&utmfl=-&utmdt=-&utmhn='.$var_utmhn.'&utmr='.$var_referer.'&utmp='.$var_utmp.'&utmac='.$var_utmac.'&utmcc=__utma%3D'.$var_cookie.'.'.$var_random.'.'.$var_today.'.'.$var_today.'.'.$var_today.'.2%3B%2B__utmb%3D'.$var_cookie.'%3B%2B__utmc%3D'.$var_cookie.'%3B%2B__utmz%3D'.$var_cookie.'.'.$var_today.'.2.2.utmccn%3D(direct)%7Cutmcsr%3D(direct)%7Cutmcmd%3D(none)%3B%2B__utmv%3D'.$var_cookie.'.'.$var_uservar.'%3B';
 
$ch = curl_init ($urchinUrl);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec ($ch);
//this is to send to different numbers depending on the hour of the day
if(date("H") > 17 || date("H") < 9) {?>

<Response>
    <Dial>+1480335XXXX</Dial>
    <Say>Our agents are busy right now.  Please call back shortly. Goodbye.</Say>
</Response>
<?php } else { ?>
<Response>
    <Dial>+1480664XXXX</Dial>
    <Say>Our agents are busy right now.  Please call back shortly. Goodbye.</Say>
</Response>


<?php } ?>
