<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="services.js"></script>
<title>Service Providers</title>
<script>
function timeSlot() {
	var popup = document.getElementById("popUp");
	popup.classList.toggle("show");
	}
</script>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
	
	.checked {
        color: orange;
    }
	
 </style> 
 </head>
 <body>
 </br>
</br>
 </br>
</br>
  <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <a href="https://google.com" style="color:#660033"><b>Home Service</b><img src="icon.png" style="height:50px;"></a>
                    
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right" id="tabs">
                      <li><a href="http://qav2.cs.odu.edu/abel/DomHack/colorlib-regform-1/providerRegistration.html">Become a Professional</a></li>
                      <li><a href="http://qav2.cs.odu.edu/abel/DomHack/Login_v10/index.html">Logout</a></li>
                      <li><a href="">Blog</a></li>
                    </ul>
                  </div>
    </div>
</nav>
   <table>
   <tr>
	   <th>Name</th>
	   <th>Service</th>
	   <th>Rating</th>
     <th>Pick Time</th>
     <th>Pick Date</th>
	   <th>Book a Service</th>
	 </tr>

   <?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    include_once "services/services.php";
   
   // display all the services
    $webService = new webService();
    $providersResult = $webService -> fetchAllProviders();
    $providers = json_decode($providersResult, true);
    //var_dump($providers["providers"][0]["email"]);
   
    foreach($providers["providers"] as $i => $item) {
        echo "<tr>";
        echo "<td>" . $providers["providers"][$i]["name"] . "</td>";
        echo "<td>" . $providers["providers"][$i]["service"] . "</td>";
        
        if($providers["providers"][$i]["reviewPoints"] == 0 ) {

          echo "<td> <span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span></td>";

        } else if ($providers["providers"][$i]["reviewPoints"] == 1) {

          echo "<td> <span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span></td>";

        } else if ($providers["providers"][$i]["reviewPoints"] == 2)
        { 
          echo "<td> <span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span></td>";
        } else if ($providers["providers"][$i]["reviewPoints"] == 3) {

          echo "<td> <span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star unchecked'></span>";
          echo "<span class='fa fa-star unchecked'></span></td>";
        } else if ($providers["providers"][$i]["reviewPoints"] == 4) {

          echo "<td> <span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star unchecked'></span></td>";
        } else if ($providers["providers"][$i]["reviewPoints"] >= 5) {

          echo "<td> <span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span></td>";
        } 


          echo "<td><input id='" . $providers["providers"][$i]["id"] . "time" .  "' type='time' /></td>";
          echo "<td><input id='" . $providers["providers"][$i]["id"] . "date" .  "' type='date' /></td>";
          echo "<td><button class='bookButton' value='"  . $providers["providers"][$i]["email"] . "|" . $providers["providers"][$i]["id"] . "'>Book</button></td>"; 
          echo "<input id='serviceName' type='hidden' value = '" . $providers["providers"][$i]["service"] . "' />";
          echo "</tr>";




    }
    
   ?>
   
   </table>
   </body>   