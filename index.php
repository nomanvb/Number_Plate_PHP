<?php
if(isset($_POST['check_submit']))
{
    $tmpfile = $_FILES['files']['tmp_name'];
    $filename = basename($_FILES['files']['name']);
    $filetype = $_FILES['files']['type']; 

    // Connecting to external api via cURL
    $curl_handle = curl_init("http://app.cogedg.com:4555/api/");
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    $args['file'] = new CurlFile($tmpfile, $filetype, $filename);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $args);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    //execute the API Call
    $returned_data = curl_exec($curl_handle);
    curl_close ($curl_handle);

    echo $returned_data;
}
?>

<form method="POST" action="" enctype="multipart/form-data">

<p>Select a file to upload : </p>

<input type="file" name="files">

<input type="submit" name="check_submit"/>

</form>
