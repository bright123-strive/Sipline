<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>iCall</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no"/>
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
        <meta name="apple-mobile-web-app-capabale" content="yes"/>
        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
        <meta http-equiv="Expires" content="0"/>

        
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/Normalize/normalize-v8.0.1.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/fonts/font_roboto/roboto.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/fonts/font_awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-ui.min.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="https://dtd6jl0d42sve.cloudfront.net/lib/Croppie/Croppie-2.6.4/croppie.css"/>
        <link rel="stylesheet" type="text/css" href="phone.css"/>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery.md5-min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/Chart/Chart.bundle-2.7.2.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/SipJS/sip-0.20.0.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/FabricJS/fabric-2.4.6.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/Moment/moment-with-locales-2.24.0.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/Croppie/Croppie-2.6.4/croppie.min.js"></script>
        <script type="text/javascript" src="https://dtd6jl0d42sve.cloudfront.net/lib/XMPP/strophe-1.4.1.umd.min.js"></script>
        <script type="text/javascript" src="phone.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script type="text/javascript">
            // Provision runtime options can go here.
            var phoneOptions = {loadAlternateLang: true}
            var web_hook_on_transportError = function(t, ua){}
            var web_hook_on_register = function(ua){}
            var web_hook_on_registrationFailed = function(e){}
            var web_hook_on_unregistered = function(){ }
            var web_hook_on_invite = function(session){}
            var web_hook_on_message = function(message){}
            var web_hook_on_modify = function(action, session){}
            var web_hook_on_dtmf = function(item, session){}
            var web_hook_on_terminate = function(session){}
        </script>

<style>html,body{margin: auto;padding: 0px;zoom: 95%;/*overflow: hidden;*/font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #333;}#banner-wrap{height: 10%;width: 100%;background-repeat: repeat-x;background-color:  dodgerblue;padding:40px;padding-top: 3px;} #content-wrap{width: 60%;height: 80%;margin-right: 35%;margin-left: 3%;margin-top: 0.5%;font-size: 11px;} #content{margin-top: 20px;border: 1px solid #b7c7cf;border-radius:3px;}#nav-wrap{height: 26%;border: 1px solid #d1c7a3;border-radius:3px;} #spacer{clear: both;}#footer{margin-top: 2%;border-top-width: 1px;border-top-style: solid;border-top-color: #D1C7A3;border-right-color: #D1C7A3;border-bottom-color: #D1C7A3;border-left-color: #D1C7A3;line-height: 30px;}
    div.bluV {
    position: absolute;
    right: 2%;
    top: 2%;
    width: 34%;
    height: 86%;
    border: 1px solid #b7c7cf;
    border-radius:3px;
    }
    .inv {
        display: none;
    }

    #tableA tr:hover {
    background-size:  100% 100%;
    transform:scale(1.01,1.34);
    transform-origin:center;
    background-color: #edf7fe;
    
    }
    #tableA2 {
    border: none;
    }
    /* Style the tab */
    .tab {
      top:4%;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 6px 8px;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }
    a {color: white;}a:link {text-decoration: none;}a:visited {text-decoration: none;}a:hover {text-decoration: underline;}a:active{text-decoration: underline;}
    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 10px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
    }
  
    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }
   
    @keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }
.column {
	  float: left;
      height: 100%;
	  border: 4px solid white; 
	}
  .column1 {
	  float: left;
      height: 100%; 
	}
  #logo{
    height: 40px;
    width: 96px;
    float: left;
    background-image: url("../../img/module_table_bottom.png");
  }
.pbox {
    border: 2px solid;
    border-color:dodgerblue;
    text-align: left;
    vertical-align: middle;
}
.pbox:hover {
  border-color:  rgba(82,168,236,.8);
  box-shadow: 0 0px 0px rgba(82,168,236,.8) inset, 0 0 8px rgba(82,168,236,.8);
  outline: 0 none;
}
  .icon {
    width:32px;
    height:40px;
    position:relative;
    background:white;
  }
  
  .notification-count{
      position:absolute;
      top:0;
      right:0;
      height:13px;
      line-height:13px;
      padding:1px 3px;
      background-color:red;
      color:white;
      border-radius:4px;
      font-size: 0.6875em;
  }
  .fa-2x{
    font-size: 1.35em;
  }
