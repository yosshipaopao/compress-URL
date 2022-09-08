<?php
$url="./data.json";
$json = file_get_contents($url);
$json = mb_convert_encoding($json, "UTF8" ,  'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$data = json_decode($json,true);

if(isset($_GET['href'])) { 
    $id = $_GET['href'];
    if($data[urlencode($id)]["href"]==$id){
        header('Location: '.$data[urlencode($id)]["url"]);
    }
    else{
        echo $data[urlencode($id)]["url"];
echo urlencode($id);
        echo "<br>urlがありません";
    }
}
else{
    include("./write.php");
}
?>