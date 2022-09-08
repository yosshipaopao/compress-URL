<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="shortcut icon" type="image/x-icon" href="/pao.ico">
    <title>短縮URL生成</title>
    <link type="text/css" rel="stylesheet" href="css/loading.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        const button = document.getElementById("button");
        
        function disable_button(){
            button.disabled = true;
        };
        function check(){
            var url_l=document.forms[0].elements["url_l"].value;
            var url_s=document.forms[0].elements["url_s"].value;
            if(url_s.length < 4){
                alert("短縮後URLは4文字以上にしてください");
                return false;
            }
            else if(!(/^[^\.\/\&\%]+$/.test(url_s))){
                alert("禁止文字が使われています");
                return false;
            }
            else if(url_l.substr(0,7)=="http://"||url_l.substr(0,8)=="https://"){
                return true;
            }
            else{
                return window.confirm('URLではありません。続行しますか？');
            }
        };
    </script>
</head>
<body>
    <form method="POST" action="return.php" onSubmit="return check()">
        <p>元URL:<input type="url"name="url_l"></p>
        <p>短縮URL:http://ys-p.cf/<input type="text"name="url_s"></p>
        <button type="submit">確定</button>
    </form>
    <p>禁止文字：/,?,&</p>
</body>
</html>