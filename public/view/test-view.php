<?php
session_start();
function numroVizitat(){
if (isset( $_SESSION['numro'])){
$_SESSION['numro']++;
}else {
$_SESSION['numro'] = 1;
}
return $_SESSION['numro'];
}
echo 'Ju keni vizituar faqen: '.numroVizitat().' here<br>';
echo 'ID e sesionit eshte: '.session_id()
?>