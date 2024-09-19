<style>
    .text-start {
        text-align: start !important;
        font-weight: 500;
    }

    .m-0 {
        margin: 0px;
    }

    .gap-3 {
        display: flex;
        justify-content: end;
        gap: 1.0rem;
    }

    .m-0 {
        font-weight: 500;
    }

    .box {
        padding: 10px;
    }

    .form-horizontal .control-label {
        padding-top: 0px;

    }

    .hr1 {

        border-top: 1px solid black;

    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Price & Packages</h1>
    </section>

    <section class="content">
        <div class="container">

            <div class="container">
                <div class="row">
                    <!-- Plan 1 -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Plan 1</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('general/update_plan') ?>" method="post">
                                    <input type="hidden" name="plan_id" value="<?php echo isset($plan1['id']) ? $plan1['id'] : ''; ?>">

                                    <div class="form-group">
                                        <label for="plan_title1">Plan Title</label>
                                        <input type="text" class="form-control" id="plan_title1" name="plan_title"
                                            value="<?php echo isset($plan1['plan_title']) ? $plan1['plan_title'] : ''; ?>"
                                            placeholder="Enter Plan Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_price1">Monthly Price <span>(Static)</span></label>
                                        <input type="text" class="form-control" id="monthly_price1" name="monthly_price"
                                            value="<?php echo isset($plan1['monthly_price']) ? $plan1['monthly_price'] : ''; ?>"
                                            placeholder="Enter Monthly Price" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="yearly_price1">Yearly Price</label>
                                        <input type="text" class="form-control" id="yearly_price1" name="yearly_price"
                                            value="<?php echo isset($plan1['yearly_price']) ? $plan1['yearly_price'] : ''; ?>"
                                            placeholder="Enter Yearly Price" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="small_content1">Small Content</label>
                                        <input type="text" class="form-control" id="small_content1" name="small_content"
                                            value="<?php echo isset($plan1['small_content']) ? $plan1['small_content'] : ''; ?>"
                                            placeholder="Enter Small Content">
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_info1">Additional Info</label>
                                        <input type="text" class="form-control" id="additional_info1" name="additional_info"
                                            value="<?php echo isset($plan1['additional_info']) ? $plan1['additional_info'] : ''; ?>"
                                            placeholder="Enter Additional Info">
                                    </div>
                                    <div class="form-group">
                                        <label for="points1">Points (Comma Separated)</label>
                                        <textarea class="form-control" id="points1" name="points" placeholder="Enter Points (separated by commas)">
                                <?php echo isset($plan1['points']) ? implode(',', json_decode($plan1['points'])) : ''; ?>
                            </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Plan 1</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Plan 2 -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Plan 2</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('general/update_plan') ?>" method="post">
                                    <input type="hidden" name="plan_id" value="<?php echo isset($plan2['id']) ? $plan2['id'] : ''; ?>">

                                    <div class="form-group">
                                        <label for="plan_title2">Plan Title</label>
                                        <input type="text" class="form-control" id="plan_title2" name="plan_title"
                                            value="<?php echo isset($plan2['plan_title']) ? $plan2['plan_title'] : ''; ?>"
                                            placeholder="Enter Plan Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_price2">Monthly Price<span>(Static)</span></label>
                                        <input type="text" class="form-control" id="monthly_price2" name="monthly_price"
                                            value="<?php echo isset($plan2['monthly_price']) ? $plan2['monthly_price'] : ''; ?>"
                                            placeholder="Enter Monthly Price" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="yearly_price2">Yearly Price</label>
                                        <input type="text" class="form-control" id="yearly_price2" name="yearly_price"
                                            value="<?php echo isset($plan2['yearly_price']) ? $plan2['yearly_price'] : ''; ?>"
                                            placeholder="Enter Yearly Price" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="small_content2">Small Content</label>
                                        <input type="text" class="form-control" id="small_content2" name="small_content"
                                            value="<?php echo isset($plan2['small_content']) ? $plan2['small_content'] : ''; ?>"
                                            placeholder="Enter Small Content">
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_info2">Additional Info</label>
                                        <input type="text" class="form-control" id="additional_info2" name="additional_info"
                                            value="<?php echo isset($plan2['additional_info']) ? $plan2['additional_info'] : ''; ?>"
                                            placeholder="Enter Additional Info">
                                    </div>
                                    <div class="form-group">
                                        <label for="points2">Points (Comma Separated)</label>
                                        <textarea class="form-control" id="points2" name="points" placeholder="Enter Points (separated by commas)">
                                <?php echo isset($plan2['points']) ? implode(',', json_decode($plan2['points'])) : ''; ?>
                            </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Plan 2</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Plan 3 -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Plan 3</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('general/update_plan') ?>" method="post">
                                    <input type="hidden" name="plan_id" value="<?php echo isset($plan3['id']) ? $plan3['id'] : ''; ?>">

                                    <div class="form-group">
                                        <label for="plan_title3">Plan Title</label>
                                        <input type="text" class="form-control" id="plan_title3" name="plan_title"
                                            value="<?php echo isset($plan3['plan_title']) ? $plan3['plan_title'] : ''; ?>"
                                            placeholder="Enter Plan Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_price3">Monthly Price<span>(Static)</span></label>
                                        <input type="text" class="form-control" id="monthly_price3" name="monthly_price"
                                            value="<?php echo isset($plan3['monthly_price']) ? $plan3['monthly_price'] : ''; ?>"
                                            placeholder="Enter Monthly Price" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="yearly_price3">Yearly Price</label>
                                        <input type="text" class="form-control" id="yearly_price3" name="yearly_price"
                                            value="<?php echo isset($plan3['yearly_price']) ? $plan3['yearly_price'] : ''; ?>"
                                            placeholder="Enter Yearly Price" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="small_content3">Small Content</label>
                                        <input type="text" class="form-control" id="small_content3" name="small_content"
                                            value="<?php echo isset($plan3['small_content']) ? $plan3['small_content'] : ''; ?>"
                                            placeholder="Enter Small Content">
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_info3">Additional Info</label>
                                        <input type="text" class="form-control" id="additional_info3" name="additional_info"
                                            value="<?php echo isset($plan3['additional_info']) ? $plan3['additional_info'] : ''; ?>"
                                            placeholder="Enter Additional Info">
                                    </div>
                                    <div class="form-group">
                                        <label for="points3">Points (Comma Separated)</label>
                                        <textarea class="form-control" id="points3" name="points" placeholder="Enter Points (separated by commas)">
                                <?php echo isset($plan3['points']) ? implode(',', json_decode($plan3['points'])) : ''; ?>
                            </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Plan 3</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <hr class="hr1">
            <hr>
            <hr>



            <div class="col-md-12">

                <!-- Form to update individual section -->
                <form action="<?php echo base_url('general/UpdateIndividualSection'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($section['title']) ? $section['title'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_price" class="col-sm-3 control-label">Phone Price</label>
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" id="phone_price" name="phone_price" value="<?php echo isset($section['phone_price']) ? $section['phone_price'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="toll_free_price" class="col-sm-3 control-label">Toll-Free Price</label>
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" id="toll_free_price" name="toll_free_price" value="<?php echo isset($section['toll_free_price']) ? $section['toll_free_price'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="recording_price" class="col-sm-3 control-label">Recording Price</label>
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" id="recording_price" name="recording_price" value="<?php echo isset($section['recording_price']) ? $section['recording_price'] : ''; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hold_music_price" class="col-sm-3 control-label">Hold Music Price</label>
                        <div class="col-sm-6">
                            <input type="number" step="0.01" class="form-control" id="hold_music_price" name="hold_music_price" value="<?php echo isset($section['hold_music_price']) ? $section['hold_music_price'] : ''; ?>" required>
                        </div>
                    </div>

                    <!-- Hidden field for ID (assuming ID is always 1) -->
                    <input type="hidden" name="id" value="1">

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px; width:300px;border-radius:10px;">Update Individual</button>
                    </div>

                </form>

                <!-- End Form -->


                <hr>
                <hr class="hr1">
                <hr>
                <hr>

                <!-- form update options Form -->
                <form action="<?php echo base_url('general/updatePricePackage'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal row">

                    <?php foreach ($packages as $package): ?>
                        <div class="col-md-4 my-2">
                            <div class="box box-primary">
                                <div class="box-header with-border text-center">
                                    <h3 class="box-title"><?php echo $package['plan_type']; ?> Package</h3>
                                </div>
                                <div class="box-body">

                                    <!-- Pricing -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Pricing</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="pricing_<?php echo $package['id']; ?>" value="1" <?php echo ($package['pricing'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="pricing_<?php echo $package['id']; ?>" value="0" <?php echo ($package['pricing'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Telephone Number -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Telephone Number</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="telephone_number_<?php echo $package['id']; ?>" value="1" <?php echo ($package['telephone_number'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="telephone_number_<?php echo $package['id']; ?>" value="0" <?php echo ($package['telephone_number'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Unlimited Calls in the US -->
                                    <div class="form-group">
                                        <label class="col-sm-7 text-start control-label">Unlimited Calls in the US</label>
                                        <div class="col-sm-5 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="unlimited_calls_us_<?php echo $package['id']; ?>" value="1" <?php echo ($package['unlimited_calls_us'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="unlimited_calls_us_<?php echo $package['id']; ?>" value="0" <?php echo ($package['unlimited_calls_us'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Voicemail to Email -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Voicemail to Email</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="voicemail_to_email_<?php echo $package['id']; ?>" value="1" <?php echo ($package['voicemail_to_email'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="voicemail_to_email_<?php echo $package['id']; ?>" value="0" <?php echo ($package['voicemail_to_email'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 24/7 Support -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">24/7 Support</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="support_24_7_<?php echo $package['id']; ?>" value="1" <?php echo ($package['support_24_7'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="support_24_7_<?php echo $package['id']; ?>" value="0" <?php echo ($package['support_24_7'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Up to 25 Users -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Up to 25 Users</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="up_to_25_users_<?php echo $package['id']; ?>" value="1" <?php echo ($package['up_to_25_users'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="up_to_25_users_<?php echo $package['id']; ?>" value="0" <?php echo ($package['up_to_25_users'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Internet Fax -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Internet Fax</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="internet_fax_<?php echo $package['id']; ?>" value="1" <?php echo ($package['internet_fax'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="internet_fax_<?php echo $package['id']; ?>" value="0" <?php echo ($package['internet_fax'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Audio Conferencing -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Audio Conferencing</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="audio_conferencing_<?php echo $package['id']; ?>" value="1" <?php echo ($package['audio_conferencing'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="audio_conferencing_<?php echo $package['id']; ?>" value="0" <?php echo ($package['audio_conferencing'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Softphone -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Softphone</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="softphone_<?php echo $package['id']; ?>" value="1" <?php echo ($package['softphone'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="softphone_<?php echo $package['id']; ?>" value="0" <?php echo ($package['softphone'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 3rd Party Integration -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">3rd Party Integration</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="third_party_integration_<?php echo $package['id']; ?>" value="1" <?php echo ($package['third_party_integration'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="third_party_integration_<?php echo $package['id']; ?>" value="0" <?php echo ($package['third_party_integration'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Self Care Portal -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Self Care Portal</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="self_care_portal_<?php echo $package['id']; ?>" value="1" <?php echo ($package['self_care_portal'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="self_care_portal_<?php echo $package['id']; ?>" value="0" <?php echo ($package['self_care_portal'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Auto Attendant -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Auto Attendant</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="auto_attendant_<?php echo $package['id']; ?>" value="1" <?php echo ($package['auto_attendant'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="auto_attendant_<?php echo $package['id']; ?>" value="0" <?php echo ($package['auto_attendant'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Call detail -->
                                    <div class="form-group">
                                        <label class="col-sm-6 text-start control-label">Call Details</label>
                                        <div class="col-sm-6 d-flex justify-content-end gap-3">
                                            <label class="m-0">
                                                <input type="radio" name="call_detailed_record_<?php echo $package['id']; ?>" value="1" <?php echo ($package['call_detailed_record'] == true) ? 'checked' : ''; ?>> Yes
                                            </label>
                                            <label class="m-0">
                                                <input type="radio" name="call_detailed_record_<?php echo $package['id']; ?>" value="0" <?php echo ($package['call_detailed_record'] == false) ? 'checked' : ''; ?>> No
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Submit Button -->
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100" style="margin-bottom: 30px; width:300px;border-radius:10px;">Update Package</button>
                    </div>

                </form>
                <!-- End Form -->

            </div>
    </section>
</div>