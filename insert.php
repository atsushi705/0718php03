<?php
//1. POSTデータ取得
$bname   = $_POST["bname"];
$burl  = $_POST["burl"];
$bcomment = $_POST["bcomment"];


//*** 外部ファイルを読み込む ***
include("funcs.php");
$pdo = db_conn();

//2. DB接続します

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 0718gs_an_table(bname,burl,bcomment,indate)VALUES(:bname,:burl,:bcomment,sysdate())");
$stmt->bindValue(':bname',  $bname,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':burl', $burl,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bcomment',$bcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化を使う！*****************
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化を使う！*****************
    // header("Location: index.php");
    redirect("index.php");
    exit();
}

?>
