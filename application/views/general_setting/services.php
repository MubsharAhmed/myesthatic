<style>
    .card {
        /* border: 1px solid gray; */
        padding: 20px;
    }

    .card img {
        /* border: 1px solid gray; */
        padding: 5px;
        /* background-color: black; */
    }

    .service-list {
        background-color: white;
    }

    .hr1 {
        border-top: .5px solid black;

        width: 500px;
    }

    .hr2 {
        border: 1px solid black;
        /* padding-top: 30px;
        padding-bottom: 30px; */
        width: 100%;
    }

    .d-flex {
        display: flex;
    }

    .flex-column {
        flex-direction: column;
    }

    .d-block {
        display: block;

    }

    .mx-auto {
        margin-inline: auto;
    }

    .justify-content-center {
        justify-content: center;
    }

    .w-100 {
        width: 100%;
        border-radius: 10px;
    }

    .bg {
        background-color: black;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Services</h1>
    </section>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>


    <section class="content">
        <div class="row">
            <!-- Static Section -->
            <div class="col-md-12">
                <h3>Static Section</h3>
                <form action="<?= base_url('general/updateStaticSection') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="static_title" class="form-control" value="<?= isset($staticSection->title) ? $staticSection->title : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="static_description" class="form-control" rows="12"><?= isset($staticSection->description) ? $staticSection->description : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group d-flex flex-column">
                                <label>Image</label>
                                <?php if (isset($staticSection->image)): ?>
                                    <img src="<?= base_url('uploads/services/' . $staticSection->image) ?>" alt="Image" class="img-thumbnail d-block mx-auto img-fluid">
                                <?php endif; ?>
                                <input type="file" name="image" class="form-control">

                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px;">Update Static Section</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end static section -->
            <!-- Service Type Management -->
            <div class="container">
                <h2>Manage Service Types</h2>

                <!-- Form for Adding New Service Type -->
                <div class="row">
                    <div class="col-md-6">
                        <h4>Add New Service Type</h4>
                        
                        <form method="post" action="addServiceType">
                            <div class="form-group">
                            <label for="name">Add Service Type</label>
                                <input type="text" name="name" class="form-control" placeholder="New Service Type Name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Service Type</button>
                        </form>
                    </div>

                    <!-- Form for Updating Existing Service Type -->
                    <div class="col-md-6">
                        <h4>Update Existing Service Type</h4>
                        <form method="post" action="updateServiceType">
                            <div class="form-group">
                                <label for="service_type">Select Service Type</label>
                                <select name="service_type_id" class="form-control" required>
                                    <option value="" disabled selected>Select Service Type</option>
                                    <?php foreach ($service_types as $type): ?>
                                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="new_name" class="form-control" placeholder="New Service Type Name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update Service Type</button>
                        </form>
                    </div>
                </div>

                <!-- Form for Deleting Service Type -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4>Delete Service Type</h4>
                        <form method="post" action="deleteServiceType" onsubmit="return confirmDeletion(event)">
                            <div class="form-group">
                                <label for="service_type_to_delete">Select Service Type to Delete</label>
                                <select name="service_type_id" id="service_type_to_delete" class="form-control" required>
                                    <option value="" disabled selected>Select Service Type</option>
                                    <?php foreach ($service_types as $type): ?>
                                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Delete Service Type</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function confirmDeletion(event) {
                    var serviceTypeId = document.getElementById('service_type_to_delete').value;

                    // Check if the selected ID is 1, 2, or 3 (undeletable)
                    if (['1', '2', '3'].includes(serviceTypeId)) {
                        alert('You are not allowed to delete First 3 service types.');
                        return false;
                    }

                    if (!serviceTypeId) {
                        alert('Please select a service type to delete.');
                        return false;
                    }

                    var shouldDelete = false;

                    // Perform AJAX request to check if the service type is in use
                    $.ajax({
                        url: 'checkServiceTypeUsage/' + serviceTypeId,
                        type: 'GET',
                        dataType: 'json',
                        async: false,
                        success: function(response) {
                            if (response.usage_count > 0) {
                                alert('Please delete associated services before deleting this service type.');
                            } else {
                                shouldDelete = confirm('Are you sure you want to delete this service type?');
                            }
                        },
                        error: function() {
                            alert('Error checking service type usage.');
                        }
                    });

                    return shouldDelete;
                }
            </script>



            <hr class="hr2">

            <!-- Add Services Button -->
            <div class="text-center">
                <button class="btn btn-primary" style="margin-top:40px" data-toggle="modal" data-target="#serviceModal" onclick="openServiceModal1()">Add Services &nbsp;&nbsp;<span class="fa fa-plus"></span></button>
            </div>

            <!-- Consulting Services Section -->
            <?php if (!empty($service_types) && !empty($services)): ?>
                <?php
                $services_by_type = [];
                foreach ($services as $service) {
                    if (isset($service['service_type_id'])) {
                        $services_by_type[$service['service_type_id']][] = $service;
                    }
                }
                ?>
                <?php foreach ($service_types as $type): ?>
                    <div class="col-md-12 text-center">
                        <h3><?php echo htmlspecialchars($type['name']); ?></h3>
                        <div class="service-list">
                            <?php if (isset($services_by_type[$type['id']])): ?>
                                <?php foreach ($services_by_type[$type['id']] as $service): ?>
                                    <div class="card">
                                        <img src="<?= base_url('uploads/services/' . htmlspecialchars($service['icon_img1'])); ?>" width="300" alt=""><br>
                                        <img class="bg" src="<?= base_url('uploads/services/' . htmlspecialchars($service['icon_img2'])); ?>" width="80" alt="">
                                        <h4><?= htmlspecialchars($service['title']); ?></h4>
                                        <p><?= htmlspecialchars($service['description']); ?></p>
                                        <button class="btn btn-warning fa fa-edit" onclick="openServiceModal(<?= htmlspecialchars($service['id']); ?>, '<?= htmlspecialchars($type['name']); ?>')"></button>
                                        <button class="btn btn-danger fa fa-trash" onclick="deleteService(<?= htmlspecialchars($service['id']); ?>)"></button>
                                        <hr class="hr1">
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No services available for this type.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p>No service types or services available.</p>
            <?php endif; ?>

            <!-- Modal for Adding/Editing Services -->
            <div id="serviceModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="updateService" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="service_id">
                            <div class="modal-header">
                                <h4 class="modal-title" id="serviceModalTitle">Add/Edit Service</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <!-- Dynamic Service Type Selection -->
                                <div class="form-group">
                                    <label>Service Type</label>
                                    <select name="service_type_id" id="service_type" class="form-control">
                                        <?php foreach ($service_types as $type): ?>
                                            <option value="<?= $type['id']; ?>"><?= $type['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="service_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="service_description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="icon_img1" id="service_icon_img1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Upload Icon</label>
                                    <input type="file" name="icon_img2" id="service_icon_img2" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>



<script>
    function openServiceModal1(serviceType) {
        document.getElementById('service_type').value = serviceType;
        document.getElementById('service_id').value = '';
        document.getElementById('service_title').value = '';
        document.getElementById('service_description').value = '';
        document.getElementById('service_icon_img1').value = '';
        document.getElementById('service_icon_img2').value = '';
    }

    function openServiceModal(serviceId = null, serviceType = 'consulting') {
        $('#serviceModalTitle').text(serviceId ? 'Edit Service' : 'Add Service');
        $('#service_id').val(serviceId ? serviceId : '');
        $('#service_title').val('');
        $('#service_description').val('');
        $('#service_icon_img1').val('');
        $('#service_icon_img2').val('');
        $('#service_type').val(serviceType);

        if (serviceId) {
            $.ajax({
                url: 'getService/' + serviceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#service_title').val(data.title);
                    $('#service_description').val(data.description);
                    $('#service_type').val(data.service_type_id); // Ensure correct field is used
                },
                error: function() {
                    alert('Error fetching service details.');
                }
            });
        }
        $('#serviceModal').modal('show');
    }


    function deleteService(serviceId) {
        if (confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: 'deleteService/' + serviceId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Error deleting service.');
                }
            });
        }
    }
</script>