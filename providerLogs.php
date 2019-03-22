<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="services.js"></script>
<title>SEVVA</title>
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

    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
                    <a href="http://qav2.cs.odu.edu/abel/DomHack/services.php" style="color:#660033"><b>SEVAA</b><img src="icon.png" style="height:50px;"></a>
                    
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
	   <th>View</th>
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
    $_SESSION["providers"] = $providers["providers"];
   
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


          // echo "<td><input id='" . $providers["providers"][$i]["id"] . "time" .  "' type='time' /></td>";
          // echo "<td><input id='" . $providers["providers"][$i]["id"] . "date" .  "' type='date' /></td>";
          echo "<td><button id='myBtn' class='viewButon' value='"  . $providers["providers"][$i]["email"] . "|" . $providers["providers"][$i]["id"] . "'>View</button></td>"; 
          echo "<input id='serviceName' type='hidden' value = '" . $providers["providers"][$i]["service"] . "' />";
          echo "</tr>";




    }
    
   ?>
   
   </table>

   <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php 

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<th>Name:</th>";
    echo "<td>" . $providers["providers"][0]["name"] . "</td>";
    echo "</tr>";
  echo "<tr>";
    echo "<th>Service:</th>";
    echo "<td>" . $providers["providers"][0]["service"] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<th>Rating:</th>";
  echo "<td>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
          echo "<span class='fa fa-star checked'></span>";
  echo "</td>";
  echo "<tr>";
    echo "<th>Appointment Time:</th>";
    echo "<td>12:30 PM</td>";
  echo "</tr>";
  echo "<tr>";
    echo "<th>Appointment Date:</th>";
    echo "<td>12/24/2020";
  echo "</tr>";

    ?>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
   </body>   