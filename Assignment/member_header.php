
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Music Society</title>
        <meta name="viewport" content="width=device-width, initial-
              scale=1.0" />
        <link href="member_header_format.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 14px;  
  border: none;
  outline: none;
  color: white;
  padding: 10px 16px;
  background-color: rgb(57, 157, 228);
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.show {
  display: block;
}
</style>
    <body>
        <header>
            <div class="topNavigate">
                <div class="logo">
                    <a href="member_homepage.php">
                        <image src="logo.jpg" />
                    </a>
                </div>
                <div class="menuBox">
                    <ul>
                        <li data-text="Home"><a href="member_homepage.php">Home</a></li>
                        <li data-text="Browse Event"><a href="member-browse-event.php">Browse Event</a></li>
                        <li data-text="Joined Event"><a href="member-joined-event.php">Joined Event</a></li>
                        <li data-text="profile"><a href="member-feedback.php">Feedback</a></li>
                        <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()">Welcome<br /><?php echo $username;?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="userprofile.php">Profile</a>
                            <a href="changepassword.php">Change Password</a>
                            <a href="logout.php">Logout</a>
                        </div>
                        </div> 
                        </div>
                    </ul>
                </div>
                
            </div>
            
        </header>
    </body>
    <script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</html>

