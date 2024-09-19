<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Summernote CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i> Home Page Editor <small>Control Panel</small></h1>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Summernote textarea for editing content -->
            <textarea id="summernote" name="content"><?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <button type="button" id="saveContent" class="btn btn-primary">Save Content</button>
        </div>
    </div>
</section>

</div>

<script>
$(document).ready(function() {
  $('#summernote').summernote({
    height: 400, // Set editor height
    minHeight: null,
    maxHeight: null,
    focus: true,
    
  });

//   $('#summernote').summernote({
//   toolbar: [
//     // [groupName, [list of button]]
//     ['style', ['bold', 'italic', 'underline', 'clear']],
//     ['font', ['strikethrough', 'superscript', 'subscript']],
//     ['fontsize', ['fontsize']],
//     ['color', ['color']],
//     ['para', ['ul', 'ol', 'paragraph']],
//     ['height', ['height']]
//   ]
// });

  // Save content via AJAX
  $('#saveContent').on('click', function() {
    var content = $('#summernote').val();
    var sectionId = 'section-5'; // This should match the section being edited
    
    $.ajax({
        url: '<?php echo site_url('general/saveSectionContent'); ?>', 
        method: 'POST',
        data: {
            section_id: sectionId,
            content: content
        },
        success: function(response) {
            Swal.fire('Success', 'Content saved successfully!', 'success');
        },
        error: function(error) {
            Swal.fire('Error', 'Failed to save content', 'error');
        }
    });
});

});
</script>
