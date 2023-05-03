<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta name="HandheldFriendly" content="true">


        
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/Normalize/normalize-v8.0.1.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/fonts/font_roboto/roboto.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/fonts/font_awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-ui.min.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/Croppie/Croppie-2.6.4/croppie.css"/>
        <link rel="stylesheet" type="text/css" href="stylePhone.css"/>
        <script type="text/javascript" src="phone.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body oncontextmenu="return false">
      <div class="content-wrap" id="content-wrap">
            <!-- Contents starts here-->
            <div class="content" id="content">
              
            <div id="tabs">
                <ul>
                      <li><a href="#tabs-1">
                      <table style="height:4.5%;width: 10%;text-align: left;font-size: 11px;">
                        <tr>
                            <td><i class="fa fa-2x" aria-hidden="true"  style='color:green;padding: 0px;'><span id="min">00</span>:<span id="sec">00</span></i></td>
                            
                        </tr>
                      </table>
                      </a></li>
                      <table style="height:4.5%;width: 10%;text-align: right;font-size: 11px;" align="right">
                        <tr><td style='color:green;padding: 0px;'>CUSTOMER</td></tr>
                      </table>

                </ul>
                <div id="tabs-1">
                  <?php
                  $NNmubr =$_GET['tbl'];
                  $numbertocall=$_GET['person_id'];
                  include('../../modules/dbco.php');
                  $sqltr = "SELECT * FROM  xleads_motherfinancial  WHERE c0='$numbertocall'";
                  $result = $conn->query($sqltr);
                  while($row = $result->fetch_assoc()) {
                    for($i=0;$i<20;$i++){
                            $iy = "c".$i;
                            if(! isset($row[$iy])){
                                //do nothing
                                ${'c'.$i} ="";
                            }else{
                                ${'c'.$i} = $row[$iy];
                            }
                            
                        }
                        
                  }

                  ?>
                  <div class="row" style="width:100%;">
                    <div class="col" style="width:37%;">
                        <table class='pbox table table-hover table-striped tableA' id='tableA2' style='width: 100%;border-collapse: collapse;'>
                        <thead style="background-color:#ccc; width:100%;">
                                      <tr >
                                          <th>Personal Details</th>
                                          <th></th>
                                      </tr>
                        </thead>
                        <tbody> 
                          <tr><td>Customer Name&nbsp;:</td><td><?php echo $c3;?></td></tr>
                          <tr><td>Phone Number&nbsp;:</td><td><?php echo $numbertocall;?></td></tr>
                          <tr><td>National ID #&nbsp;:</td><td><?php echo $c4;?></td></tr>
                          <tr><td>eMail Address&nbsp;:</td><td><?php echo $c5;?></td></tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col" style="width:37%;">
                        <table class='pbox table table-hover table-striped tableA' id='tableA2' style='width: 100%;border-collapse: collapse;'>
                        <thead style="background-color:#ccc; width:100%;">
                                      <tr >
                                          <th>Loan Details</th>
                                          <th></th>
                                      </tr>
                        </thead>
                        <tbody>
                          <tr><td>Business Type&nbsp;:</td><td><?php echo $c6;?></td></tr>
                          <tr><td>Current Loan & Interest&nbsp;:</td><td><div id="CRLoanINOfPerson"></div></td></tr>
                          <tr><td>Last Amount Paid&nbsp;:</td><td><div id="MAPLoanINOfPerson"></div></td></tr>
                          <tr><td>Last Month Paid&nbsp;:</td><td><div id="LMPLoanINOfPerson"></div></td></tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col" style="width:26%;">
                    <div class="row"><img src="avatars/default.6.png" width="150"  height="130"></div>
                      <div class="row"><b><?php echo strtoupper($c3);?></b></div>
                    </div>
                  </div>
                  <div class="row">
                  <table class="pbox table border bg-white table-hover" id='tableA2'>
                                  <thead style="background-color:#ccc; width:100%;">
                                      <tr >
                                          <th>Device</th>
                                          <th>Location</th>
                                          <th>IP</th>
                                          <th>Date</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - Windows 10</th>
                                          <td>Paris, France</td>
                                          <td>192.168.1.10</td>
                                          <td>Apr 24, 2019</td>
                                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                                      </tr>
                                      <tr>
                                          <th scope="col"><i class="fe fe-smartphone fe-12 text-muted mr-2"></i>App - Mac OS</th>
                                          <td>Newyork, USA</td>
                                          <td>10.0.0.10</td>
                                          <td>Apr 24, 2019</td>
                                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                                      </tr>
                                      <tr>
                                          <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - iOS</th>
                                          <td>London, UK</td>
                                          <td>255.255.255.0</td>
                                          <td>Apr 24, 2019</td>
                                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                                      </tr>
                                  </tbody>
                              </table>
                    
                  </div>
                  <div class="row table-hover pbox" id='tableA2' style="height: 7%;width:100%;line-height: 1.6;">
                      <div class="column" style="width:60%;">
                          <textarea class="pbox form-control" name="Notes" id="Notes" placeholder="Type your Notes here ...." cols="50" rows="4" maxlength="160" required></textarea><br>
                          Disposition: <select name="desposition" id="desposition" class="pbox">
                                <option value="none">--Select--</option>
                                <option value="PIKD">Picked</option>
                                <option value="BZY">Busy</option>
                                <option value="VoM">VoiceMail</option>
				<option value="NoAns">NoAnswer</option>
                                <option value="BLK">Blocked</option>
                                <option value="invalid">InValidNum</option>
                              </select>
                              &nbsp;&nbsp;&nbsp;CallBack: <input type="datetime-local" id="datetiming" name="event_dt" autocomplete="off" size="6" class="pbox">
                        </div>
                        
                        <div class="column" style="width:20%;hieght:97%;border-left: 1px solid #ccc;border-right: 1px solid #ccc;">
                            <div Style="background-color: #F0F7FC;width:100%;"><b>Cust Disposition</b></div>
                            <input type="radio"  class="form-check-input" Name="notification2" id="notification2" Value="Sale">&nbsp;Sale<br>
                            <input type="radio"  class="form-check-input" Name="notification2" id="notification2" Value="Pro2Pay">&nbsp;Pro2Pay<br>
                            <input type="radio"   class="form-check-input" Name="notification2" Value="NoSale" id="notification2">&nbsp;NoEmployed<br>
                            <input type="radio"   class="form-check-input" Name="notification2" Value="NoInterest" id="notification2">&nbsp;NoInterest<br>
                            <input type="radio"   class="form-check-input" Name="notification2" id="notification2" Value="other">&nbsp;Other<br>
                        </div>
                        <div class="column" style="width:19%;">
                              <div Style="background-color: #F0F7FC;width:100%;"><b>Com Channel</b></div>
                              <input type="checkbox"  class="form-check-input" id="notification21" Value="SMS" checked>&nbsp;SMS<br>
                              <input type="checkbox"  class="form-check-input" id="notification21" Value="WhatsAPP" checked>&nbsp;WhatsAPP<br>
                              <input type="checkbox"  class="form-check-input" id="notification21" Value="WhatsAPP">&nbsp;facebook<br>
                              <input type="checkbox"   class="form-check-input" id="notification21" Value="WhatsAPP">&nbsp;TeleGram<br>
                              <input type="checkbox"  class="form-check-input" id="notification21" Value="WhatsAPP" checked>&nbsp;eMail<br>
                        </div>
                  </div>

                  <div class="row">
                        <div class="d-flex justify-content-center" style="padding-top: 10px;padding-bottom: 10px;">
                          <!--button type="button submit" class="btn btn-primary btn-sm"  onclick="qget()" value="Cancel">Discard</button-->&nbsp;
                          <button type="button" onclick="qget()" id="button" class="btn btn-primary btn-sm"  value="Submit">Save</button>
                        </div>
                  </div>


