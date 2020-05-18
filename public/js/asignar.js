$(document).ready(function() {
  $("#addEquipo").submit(function(event) {
    event.preventDefault();
    $data = $(this).serializeArray();

    $inputEquipo = $(this).find("[name='equipo']")[0];
    if($inputEquipo.validity.valid) {
      $.post(window.URL_BASE + "docente/addEquipo", $data).done(function() {
        swal("Equipo asignado con exito", {
          icon: "success",
        }).then(function() {
          window.location.reload();
        });
      }).fail(function(error) {
        alert(error.responseJSON.error);
      });
    }else {
      $inputError = $(this).find("#inputError");
      $($inputError).addClass("has-error-input").append($inputEquipo.validationMessage)
    }
  });

  // realizar un prestamos
  $("#addPrestamo").submit(function(event) {
    event.preventDefault();
    $data = $(this).serializeArray();
    $.post(window.URL_BASE + "/docente/addPrestamo", $data).done(function() {
      swal("Prestamo realizado con exito", {
        icon: "success",
      }).then(function() {
        window.location.reload();
      });
    }).fail(function(error) {
      alert(error.responseJSON.error);
    });
  });

  $("#entregarEquipo").submit(function(event) {
    event.preventDefault();
    $codigo = $(this).serializeArray();

    $.post(window.URL_BASE + "/docente/entregarEquipo", $codigo).done(function(response) {
      swal("Equipo entregado con exito", {
        icon: "success",
      }).then(function() {
        window.location.reload();
      });
    }).fail(function(error) {
      alert(error.responseJSON.error);
    });
  });

  $("#deleteEquipo").click(function(event) {
    event.preventDefault();
    $codigo = $(this).data('pivoted');

    swal({
      title: "¿Eliminar equipo asignado?",
      text: "Esta seguro que desea eliminar la asignacion de este equipo.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.post(window.URL_BASE + "/docente/deleteEquipo", $codigo).done(function() {
          swal("Hemos realizado la operacion con exito", {
            icon: "success",
          }).then(function(){ window.location.reload(); });
        });
      }
    });
  });

  // para hacer cambio de estado
  $("#estado").change(function() {
    var motivo = $("#motivos");
    if($(this).is(':checked')) {
      $(motivo).removeClass('noneview');
      $(motivo).find("#observacion").prop('required', true);
    } else {
      $(motivo).addClass('noneview');
      $(motivo).find("#observacion").removeAttr('required');
    }
  });
});