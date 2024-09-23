

  <main class="main-wrapper">
      <div class="main-content">


          <div class="row">
              <div class="col-md-6 my-2">
                  <h3 class="fmon">Location</h3>
              </div>
              <div class="col-md-6 my-2">
                  <div class="row">
                      <div class="col-md-4">
                          <a href="<?php echo base_url(); ?>Location/addLocation" class="btn  btnAdd w-100">Add
                              Location</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="mCard ">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Address</th>
                                  </tr>
                              </thead>
                              <tbody id="locationTableBody">                          
                              </tbody>
                          </table>
                          <nav>
                              <ul class="pagination justify-content-center" id="paginationControls">
                              </ul>
                          </nav>
                      </div>
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
        function fetchLocations(page = 1) {
            $.ajax({
                url: '<?php echo base_url("Location/getLocations"); ?>',  
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    response = JSON.parse(response);


                    var tableRows = '';
                    if (response.data.length > 0) {
                        $.each(response.data, function(index, location) {
                            tableRows += `<tr>
                                            <td>${location.name}</td>
                                            <td>${location.address}</td>
                                          </tr>`;
                        });
                    } else {
                        tableRows = '<tr><td colspan="2" class="text-center">No locations found</td></tr>';
                    }
                    $('#locationTableBody').html(tableRows);

    
                    var pagination = '';
                    if (response.total_pages > 1) {
                        for (var i = 1; i <= response.total_pages; i++) {
                            pagination += `<li class="page-item ${i == page ? 'active' : ''}">
                                              <a class="page-link" href="#" data-page="${i}">${i}</a>
                                           </li>`;
                        }
                    }
                    $('#paginationControls').html(pagination);
                }
            });
        }

        fetchLocations();


        $(document).on('click', '.page-link', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            fetchLocations(page);
        });
    });
</script>
