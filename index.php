<!DOCTYPE html>
<html>
 <head>
  <title>Bootstrap</title>
  <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap-old.css">
  <link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="vendors/carousel/carousel.css">
 </head>
 <body onload="themessage()">
 <div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="navbar navbar-light">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
             <span class="fa fa-envelope"></span> Love Mail
            </a>
          </div>
          <ul class="navbar-nav">
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <p>Encrypted Message:</p>
              <?php 
              $text = "Pronunciation: kweeuh-ruhn-see-uh

Origin: Spanish

Definition: A place where you are your most authentic self;
A place from which your strength of character is drawn, where you feel safe, where you feel at home.


Querencia. I chose this word because it’s exactly how i feel with you. You feel safe. I feel safe with you. You feel like home. I feel comfortable with you. I am myself around you. I feel loved especially at times when i am undeserving. I am drawn to you. I am attracted to you like magnet. Thank you for choosing me. Now, you’re stuck with me. I love you.
" 


              ?>
    </div>
    <div class="row">
       <?php
       session_start();
       if(isset($_SESSION['error_message'])){
      ?>
      <div class="alert alert-danger">
      <span class="fa fa-exclamation-circle"></span> 
      <?php
        echo $_SESSION['error_message'];
      ?>
      </div>
      <?php
       unset($_SESSION['error_message']);
       }
      ?>
    </div>
    <div class="row">
      <div class="center">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Guess the message
          </div>
          <div class="panel-body">
         
             
              <textarea oninput="placeMsg()" id="msg"  rows="25" cols="60" readonly></textarea>
             
              <input type="text" id="key" class="form-control" name="password" placeholder="Enter Key here" required>
              <br />
              <button onclick="decryptmsg()" class="btn btn-success 
               btn-block">
              <span class="fa fa-key"> Key
              </button>
             
         
          </div>
        </div>
      </div>
    </div>  
    </div>
    <div class="row">
     
    </div>
  </div>
 </div>
  <script src="vendors/jquery/jquery.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.js"></script>
  <script src="vendors/carousel/carousel.js"></script>
 </body>
</html>

<style type="text/css">
  .center {
  margin: auto;
  width: 50%;
  
  padding: 10px;
}
</style>

 <script type="text/javascript">

  function decryptmsg(){

      let message = "Yaxwdwlrjcrxw: tfnndq-adqw-bnn-dq\n\nXarprw: Byjwrbq\n\nMnorwrcrxw: J yujln fqnan hxd jan hxda vxbc jdcqnwcrl bnuo;J yujln oaxv fqrlq hxda bcanwpcq xo lqjajlcna rb majfw, fqnan hxd onnu bjon, fqnan hxd onnu jc qxvn.\n\nZdnanwlrj. R lqxbn cqrb fxam knljdbn rc’b ngjlcuh qxf r onnu frcq hxd. Hxd onnu bjon. R onnu bjon frcq hxd. Hxd onnu urtn qxvn. R onnu lxvoxacjkun frcq hxd. R jv vhbnuo jaxdwm hxd. R onnu uxenm nbynlrjuuh jc crvnb fqnw r jv dwmnbnaerwp. R jv majfw cx hxd. R jv jccajlcnm cx hxd urtn vjpwnc. Cqjwt hxd oxa lqxxbrwp vn. Wxf, hxd’an bcdlt frcq vn. R uxen hxd.";


     
    var key = document.getElementById("key").value;
    key = key.toLowerCase();
    document.getElementById("msg").value = decrypt(message,key);

  }
 
  function placeMsg(){
  //var msg = document.getElementById("msg").value;
  //document.getElementById("message").innerHTML = msg;
  }
  
  
  
  function decrypt(text,val){
    //var text = document.getElementById("msg").value;
    val = val.toLowerCase();
    var result = "";
    //var val = document.getElementById("key").value;
    val=convertStringToAscci(val);
    var shift =(26 -  parseInt(val) % 26 ); 
    
    for(var i =0 ; i< text.length; i++){
    
    var c = text.charCodeAt(i);
    
    if(c >=65 && c <=90 ){
      result += String.fromCharCode(( c - 65 + shift) % 26 + 65);
    }
    else if(c >= 97 && c <= 122){
    result += String.fromCharCode(( c - 97 + shift) % 26 + 97);
    }
    
    else{
      result += text.charAt(i);
    }

   }
  
   return result;
  }
  
  function convertStringToAscci(s){
    
    let res="";
    for (let i = 0; i < s.length; i++){
      var ch = s.codePointAt(i)%12;
      res += ch;
    }
    console.log(res);
    return res;
  }
  
  function encrypt()
  {
    var text = document.getElementById("msg").value;
    var s = document.getElementById("key").value;
    s=convertStringToAscci(s);
    s = parseInt(s);
    let result=""
    for (let i = 0; i < text.length; i++)
    {
      let char = text[i];
      var c = text.charCodeAt(i);

      if(c >=65 && c <=90 ){
      let ch = String.fromCharCode((char.charCodeAt(0) + s-65) % 26 + 65);
        result += ch;
      }
      else if(c >= 97 && c <= 122){
      let ch = String.fromCharCode((char.charCodeAt(0) + s-97) % 26 + 97);
        result += ch;
      }
      
      else{
        result += text.charAt(i);
      }


    }
    //console.log(s);
     document.getElementById("message").innerText ="Encrypted : "+ result + "    Decrypted: " + decrypt(result);
  }


 


  
 
 </script>

 <script type="text/javascript">
    function themessage(){

    let message = "Yaxwdwlrjcrxw: tfnndq-adqw-bnn-dq\n\nXarprw: Byjwrbq\n\nMnorwrcrxw: J yujln fqnan hxd jan hxda vxbc jdcqnwcrl bnuo;J yujln oaxv fqrlq hxda bcanwpcq xo lqjajlcna rb majfw, fqnan hxd onnu bjon, fqnan hxd onnu jc qxvn.\n\nZdnanwlrj. R lqxbn cqrb fxam knljdbn rc’b ngjlcuh qxf r onnu frcq hxd. Hxd onnu bjon. R onnu bjon frcq hxd. Hxd onnu urtn qxvn. R onnu lxvoxacjkun frcq hxd. R jv vhbnuo jaxdwm hxd. R onnu uxenm nbynlrjuuh jc crvnb fqnw r jv dwmnbnaerwp. R jv majfw cx hxd. R jv jccajlcnm cx hxd urtn vjpwnc. Cqjwt hxd oxa lqxxbrwp vn. Wxf, hxd’an bcdlt frcq vn. R uxen hxd.";

     document.getElementById("msg").value = message;
  }

  
 </script>







