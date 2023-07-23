<?php
//1. POSTデータ取得
$bname   = $_POST["bname"];
$burl  = $_POST["burl"];
$bcomment = $_POST["bcomment"];
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "UPDATE 0718gs_an_table SET bname=:bname, burl=:burl, bcomment=:bcomment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bname',  $bname,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':burl', $burl,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bcomment',$bcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>
