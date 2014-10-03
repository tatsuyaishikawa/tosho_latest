
function kara_login()
{
 var vide_id=document.getElementsByName('ident');
 var vide_pass=document.getElementsByName('pass');

 if(!vide_id || !vide_pass){
   document.getElementById('err').innerHTML="ＩＤまたはパスワードが未入力です。";
 }

 
 return 0;
}

function desactive_kari()
{
 var statu=document.getElementById('statu').innerHTML;
 
 if(statu=="貸"){
  document.getElementById('valide').disabled=true;
 }

 return 0; 
}

function desactive_kaesi()
{
 var statu=document.getElementById('statu').innerHTML;
 
 if(statu!="貸"){
  document.getElementById('valide').disabled=true;
 }

 return 0; 
}
