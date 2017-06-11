

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