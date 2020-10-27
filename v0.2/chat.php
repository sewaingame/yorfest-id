<!--Start of Tawk.to Script-->
<script type="text/javascript">
console.log("chat loaded");
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

Tawk_API.visitor = {
name : <?php
  if(isset($_SESSION['nama']))
    echo '"'.$_SESSION["nama"] . '"';
  else
    echo '"Visitor"';
?>,
email : <?php
  if(isset($_SESSION['email']))
    echo '"'.$_SESSION["email"] . '"';
  else
    echo '"visitor@email.com"';
?>,
hash : 'hash-value'
};
(function(){

})();
</script>
<!--End of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f979886aca01a168835fbdf/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
