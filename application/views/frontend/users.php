 <!--start main wrapper-->
 <main class="main-wrapper">
     <div class="main-content">

         <div class="row">
             <div class="col-md-6 my-2">
                 <h3 class="fmon">Users</h3>
             </div>
             <div class="col-md-6 my-2">
                 <div class="row">
                     <div class="col-md-4">
                         <a href="<?php echo base_url(); ?>user/addUser" class="btn  btnAdd w-100">Add User</a>
                     </div>
                     <div class="col-md-4 my-1">
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Today</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="col-md-4 my-1">
                         <select name="" id="" class="form-select fsele ">
                             <option value="" selected>Filter</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
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
    function loadUsers(page = 1) {
        $.ajax({
            url: '<?= base_url("User/fetch_users"); ?>',
            method: 'POST',
            data: { page: page },
            dataType: 'json',
            success: function(response) {
                if (response.users.length > 0) {
                    let userRows = '';
                    $.each(response.users, function(index, user) {
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
                                <div class="elep p-2">
                                    <img src="<?= base_url("assets/images/ellep.png"); ?>" alt="">
                                </div>
                            </td>
                        </tr>`;
                    });
                    $('table tbody').html(userRows);
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
                    $('table tbody').html('<tr><td colspan="7">No users found</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    loadUsers();
    $(document).on('click', '#pagination a', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        loadUsers(page);
    });
});

 </script>