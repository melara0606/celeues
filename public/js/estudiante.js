  $(document).ready(function(){
    $('#myTable').DataTable({
      //"dom": '<"top"lf>rt<"bottom"pi>'
    });
    $('#modalIngreso').on('shown.bs.modal', function () {
  $('.modal-dialog').css('height', $('.modal-dialog').height() );
});

$('#modalIngreso').on('hidden.bs.modal', function () {
  $('.modal-dialog').css('height', 'auto');
});
   //No se para que es pero en la documentacion dice que sirve para algo
    //$(document).trigger('nifty.ready');
  //  $.niftyNav('refresh');
    $.niftyNav('bind');
    //$.niftyNav('collapse');
    //$.niftyNav('colExpToggle');
   
$.niftyAside('darkTheme');
  });