</div>

</div>     
</div>

            <!--Footer starts here-->
              <div class="footer" id="footer"><div style="display: inline-block;float:left;"> &copy;Powered by Yathu Digital Multimedia&trade;</div><div style="display: inline-block;float:right;"><i class="fa fa-lock" aria-hidden="true" style="padding-top: 10px;opacity: 0.8;">&nbsp;End-to-end encrypted</i></div></div>
            <!--Footer ends here-->
    </div><!-- content-wrap ends here-->
</body>
<script>
    $( function() {
      $( "#tabs" ).tabs();
    } );
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<script>
    function highlight(idRow){
        //console.log(idRow);
        document.getElementById(idRow).style.display = 'none';
        showUser();
        
    }
    function popupCenter(pageURL, title, w, h) {
        window.resizeBy(-300,0);
        window.moveTo(0,0); 
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,height=500,width=700, top=100, left=600');
    setTimeout(function() { targetWin.close();}, 400000);
  }

    function popupSocialMedia(pageURL, title, w, h) {
        window.resizeBy(-300,0);
        window.moveTo(0,0); 
    var targetWiny = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,height=550,width=900, top=100, left=300');
    setTimeout(function() { targetWiny.close();}, 180000);
  }
  </script>
  
  <script>
   function ajaxPOSTPauseState(str234){

    var xmlhttp = new XMLHttpRequest();
    let str22 =urlParams.get('extnum');
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       console.log(str234);
      }
    };
    xmlhttp.open("GET","pauseStatus.php?pauseStatus="+str234+"&extenu="+str22,true);
    xmlhttp.send();
    
 
   }
   function popupCenter(pageURL, title, w, h) {
        window.resizeBy(-300,0);
        window.moveTo(0,0); 
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,height=500,width=700, top=100, left=600');
    setTimeout(function() { targetWin.close();}, 400000);
  }

