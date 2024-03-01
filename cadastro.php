<?php

$login = $POST^[ 'login'];
$senha = MD5( $_POST ['senha']);
$connect = mysql_connect ( 'nome_do_servidor' ,'nome_de_usuario', 'senha');
$db = mysql_select_db('nome_do_Banco_De_Dados');
$query_select = "SELECT login FROM usuarios WHERE login = '$login";
$select =mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('o campo login deve ser preenchido') ;window.location.href='
    cadasto.html';</script";

} else { 

    if ($logarray == $login){
        echo"<script language='javascrpit' type='text/javascript'>
        alert('esse login ja existe');window.location.href='
        cadastro.html' ;</script>";
        die();
    }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login', '$senha')";
        $insert = mysql_query($query,$connect);
        if($insert) {
            echo "<script language= 'javascript' type='text/javascript'>
            alert ('Usuario cadastro com sucesso!') ;<window.location.
            href= 'login.html'</script>";
        }else {
            echo "<script language='javascript' type='text/javascript'>
            alert('nao foi possivel cadastrar esse usuario');window.location
            .href='cadastro.html'</script>;
    
        }
    }
}   
        
    