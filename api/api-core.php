
<?php
// set post fieldshttp://online.verypdf.com/api/?apikey=XXXX

$key=$_REQUEST['key'];

$sfile=$_REQUEST['sfile'];

$tfile=$_REQUEST['tfile'];

$file="";

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "../uploads/".$_FILES['userImage']['name'];
$filepath="uploads/".$_FILES['userImage']['name'];
move_uploaded_file($sourcePath,$targetPath);

$pf = preg_replace('/\s+/', '', $filepath);

$file='http://localhost/techmyntra/pdfAPP/'.$filepath;
}
}

if($key=='9C7B887F95194E85772BB7FECF5F1AF69556B284' && !empty($file) )
{
	//gettok($file);
	echo $file;


}


function gettok($file)
{
$post = [
    'apikey' => '9C7B887F95194E85772BB7FECF5F1AF69556B284',
     'app' => 'pdftools',
     'infile' => $file,
     'outfile' => 'verypdf.doc',

   
];

$ch = curl_init('http://online.verypdf.com/api/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used


// do anything you want with your response
//$json = json_decode($response, true);
//print_r($response);

$data = $response;    
$whatIWant = substr($data, strpos($data, "]") + 1);    
echo $whatIWant;

}

?>