</script>

<script>
var Clock = {
  totalSeconds: 0,
  start: function () {
    if (!this.interval) {
        var self = this;
        function pad(val) { return val > 9 ? val : "0" + val; }
        this.interval = setInterval(function () {
          self.totalSeconds += 1;

          document.getElementById("min").innerHTML = pad(Math.floor(self.totalSeconds / 60 % 60));
          document.getElementById("sec").innerHTML = pad(parseInt(self.totalSeconds % 60));
        }, 1000);
    }
  },

  reset: function () {
    Clock.totalSeconds = null; 
    clearInterval(this.interval);
    document.getElementById("min").innerHTML = "00";
    document.getElementById("sec").innerHTML = "00";
    delete this.interval;
  },
  pause: function () {
    clearInterval(this.interval);
    delete this.interval;
  },

  resume: function () {
    this.start();
  },

  restart: function () {
     this.reset();
     Clock.start();
  }
};

$( document ).ready(function() {
    Clock.start();
});  
</script>
<script>
    function closeWindow() {
      window.self.close();
    }
</script>
<script>
function qget(){
      var CallednumberID=<?php echo $numbertocall;?>;
      var Notes = document.getElementById("Notes").value;
      var desposition = document.getElementById("desposition").value;
      var datetiming = document.getElementById("datetiming").value;
      var notification2 = document.getElementById("notification2").value;
      // (A) APPEND DATAnotification2
      var data = new URLSearchParams();
      data.append("Notes",Notes);
      data.append("desposition",desposition);
      data.append("datetiming",datetiming);
      data.append("CallednumberID",CallednumberID);
      data.append("notification2",notification2);      
// (B) URL + REDIRECT
      // USE THIS FOR TESTING IF YOU RUN A PHP SERVER
      // var url = "0-echo.php?" + data.toString();
      var url = "http://102.141.145.250/static-http/Click2dials/insert.php?" + data.toString();
      location.href = url;
 }
</script>
<script>
  $( function() {
    $( document ).tooltip();
  } );
</script>
</html>
