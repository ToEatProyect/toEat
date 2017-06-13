

// To create steps on "Create recipe"
$(document).ready(function () {

  var nSteps = 1;
  var steps_container = document.getElementById('steps-container');

  $('#addStep').click(function () {

    if(nSteps <= 20) {

      nSteps++;

      $(steps_container).append('<div class="form-group" id="s-container-' + nSteps + '">'+
        '<label for="step-' + nSteps + '">Paso ' + nSteps +'<span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span></label>'+
        '<textarea id="step-' + nSteps + '" name="step[]" class="form-control" rows="12" required></textarea>'+
        '</div>'

      );
    }

  });

  $('#deleteStep').click(function () {

    if(nSteps > 1) {

      $('#s-container-' + nSteps).remove();
      nSteps--;
    }

  })

});


//On document ready
$(function() {

  /* RECIPE UPLOAD IMAGE
   * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - * - */
  if($('[data-plupload-change-recipe-image]').length > 0) {
    var _uploaderButton = $('[data-plupload-change-recipe-image]');
    var _uploaderImage = _uploaderButton.find('img');
    var _uploaderProgressBar = _uploaderButton.find('.progress-bar');

    var _uploader = new plupload.Uploader({
      'runtimes': 'html5',
      'multi_selection': false,
      'browse_button': _uploaderButton.get(0),
      'url': '/images/Plupload/upload_recipe_image',
      'filters': {
        'max_file_size': '10mb',
        'mime_types': [{'title': 'Image files', 'extensions': 'jpg,gif,png'}]
      },
      'multipart_params': {
        'recipe_id': _uploaderButton.data('recipe-id'),
        'recipe_slug': _uploaderButton.data('recipe-slug')
      },
      'chunk_size': '200kb'
    });

    _uploader.bind('FilesAdded', function(instance, files) {
      if(files.length === 0) { return; }
      var _file = files[0];

      var _fr = new FileReader();
      _fr.onload = function(evt){
        _uploaderImage.attr('src', evt.target.result);
      };
      _fr.readAsDataURL(_file.getSource().getSource());

      _uploaderProgressBar
          .attr('aria-valuenow', '0')
          .css({'width': '0%'})
          .text('0%')
          .parent().removeClass('hide');

      _uploaderButton.addClass('is-uploading');

      //Start upload
      _file.upload();
    });

    _uploader.bind('FileUploaded', function(instance, file) {

      setTimeout(function () {
        _uploaderProgressBar
            .parent().hide();

        _uploaderButton.removeClass('is-uploading');
      }, 1500);

    });

    _uploader.bind('UploadProgress', function(instance, file) {
      _uploaderProgressBar
          .attr('aria-valuenow', file.percent)
          .css({'width': file.percent + '%'})
          .text(file.percent + '%');
    });

    _uploader.init();
  }

});