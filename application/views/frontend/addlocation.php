  <!--start main wrapper-->

  <script>
      function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                  lat: 33.6824444,
                  lng: 72.99091609999999
              },
              zoom: 11
          });

          var input1 = document.getElementById('locationAddress');
          var autocomplete1 = new google.maps.places.Autocomplete(input1);
          autocomplete1.bindTo('bounds', map);

          autocomplete1.setFields(['address_components', 'geometry', 'icon', 'name']);

          var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
          });

          autocomplete1.addListener('place_changed', function() {
              marker.setVisible(false);
              var place = autocomplete1.getPlace();
              if (!place.geometry) {
                  swal({
                      title: "Error!",
                      text: "Please enter a valid address using the suggestions.",
                      icon: "error",
                      button: "OK",
                  });
                  return;
              }

              if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
              } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);
              }

              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var latitude = place.geometry.location.lat();
              var longitude = place.geometry.location.lng();

              document.getElementById("lat").value = latitude;
              document.getElementById("lng").value = longitude;
          });
      }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe_Fm2ja1OuDHswu4mgZKQN9DRakGyzzs&libraries=places&callback=initMap" async defer></script>

  <!--start main wrapper-->
  <main class="main-wrapper">
      <div class="main-content">
          <div id="map" class="hidden"></div>

          <h3 class="fmon">Add Location</h3>

          <div class="row my-2">
              <div class="col-md-6 my-2">
                  <label class="slabel">Location Name</label>
                  <input type="text" class="form-control fsele" name="name" id="locationName" placeholder="Write Here" required>
              </div>
              <div class="col-md-6 my-2">
                  <label class="slabel">Location Address</label>
                  <input type="text" class="form-control fsele" name="address" id="locationAddress" placeholder="Write Here" required>
                  <input class="form-control fsele" type="hidden" name="lat" id="lat" placeholder="Latitude" required />
                  <input class="form-control fsele" type="hidden" name="lng" id="lng" placeholder="Longitude" required />
              </div>

              <div class="col-md-12 my-2">
                  <div class="d-flex justify-content-center align-items-center w-100">
                      <button type="button" class="btn btn-primary btnAdd w-25">Add Location</button>
                  </div>
              </div>
          </div>



      </div>
  </main>



  <!--start overlay-->
  <div class="overlay btn-toggle"></div>
  <!--end overlay-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.btnAdd').on('click', function(e) {
              e.preventDefault();

              var locationName = $('#locationName').val();
              var locationAddress = $('#locationAddress').val();
              var lat = $('#lat').val();
              var lng = $('#lng').val();

              var missingFields = [];


              if (locationName === "") {
                  missingFields.push("<strong>Location Name</strong>");
              }

              if (locationAddress === "") {
                  missingFields.push("<strong>Location Address</strong>");
              }

              // Check if any fields are missing
              if (missingFields.length > 0) {
                  swal({
                      title: "Error!",
                    //   text: "Please fill out the following field(s): " + missingFields.join(", "),
                      icon: "error",
                      button: "OK",
                      content: {
                          element: "p",
                          attributes: {
                              innerHTML: "Please fill out the following field: " + missingFields.join(", "),
                          },
                      },
                  });
                  return;
              }

              if (lat === "" || lng === "") {
                  swal({
                      title: "Error!",
                      text: "Please enter a valid address using the suggestions.",
                      icon: "error",
                      button: "OK",
                  });
                  return;
              }

              $.ajax({
                  url: '<?php echo base_url("Location/addLocations"); ?>',
                  type: 'POST',
                  data: {
                      name: locationName,
                      address: locationAddress,
                      lat: lat,
                      lng: lng
                  },
                  success: function(response) {
                      response = JSON.parse(response);
                      if (response.status === 'success') {
                          swal({
                              title: "Success!",
                              text: "Location Added successfully",
                              icon: "success",
                              button: "OK",
                          });

                          // Clear input fields after successful addition
                          $('#locationName').val('');
                          $('#locationAddress').val('');
                          $('#lat').val('');
                          $('#lng').val('');
                      } else {
                          swal({
                              title: "Error!",
                              text: 'Failed to add location: ' + response.message,
                              icon: "error",
                              button: "OK",
                          });
                      }
                  },
                  error: function(xhr, status, error) {
                      alert('An error occurred: ' + error);
                  }
              });
          });

      });
  </script>