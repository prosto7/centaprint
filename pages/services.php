<?php     
include_once('../modules/classes.php');
include_once("header.php"); 
include_once("services_contact.php"); 
?>


    
    <?php 
   include_once("footer.php");?>
  
  
  <script>
 $(document).ready(function(){
$( ".accordion_1" ).mouseover(function(){
   $( ".accordion_1" ).trigger( "click" );
});
$( ".accordion_2" ).mouseover(function(){
   $( ".accordion_2" ).trigger( "click" );
});
$( ".accordion_3" ).mouseover(function(){
   $( ".accordion_3" ).trigger( "click" );
});
});</script>