<style>
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .loader .spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="loader" style="display: none;">
    <div class="spinner"></div>
</div>

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!-- <div class="row py-2">
            <div class="col-md-2 py-3">
                <h3 class="fmon">Patients</h3>
            </div>
            <div class="col-md-2 py-3">
                <a href="<?php echo base_url(); ?>patient/addPatient" class="btn  btnAdd w-100">Add Patient</a>
            </div>
            <div class="col-md-2 py-3">
                <label for="csv" class="btn btnAdd w-100">Upload CSV</label>
                <input type="file" accept=".csv" id="csv" class="d-none">
            </div>
            <div class="col-md-2">
                <small>Filter</small>
                <select id="dateFilter" class="form-select fsele">
                    <option value="all" selected>All Dates</option>
                    <option value="today">Today</option>
                    <option value="this_week">This Week</option>
                    <option value="last_week">Last Week</option>
                    <option value="this_month">This Month</option>
                    <option value="last_month">Last Month</option>
                    <option value="calendar">Custom Date</option>
                </select>
            </div>
            <div class="col-md-4" id="calendarPickerContainer" style="display: none;">
                <div class="d-inline-block">
                    <small>From</small>
                    <input type="date" id="fromDate" class="form-control" placeholder="From Date">
                </div>
                <div class="d-inline-block" style="margin-left: 10px;">
                    <small>To</small>
                    <input type="date" id="toDate" class="form-control" placeholder="To Date">
                </div>
            </div>
        </div> -->
        <div class="row align-items-center py-2">
            <!-- Left: Patients heading -->
            <div class="col-md-2 pt-3">
                <h3 class="fmon">Patients</h3>
            </div>

            <!-- Right: Add Patient, Upload CSV, Filter, Calendar -->
            <div class="col-md-10">
                <div class="row align-items-center justify-content-end">
                    <div class="col-md-2 pt-3">
                        <a href="<?php echo base_url(); ?>patient/addPatient" class="btn btnAdd w-100">Add Patient</a>
                    </div>
                    <div class="col-md-2 pt-3">
                        <label for="csv" class="btn btnAdd w-100">Upload CSV</label>
                        <input type="file" accept=".csv" id="csv" class="d-none">
                    </div>
                    <div class="col-md-2">
                        <small>Filter</small>
                        <select id="dateFilter" class="form-select fsele">
                            <option value="all" selected>All Dates</option>
                            <option value="today">Today</option>
                            <option value="this_week">This Week</option>
                            <option value="last_week">Last Week</option>
                            <option value="this_month">This Month</option>
                            <option value="last_month">Last Month</option>
                            <option value="calendar">Custom Date</option>
                        </select>
                    </div>
                    <div class="col-md-5" id="calendarPickerContainer" style="display: none;">
                        <div class="d-inline-block">
                            <small>From</small>
                            <input type="date" id="fromDate" class="form-control" placeholder="From Date">
                        </div>
                        <div class="d-inline-block ms-2">
                            <small>To</small>
                            <input type="date" id="toDate" class="form-control" placeholder="To Date">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="mCard  ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date of birth</th>
                                    <th>Location</th>
                                    <th>Procedures</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div id="pagination" class="pagination-container"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!--end main wrapper-->
<!--start overlay-->
<div class="overlay btn-toggle"></div>
<!--end overlay-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <a class="text-black" href="<?php echo base_url(); ?>general/procedureReports">View</a> -->

<script>
    $(document).ready(function() {
        function loadPatients(page = 1, filter = 'all', fromDate = null, toDate = null) {
            $.ajax({
                url: '<?= base_url("Patient/fetch_patients"); ?>',
                method: 'POST',
                data: {
                    page: page,
                    filter: filter,
                    fromDate: fromDate,
                    toDate: toDate
                },
                dataType: 'json',
                success: function(response) {
                    if (response.patients.length > 0) {
                        let patientRows = '';
                        $.each(response.patients, function(index, patient) {
                            patientRows += `<tr>
                            <td>${patient.name ? patient.name : (patient.first_name + ' ' + patient.last_name)}</td>
                            <td>${patient.email}</td>
                            <td>${patient.phone}</td>
                            <td>${patient.dob}</td>
                            <td>${patient.location || 'Unknown'}</td>
                            <td class="fw-bold text-black">Nill</td>
                            <td>
                                <div class="elep p-2">
                                    <img src="<?= base_url("assets/images/ellep.png"); ?>" alt="">
                                </div>
                            </td>
                        </tr>`;
                        });
                        $('table tbody').html(patientRows);

                        // Pagination
                        let paginationHTML = '';
                        if (response.pagination.total_pages > 1) {
                            for (let i = 1; i <= response.pagination.total_pages; i++) {
                                paginationHTML += `<li class="page-item ${i === response.pagination.current_page ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                            }
                        }
                        $('#pagination').html(`<ul class="pagination">${paginationHTML}</ul>`);
                    } else {
                        $('table tbody').html('<tr><td colspan="7">No patients found</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching patients:', error);
                }
            });
        }

        loadPatients();

        $('#dateFilter').change(function() {
            const filter = $(this).val();
            if (filter === 'calendar') {
                $('#calendarPickerContainer').show();
            } else {
                $('#calendarPickerContainer').hide();
                loadPatients(1, filter);
            }
        });

        $('#fromDate, #toDate').change(function() {
            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();
            if (fromDate && toDate) {
                loadPatients(1, 'calendar', fromDate, toDate);
            }
        });

        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            let page = $(this).data('page');
            loadPatients(page, $('#dateFilter').val(), $('#fromDate').val(), $('#toDate').val());
        });

        // CSV Upload Functionality
        $('#csv').change(function(e) {
            var file = e.target.files[0];
            if (!file || file.type !== 'text/csv') {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type!',
                    text: 'Please upload a valid CSV file.',
                });
                return;
            }
            var formData = new FormData();
            formData.append('csv', file);
            $('body').addClass('loading');
            $('.loader').show();
            $.ajax({
                url: '<?= base_url("Patient/upload_csv"); ?>',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: result.message,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading CSV:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong while uploading the CSV.',
                    });
                },
                complete: function() {
                    $('body').removeClass('loading');
                    $('.loader').hide();
                }
            });
        });
    });
</script>