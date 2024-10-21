<main class="main-wrapper">
    <div class="main-content">


        <div class="row">
            <div class="col-md-10 my-2">
                <h3 class="fmon">Location</h3>
            </div>
            <div class="col-md-2 my-2">
                <div class="row">
                    <div class="col-md-12">
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
                                    <th>Actions</th> <!-- New column for actions -->
                                </tr>
                            </thead>
                            <tbody id="locationTableBody"></tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center" id="paginationControls"></ul>
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
        // Fetch locations and populate the table
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
                                        <td>
                                            <button class="btn btn-danger delete-location" data-id="${location.id}">Delete</button>
                                        </td>
                                      </tr>`;
                        });
                    } else {
                        tableRows = '<tr><td colspan="3" class="text-center">No locations found</td></tr>';
                    }
                    $('#locationTableBody').html(tableRows);

                    // Pagination controls
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
        fetchLocations(); // Initial fetch

        // Handle pagination click
        $(document).on('click', '.page-link', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            fetchLocations(page);
        });

        // Handle delete button click
        $(document).on('click', '.delete-location', function() {
            var locationId = $(this).data('id');
            if (confirm('Are you sure you want to delete this location?')) {
                $.ajax({
                    url: '<?php echo base_url("Location/deleteLocation"); ?>',
                    type: 'POST',
                    data: {
                        id: locationId
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.success) {
                            alert('Location deleted successfully!');
                            fetchLocations(); // Reload locations after deletion
                        } else {
                            alert('Failed to delete the location.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting the location.');
                    }
                });
            }
        });
    });
</script>