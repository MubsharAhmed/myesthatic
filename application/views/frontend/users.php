 <!--start main wrapper-->
 <main class="main-wrapper">
     <div class="main-content">

         <!-- <div class="row py-2">
             <div class="col-md-2 py-3">
                 <h3 class="fmon">Users</h3>
             </div>             
             <div class="col-md-2 py-3 row align-items-end justify-content-end">
                 <a href="<?php echo base_url(); ?>user/addUser " class="btn btnAdd w-100">Add User</a>
             </div>
             <div class="col-md-2">
                 <small>Filter</small>
                 <select id="dateFilter" class="form-select fsele">
                     <option value="all" selected>All</option>
                     <option value="today">Today</option>
                     <option value="this_week">This Week</option>
                     <option value="last_week">Last Week</option>
                     <option value="this_month">This Month</option>
                     <option value="last_month">Last Month</option>
                     <option value="calendar">Custom</option>
                 </select>
             </div>
             <div class="col-md-6" id="calendarPickerContainer" style="display: none;">
                 <div class="d-inline-block">
                     <small class="text-muted">From</small>
                     <input type="date" id="calendarDate" class="form-control" placeholder="From Date">
                 </div>
                 <div class="d-inline-block" style="margin-left: 10px;">
                     <small class="text-muted">To</small>
                     <input type="date" id="end_date" class="form-control" placeholder="To Date">
                 </div>
             </div>
         </div> -->
         <div class="row align-items-end">
             <div class="col-md-4 my-2">
                 <h3 class="fmon">Users</h3>
             </div>
             <div class="col-md-8 my-2">
                 <div class="row align-items-end justify-content-end">
                     <div class="col-md-4">
                         <a href="<?php echo base_url(); ?>user/addUser " class="btn btnAdd w-100">Add User</a>
                     </div>
                     <div class="col-md-3 py-0">
                         <small>Filter</small>
                         <select id="dateFilter" class="form-select fsele">
                             <option value="all" selected>All</option>
                             <option value="today">Today</option>
                             <option value="this_week">This Week</option>
                             <option value="last_week">Last Week</option>
                             <option value="this_month">This Month</option>
                             <option value="last_month">Last Month</option>
                             <option value="calendar">Custom</option>
                         </select>
                     </div>
                     <div class="col-md-5" id="calendarPickerContainer" style="display: none;">
                         <div class="d-flex align-items-center gap-1">
                             <div>
                                 <small class="text-muted">From</small>
                                 <input type="date" id="calendarDate" class="form-control" placeholder="From Date">
                             </div>
                             <div>
                                 <small class="text-muted">To</small>
                                 <input type="date" id="end_date" class="form-control" placeholder="To Date">
                             </div>
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
                                     <th>Items Checked Out</th>
                                     <th>Location</th>
                                     <th>Status</th>
                                     <th>Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- Data will be populated here by AJAX -->
                             </tbody>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     $(document).ready(function() {
         // Load all users by default
         // function loadUsers(page = 1, filter = 'all', calendarDate = null) {

         // Function to toggle user status
         function toggleUserStatus(userId, currentStatus) {
             let newStatus = currentStatus == 1 ? 0 : 1;
             let newButtonText = newStatus == 1 ? 'Suspend' : 'Suspended';
             let newButtonClass = newStatus == 1 ? 'btn-warning' : 'btn-danger';
             let newButtonTitle = newStatus == 1 ? 'Click to suspend' : 'Click to activate again';
             let alertMessage = newStatus == 1 ? 'User activated successfully!' : 'User suspended successfully!';

             $.ajax({
                 url: '<?= base_url("User/toggle_user_status"); ?>',
                 method: 'POST',
                 data: {
                     user_id: userId,
                     status: newStatus
                 },
                 dataType: 'json',
                 success: function(response) {
                     if (response.success) {
                         // Update button text and class
                         let button = $(`a[data-user-id="${userId}"]`);
                         button.text(newButtonText);
                         button.attr('title', newButtonTitle);
                         button.removeClass('btn-warning btn-danger').addClass(newButtonClass);
                         button.data('status', newStatus);

                         // Display success alert
                         alert(alertMessage);
                     } else {
                         alert('Failed to update status.');
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error('Error updating user status:', error);
                 }
             });
         }


         function loadUsers(page = 1, filter = 'all', startDate = null, endDate = null) {
             $.ajax({
                 url: '<?= base_url("User/fetch_users"); ?>',
                 method: 'POST',
                 data: {
                     page: page,
                     filter: filter,
                     // calendarDate: calendarDate
                     startDate: startDate,
                     endDate: endDate
                 },
                 dataType: 'json',
                 success: function(response) {
                     if (response.users.length > 0) {
                         let userRows = '';
                         $.each(response.users, function(index, user) {
                             let suspendButtonText = user.status == 1 ? 'Suspend' : 'Suspended';
                             let buttonClass = user.status == 1 ? 'btn-warning' : 'btn-danger';
                             let buttonTitle = user.status == 1 ? 'Click to suspend' : 'Click to activate again';

                             userRows += `<tr>
                                <td class="d-flex gap-1 align-items-center">
                                    <img class="useImage" src="${user.image ? user.image : '<?= base_url("assets/images/default.png"); ?>'}" alt="">
                                    ${user.first_name} ${user.last_name}
                                </td>
                                <td>${user.email}</td>
                                <td>${user.phone}</td>
                                <td><button class="btn btn-danger w-100">${user.item_checkout || 0}</button></td>
                                <td>${user.location_name || 'Unknown'}</td>
                                <td>${user.created_at}</td>
                                <td>
                                    <div class="dropdown">
                                        <img src="<?= base_url("assets/images/ellep.png"); ?>" alt="" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="dropdown-item toggle-status-btn ${buttonClass}" title="${buttonTitle}" data-user-id="${user.id}" data-status="${user.status}">${suspendButtonText}</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>`;
                         });
                         $('table tbody').html(userRows);

                         let paginationHTML = '';
                         if (response.pagination.total_pages > 1) {
                             for (let i = 1; i <= response.pagination.total_pages; i++) {
                                 paginationHTML += `<li class="page-item ${i === response.pagination.current_page ? 'active' : ''}">
                                    <a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                             }
                         }
                         $('#pagination').html(`<ul class="pagination">${paginationHTML}</ul>`);
                     } else {
                         $('table tbody').html('<tr><td colspan="7">No users found</td></tr>');
                     }


                     // Handle status toggle
                     $('.toggle-status-btn').click(function(e) {
                         e.preventDefault();
                         let userId = $(this).data('user-id');
                         let currentStatus = $(this).data('status');
                         toggleUserStatus(userId, currentStatus);
                     });
                 },
                 error: function(xhr, status, error) {
                     console.error('Error fetching users:', error);
                 }
             });
         }

         loadUsers();

         $('#dateFilter').change(function() {
             const filter = $(this).val();
             if (filter === 'calendar') {
                 $('#calendarPickerContainer').show();
             } else {
                 $('#calendarPickerContainer').hide();
                 loadUsers(1, filter);
             }
         });

         $('#calendarDate, #end_date').change(function() {
             const startDate = $('#calendarDate').val();
             const endDate = $('#end_date').val();
             loadUsers(1, 'calendar', startDate, endDate);
         });
         // Handle pagination
         $(document).on('click', '#pagination a', function(e) {
             e.preventDefault();
             let page = $(this).data('page');
             const filter = $('#dateFilter').val();
             const startDate = $('#calendarDate').val();
             const endDate = $('#end_date').val();
             loadUsers(page, filter, startDate, endDate);
         });



     });
 </script>