</style>
</head>
<body style="background-color: white;" oncontextmenu="return false">

      <div class="content-wrap" id="content-wrap">
            <div class="bluV">
                <!-- Loading Animation for the phone -->
                  <!--Actual Phone-->
                <div id=Phone></div>
            </div>
            <!-- <div class="nav-wrap" id="nav-wrap">
                  <div class="column" style="background-color:#fff;width: 15%;">
                    <div id="table_div"></div>
                  </div>
                  <div class="column" style="background-color:#ccc;width: 0.5%;">
                  </div>
                  <div class="column" style="background-color:#ccc;width: 48.6%;">
                    <div id="columnchart_material" style="width:100%; height:100%;"></div>
                  </div>
                 <div class="column" style="background-color:#ccc;width: 1%;">

                  </div>

                  <div class="column" style="background-color:#ccc;width: 34.4%;">
                    <div id="donutchart" style="width:100%; height:100%"></div>
                  </div>
            </div> -->
            <!-- Contents starts here-->
            <br>
            <a href="agentdashboard.php" class="btn btn-success btn-lg">Go back to Dashboard</a>

            <div class="content" id="content">
                
            <div id="tabs">
                <ul>
                      <li><a href="#tabs-1">Click2Dial</a></li>
                      <li id="ChangeME" ><a href="#tabs-2">CallBacks</a></li>
                      <li><a href="#tabs-3">Scripts</a></li>
                      <table style="height:4.5%;width: 10%;text-align: left;font-size: 11px;" align="right" border="0">
                        <tr>
                            <td><i class="fa fa-2x" aria-hidden="true"  style='color:green;padding: 4px;'><span id="min">00</span>:<span id="sec">00</span></i></td>
                        </tr>
                      </table>
                </ul>
                <div id="tabs-1">
                      <div class='Row' style='display: table;width: 100%;table-layout: fixed;border-spacing: 1px;margin: auto;'>
                        <h4>
                        <b>
                            <div class ='column' style='padding-top:2px;padding-bottom: 2px;width: 65%;padding-left: 0px;opacity: 0.7;'>
                              <table border='0' style="width:100%;">
				<tr><td style="width:85%;background-color:dodgerblue;"><script>
                                var sessionValue = urlParams.get('campgn');
                                var sessionValue1 = sessionValue.toUpperCase();
                                document.write(sessionValue1);
                              </script>&nbsp;</td>
			        <td>&nbsp;</td></tr>
			    </table>
                            </div>
                           
                            <div class ='column' style='width: 13%;'>
                                <select onchange="ajaxPOSTPauseState(this.value);Clock.restart()" class='pbox rounded'  name='PauseStatus'  style='width:12%;right:22px;position: absolute;background-color:#fff;'>
                                    <option value='Available'>Available</option>
                                    <option value='TeaBreak'>TeaBreak</option>
                                    <option value='LunchBreak'>LunchBreak</option>
                                    <option value='Bathroom'>Bathroom</option>
                                    <option value='Meeting'>Meeting</option>
                                    <option value='Admin'>Admin</option>
                                </select>
                            </div>
                        </b>
                        </h4>
                    </div>
                    <div id="txtHint"></div>
                </div>
                <div id="tabs-2">
                <div class='Row' style='display: table;width: 100%;table-layout: fixed;border-spacing: 1px;margin: auto;'>
                        <h4>
                        <b>
                            <div class ='column' style='padding-top:2px;padding-bottom: 2px;width: 65%;padding-left: 0px;background-color:dodgerblue;opacity: 0.7;'>
                              <script>
                                var sessionValue = urlParams.get('campgn');
                                var sessionValue1 = sessionValue.toUpperCase();
                                document.write(sessionValue1);
                              </script>&nbsp;Campaign
                            </div>
                            <div class ='column' style='width: 20%;'>
                              <table border="0" align="right" style="width:100%;">
                                <tr>
                                  <td>
                                    <div class="col-sm small">
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/socialMediaPop.php?tbl=whatsapp&user=henuteka");'>
                                            <i class="fa fa-whatsapp fa-2x" aria-hidden="true" style='color:#25D366;padding: 0px;'></i>
                                            <span class="notification-count">3</span> 
                                        </div>
                                      </a>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="col-sm small"></div>
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/facebook.php?tbl=facebook&user=henuteka");'>
                                          <i class="fa fa-facebook fa-2x" aria-hidden="true" style='color:#4267B2;padding: 1px;'></i>
                                          <span class="notification-count">16</span> 
                                        </div>
                                      </a>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="col-sm small">
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/socialMediaPop.php?tbl=instagram&user=henuteka");'>
                                            <i class="fa fa-instagram fa-2x" aria-hidden="true" style='color:#8a3ab9;padding: 0px;'></i>
                                            <span class="notification-count">9</span> 
                                          </div>
                                      </a>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="col-sm small">
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/socialMediaPop.php?tbl=twitter&user=henuteka");'>
                                            <i class="fa fa-twitter fa-2x" aria-hidden="true" style='color:#1DA1F2;padding: 0px;'></i>
                                            <span class="notification-count">7</span> 
                                          </div>
                                      </a>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="col-sm small">
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/socialMediaPop.php?tbl=telegram&user=henuteka");'>
                                            <i class="fa fa-telegram fa-2x" aria-hidden="true" style='color:#8a3ab9;padding: 0px;'></i>
                                            <span class="notification-count">4</span> 
                                          </div>
                                      </a>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="col-sm small">
                                      <a href="#">
                                        <div class="icon" id="icon1" onclick='popupSocialMedia("../social/socialMediaPop.php?tbl=emails&user=henuteka");'>
                                            <i class="fa fa-envelope fa-2x" aria-hidden="true" style='color:blue;padding: 0px;'></i></a>
                                            <span class="notification-count">167</span> 
                                          </div>
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                              </table>
            
                            </div>
                            <div class ='column' style='width: 13%;'>
                            </div>
                        </b>
                        </h4>
                    </div>
                     <div id="txtHint2"></div>

                </div>
                <div id="tabs-3">
                </div>
            </div>     
