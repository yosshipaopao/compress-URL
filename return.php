<?php
$url="./data.json";
$json = file_get_contents($url);
$json = mb_convert_encoding($json, "UTF8" ,  'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$data = json_decode($json,true);

$url_l=$_POST["url_l"];
$url_s=$_POST["url_s"];
if($data[urlencode($url_s)]["href"]==$url_s){
    echo "すでに使われています";
    echo "<br>http://ys-p.cf/".$url_s;
    echo "<br>追加時刻:".substr($data[urlencode($url_s)]["time"],0,4)."年".substr($data[urlencode($url_s)]["time"],4,2)."月".substr($data[urlencode($url_s)]["time"],6,2)."日".substr($data[urlencode($url_s)]["time"],8,2)."時".substr($data[urlencode($url_s)]["time"],10,2)."分".substr($data[urlencode($url_s)]["time"],12,2)."秒";
    echo "<br><a href='http://ys-p.cf'>元のページ</a>";
}
else if(!(preg_match("/^[^\.\/\&\%]+$/", $url_s))){
    echo "禁止文字が使われています";
    echo "<br><a href='http://ys-p.cf'>元のページ</a>";
}
else{
    $data[urlencode($url_s)]=array("url"=>$url_l,"href"=>$url_s,"time"=>date("YmdHis"));
    $data=json_encode($data);
    file_put_contents($url, $data);
    
    echo $url_l;
    echo "<br><a href='http://ys-p.cf/".$url_s."'>http://ys-p.cf/".$url_s."</a>";
    echo "<br>追加しました。";
}
?>