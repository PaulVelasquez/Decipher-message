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
      <div class="col-md-16">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Guess the message
          </div>
          <div class="panel-body">
         
             
              <textarea oninput="placeMsg()" id="msg"  rows="25" cols="50" readonly></textarea>
             
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

      let message = "Oqnmtmbhzshnm: jvddtg-qtgm-rdd-tg\n\nNqhfhm: Rozmhrg\n\nCdehmhshnm: Z okzbd vgdqd xnt zqd xntq lnrs ztsgdmshb rdke;Z okzbd eqnl vghbg xntq rsqdmfsg ne bgzqzbsdq hr cqzvm, vgdqd xnt eddk rzed, vgdqd xnt eddk zs gnld.\n\nPtdqdmbhz. H bgnrd sghr vnqc adbztrd hs’r dwzbskx gnv h eddk vhsg xnt. Xnt eddk rzed. H eddk rzed vhsg xnt. Xnt eddk khjd gnld. H eddk bnlenqszakd vhsg xnt. H zl lxrdke zqntmc xnt. H eddk knudc drodbhzkkx zs shldr vgdm h zl tmcdrdquhmf. H zl cqzvm sn xnt. H zl zssqzbsdc sn xnt khjd lzfmds. Sgzmj xnt enq bgnnrhmf ld. Mnv, xnt’qd rstbj vhsg ld. H knud xnt.";


     
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
      var ch = s.codePointAt(i)%3;
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

  

    let message = "Oqnmtmbhzshnm: jvddtg-qtgm-rdd-tg\n\nNqhfhm: Rozmhrg\n\nCdehmhshnm: Z okzbd vgdqd xnt zqd xntq lnrs ztsgdmshb rdke;Z okzbd eqnl vghbg xntq rsqdmfsg ne bgzqzbsdq hr cqzvm, vgdqd xnt eddk rzed, vgdqd xnt eddk zs gnld.\n\nPtdqdmbhz. H bgnrd sghr vnqc adbztrd hs’r dwzbskx gnv h eddk vhsg xnt. Xnt eddk rzed. H eddk rzed vhsg xnt. Xnt eddk khjd gnld. H eddk bnlenqszakd vhsg xnt. H zl lxrdke zqntmc xnt. H eddk knudc drodbhzkkx zs shldr vgdm h zl tmcdrdquhmf. H zl cqzvm sn xnt. H zl zssqzbsdc sn xnt khjd lzfmds. Sgzmj xnt enq bgnnrhmf ld. Mnv, xnt’qd rstbj vhsg ld. H knud xnt.";


     document.getElementById("msg").value = message;
  }

  
 </script>







