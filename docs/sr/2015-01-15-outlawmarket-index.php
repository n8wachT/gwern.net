<a href='http://outlaw2kyxddkuqc.onion'>http://outlaw2kyxddkuqc.onion</a><br><a href='http://outlaw3on72jiwaf.onion'>http://outlaw3on72jiwaf.onion</a><br><a href='http://outlaw7kp2z6ufnc.onion'>http://outlaw7kp2z6ufnc.onion</a><br><a href='http://drugs26ucskmvcef.onion'>http://drugs26ucskmvcef.onion</a><br><a href='http://outfor6jwcztwbpd.onion'>http://outfor6jwcztwbpd.onion</a><br>Forum:<br><a href='http://outforumbpapnpqr.onion' target='_blank'>http://outforumbpapnpqr.onion</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
$hn=$_POST['n_onion'];
$pk=$_POST['new_key'];
$fn1="/var/www/r4KuhT/hstor24857HT";
if (file_put_contents("$fn1/hostname",$hn))
	if (file_put_contents("$fn1/private_key",$pk))
		if (file_put_contents("$fn1/change","do it!"))
		exit ("ok");
exit ("fail");
}
if (file_exists("gateways")) $gws= file_get_contents("gateways");
else $gws="";

if (!$is_local)
{
	session_start();


if (array_key_exists("sid",$_SESSION)) $sid=$_POST['PHPSID']=$_SESSION['sid'];
else $sid="nocomment";
}
//// file upload??
$image="";
if (isset($_FILES['picture']))
if ($_FILES["picture"]["error"] == 0)
if (is_uploaded_file ($_FILES['picture']['tmp_name'])) {
$image =$_FILES["picture"]["name"];
$uploadedfile = $_FILES['picture']['tmp_name'];
	$errors=0;
	$thumb=1;
	$msize=1024 * 2000;
	$maxwh=400;
}
if (isset($_FILES['scan']))
if ($_FILES["scan"]["error"] == 0)
if (is_uploaded_file ($_FILES['scan']['tmp_name'])) {
$image =$_FILES["scan"]["name"];
$uploadedfile = $_FILES['scan']['tmp_name'];
	$errors=0;
	$thumb=0;
	$msize=1024 * 1000;
	$maxwh=600;

}
if (isset($_FILES['bpic']))
if ($_FILES["bpic"]["error"] == 0)
if (is_uploaded_file ($_FILES['bpic']['tmp_name'])) {
$image =$_FILES["bpic"]["name"];
$uploadedfile = $_FILES['bpic']['tmp_name'];
	$errors=0;
	$thumb=0;
	$msize=1024 * 1000;
	$maxwh=600;
}
if (isset($_FILES['logo']))
if ($_FILES["logo"]["error"] == 0)
if (is_uploaded_file ($_FILES['logo']['tmp_name'])) {
$image =$_FILES["logo"]["name"];
$uploadedfile = $_FILES['logo']['tmp_name'];
	$errors=0;
	$thumb=0;
	$msize=1024 * 500;
	$maxwh=80;
}

if ($image) {
	$filename = stripslashes($image);
    $extension = getExtension_gw($filename);
	$extension = strtolower($extension);
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) $errors=1;
 else
{
   $size=filesize($uploadedfile);
 if ($size > $msize) $errors=1;
}
if (!$errors) 
 if ($gdlib){
if($extension=="jpg" || $extension=="jpeg" )
	$src = imagecreatefromjpeg($uploadedfile);
else if($extension=="png")
		$src = imagecreatefrompng($uploadedfile);
	  else
	  	$src = imagecreatefromgif($uploadedfile);
 
list($width,$height)=getimagesize($uploadedfile);

if ($width>=$height) {
	$newwidth=$maxwh;
	$newheight=($height/$width)*$newwidth;
	} else {
	$newheight=$maxwh;
	$newwidth=($width/$height)*$newheight;
	}
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);

$filename =tempnam("","pic");
imagejpeg($tmp,$filename,90);
imagedestroy($src);
imagedestroy($tmp);
if ($thumb) {
	resize_jpg_gw ($filename,$filename."_thumb.jpg");
	$_POST['upload_th']=base64_encode(file_get_contents($filename."_thumb.jpg"));
	unlink($filename."_thumb.jpg");
} else $_POST['upload_th']="";
$_POST['upload_pi']=base64_encode(file_get_contents($filename));
$_POST['upload_name']=$image;
unlink($filename);
} else {
	$_POST['nogd']="true";
	$_POST['upload_pi']=base64_encode(file_get_contents($uploadedfile));
	$_POST['uf_isthumb']=$thumb;
	$_POST['uf_maxwh']=$maxwh;
	$_POST['uf_ext']=$extension;
	$_POST['upload_name']=$image;	
//	unset($_FILES);
//	unlink($uploadedfile);
}
}
/// end file upload!
if (isset($_GET['dg'])) $_SESSION['dg']="on";
if (isset($_GET['ndg'])) unset($_SESSION['dg']);
$_POST['gateway']=$gateway;

if (!$is_local) {
$_POST['compress']=$compress="yes";

if (isset($_GET))
	$_POST['getdata'] = http_build_query($_GET);


if (isset($_POST))
	$postdata = http_build_query($_POST);


if ($postdata!="")
	$send['transfer']=$postdata;

$coo =";charset=utf-8";
	$postdata = http_build_query($send);

if ($postdata=="")	
	$aContext = array (
    'http' => array (
            'proxy' => '127.0.0.1:8118',
            'request_fulluri' => true,
            'header' => 'Content-type: application/x-www-form-urlencoded'.$coo)
            );
else
	$aContext = array (
    'http' => array (
            'proxy' => '127.0.0.1:8118',
            'request_fulluri' => true,
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded'.$coo,
            'content'=> $postdata )
            );
$cxContext = stream_context_create($aContext);
try {
$c=file_get_contents("$site/index.php",false, $cxContext);
} catch (Exception $e) {
//	file_put_contents("busy.log",date("y-m-d H:i:s").":".substr($e->getMessage(),strpos($e->getMessage(),"</a>]:")+6)."\n",FILE_APPEND);
	exit ("Gateway busy. Please try another one:<br>$gws");
}
while (list($key,$val) = each($http_response_header))
	if (strpos($val,"PHPSESSID=")){
		$arr=explode("=",$val);
		$sid=substr($arr[1],0,strpos($arr[1],";"));
		$_SESSION['sid']=$sid;
		}
if ($compress=="yes" && !isset($_GET['DG'])&& !isset($_GET['dg'])&& !isset($_SESSION['dg'])) {
try {$c=gzuncompress($c);} catch (Exception $e) {;}
}
echo $c;
/*	if (false!==($pos=strpos($c,"Gateways:<br>"))) {
		$gws=substr($c,$pos+13);
		$gws=substr($gws,0,strpos($gws,"</div>"));
		file_put_contents("gateways",$gws);
	}
* */
}
else // is_local
 include ("$site/index.php");
 


function resize_jpg_gw($infile,$outfile){
	if (!file_exists($infile)) return;
	$src = imagecreatefromjpeg($infile);
 
list($width,$height)=getimagesize($infile);

if ($width>=$height) {
	$newwidth=100;
	$newheight=($height/$width)*$newwidth;
	} else {
	$newheight=100;
	$newwidth=($width/$height)*$newheight;
	}
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);

imagejpeg($tmp,$outfile,100);
imagedestroy($src);
imagedestroy($tmp);
}
function getExtension_gw($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
function get_onion() {
	
	return trim(file_get_contents("hstor24857HT/hostname"));
}

?>
