<!DOCTYPE html>
<html>
<head>
  <title>User Location</title>
  <script>
    // Function to get user's location
    function getUserLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    // Function to show user's position
    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      // Fill the textbox with user's location
      document.getElementById("location").value = latitude + ", " + longitude;
    }
  </script>
</head>
<body>
  <h2>User Location</h2>
  <button onclick="getUserLocation()">Get Location</button>
  <br><br>
  <label for="location">Location:</label>
  <input type="text" id="location" readonly>
</body>
</html>