</div>

            <!--Footer starts here-->
   
            <!--Footer ends here-->
    </div><!-- content-wrap ends here-->
</body>
<script type="text/javascript" charset="utf-8">
//setInterval(function(){
    //console.log('Clicked');
  //},10000);
//clickto dial query
  function showUser() {
    var xmlhttp = new XMLHttpRequest();xmlhttp.onreadystatechange = function() {  if (this.readyState == 4 && this.status == 200) {document.getElementById("txtHint").innerHTML = this.responseText;}};const queryString = window.location.search; const urlParams = new URLSearchParams(queryString); let str =urlParams.get('campgn');
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
// PERIODIC QUERY CALLBACKS
function showUserCallBack() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint2").innerHTML = this.responseText;
      }
    };
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString); 
    let str =urlParams.get('campgn');
    xmlhttp.open("GET","getuserCallBack.php?q="+str,true);
    xmlhttp.send();
  }
  window.onload = showUser();
  function resetTimer(){
      showUser();
  }
  setInterval(function(){
    showUserCallBack();
  },20000);
    
</script>
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
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,height=538,width=700, top=100, left=600');
    setTimeout(function() { targetWin.close();}, 400000);
  }

    function popupSocialMedia(pageURL, title, w, h) {
        window.resizeBy(-300,0);
        window.moveTo(0,0); 
    var targetWiny = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,height=550,width=900, top=100, left=300');
    setTimeout(function() { targetWiny.close();}, 180000);
  }
  function callUser(h){
    //call.php?exten=SIP/henuteka&number="00265".$c0
          const queryString = window.location.search;
          const urlParams = new URLSearchParams(queryString); 
          let str =urlParams.get('make');
          var data = new URLSearchParams();
          data.append("exten", "SIP/"+str);
          data.append("number", h);
          var url = "call.php?" + data.toString();
      // (B2) AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url);
      xhr.onload = function () {
        console.log(this.response);
      };
      xhr.send();
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php include("graph1.php");?>
<script type="text/javascript">
google.charts.load('current', {
  packages: ['corechart', 'bar']
});

google.charts.setOnLoadCallback(drawStacked);
setInterval(drawStacked, 10000);
function drawStacked() {
  var myData =<?php echo $graph1;?>;
  var data = google.visualization.arrayToDataTable(myData);

  var options = {
        title: 'Monthly Relative PS Report',
        chartArea: {
          width: '60%'
        },
        isStacked: true,
        hAxis: {
          title: 'Sec',
          minValue: 0,
        },
        vAxis: {
          title: 'Status'
        },
        animation: {
                startup: true,
                duration: 1000
        }
  };
  var chart = new google.visualization.BarChart(document.getElementById('columnchart_material'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'KPI');
        data.addColumn('number', 'Value');
        data.addRows([
          ['Dial Agr',  {v:<?php echo (int)$tablev[0];?>}],
          ['AvgWT',   {v:<?php echo (int)$tablev[1];?>}],
          ['SUCCF',   {v:<?php echo (int)$tablev[2];?>}],
          ['FAILED',   {v:<?php echo (int)$tablev[3];?>}]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: false, width: '100%', height: '100%'});
      }
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $graph2;?>);

        var options = {
          pieHole: 0.3,
          chartArea:{left:3,top:5,width:'90%',height:'90%'},
          legend: {
            alignment: 'center'
        },
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</html>
