
  $("#btnnuevo").click(function(){
      
    $('#btnGuardar').val("add");
    $("#btnGuardar").html("Nuevo");
    $("#btnGuardar").removeClass("btn-mint");
    $("#modalIngresoHeader").removeClass("alert-mint");
    $("#modalIngresoLabel").html("Registro de Grupos");
    //$('#form').trigger('reset');
    $("#btnGuardar").removeClass("btn-success");
    $('#modalIngreso').modal('show'); 
    $('#nuevoFormulario').show();
     $('#modificarFormulario').hide(); 


    });

  $(document).on('click','.editarmodal',function(){
    var form_id = $(this).val();
    $("#form_id").val(form_id);
      $('#btnGuardar').val("update");///valor update para cuando actulize
      $("#btnGuardar").html("Modificar");///cambia el boton modificar
      $("#btnGuardar").removeClass("btn-info");
      $("#btnGuardar").addClass("btn-mint"); 
      $("#modalIngresoHeader").addClass("alert-mint"); 
      $("#modalIngresoLabel").html("Modificacion de Cupos");///titulo del modal
      $('#modalIngreso').modal('show');
       $('#nuevoFormulario').hide();
       $('#modificarFormulario').show();  
      $('#cuposModificar').val($(this).data('cupos'));  
        
          
    });

  $(document).on('click','.asigNotas',function(){
    var value = $(this).val();
window.location.href = value;
    });

  $(document).on('click','.asigEstudiantes',function(){
    var value = $(this).val();
window.location.href = value;
    });

$('#cursoSelect').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriaSelect').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursoSelect').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriaSelect').append(options);
    });
    console.log(valueSelected);
});

$('#categoriaSelect').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#nivelSelect').empty();
    var options="";
    options+='<option selected disabled label="Seleccione un nivel"></option>';


     $.getJSON($('#path').val()+'/grupos/niveles/'+$('#categoriaSelect').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].id + '">Nivel ' + data[i].numNivel + '</option>';

            };      
             //console.log(options);
        $('#nivelSelect').append(options);
    });
    console.log(valueSelected);
});

$('#evaluacionesSelect').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    
    $('#divcollapseEvaluacion').show();
    $('#tableEvaluaciones').empty();
    var options="";

     $.getJSON($('#path').val()+'/grupos/evaluaciones/'+$('#evaluacionesSelect').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
              //  options+='<option value="' + data[i].id + '">' + data[i].numNivel + '</option>';
                options+='<tr>'+
                '<td>' + data[i].titulo + '</td>'+
                '<td>' + data[i].ponderacion + '%</td>'+
                '</tr>';

            };      
             options+='<tr>'+
                '<td>TOTAL</td>'+
                '<td>100%</td>'+
                '</tr>';
             //console.log(options);
        $('#tableEvaluaciones').append(options);
    });
    console.log(valueSelected);
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#btnGuardar").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    //$('#modalIngreso').modal('hide'); 
//$('#form_id').submit();
   e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     idcursos:$('#cursoSelect').val(),
     idcursocategorias:$('#categoriaSelect').val(),
     nivel :$('#nivelSelect').val(),
     cupos:$('#cupos').val(),
     numGrupos :$('#numGrupos').val(),
     idevaluacion:$('#evaluacionesSelect').val()
   }      

      //  $('#btnGuardar').attr("disabled", true);
          var state = $('#btnGuardar').val();///para ver si es add o update
          var type = "POST"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/create";
          var form_id = $('#form_id').val();///el id del registro ya sea si modificamos 

          if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = $('#path').val()+"/grupos/update/"+form_id;
            formData ={
               cupos:$('#cuposModificar').val(),
             } 

          }
        
       //  $('#modalIngreso').modal('hide');
       // console.log($('#form').serializeArray());
         console.log(formData);

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
             console.log(data);
            // data[0];
            if(data['bandera']==1){
               
               $.niftyNoty({
                type: "success",
                container : "floating",
                title : "Bien Hecho!",
                message : data['response'],
                closeBtn : false,
                timer : 3000
                });
                       
               setTimeout(function(){
                //  $("#form").trigger("reset");
                  window.location.reload();////recarga la pagina actual
                 // $(location).attr('href','/peticionForm');
               }, 4000);
             } else{
               ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message :  data['response'],
                closeBtn : false,
                timer : 3000
                });

             }




             },
             error: function (data) {
              var errors=data.responseJSON;
                console.log(errors);
                $('#btnGuardar').attr("disabled", false);
              ///menasje de error
              $.niftyNoty({
                type: "danger",
                container : "floating",
                title : "Upps!",
                message : "A ocurrido un problema"+errors,
                closeBtn : false,
                timer : 3000
                });
              
              console.log('Error de peticion:', data);
              
                  }
                });
          /* if(errors.nombre!=undefined)
                {
                  $('#montofeed').text(errors.monto);
                  //$( '#montodiv' ).removeClass();
                  $( '#nombrediv' ).addClass("has-danger");
                }else{
                  $( '#nombrediv' ).removeClass("has-danger");
                  $( '#nombrefeed' ).text("");
                  }*/
        });
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$('#cursofiltro').on('change', function (e) {
/*    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriafiltro').empty();
    var options="";
   // options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categoriasfiltro/'+$('#cursofiltro').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro').append(options);
    });
    console.log(valueSelected);
 */
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
     $('#categoriafiltro').empty();

     $('#periodofiltro').empty();
    var options="";
   var options2="";
     
   
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
    // hiddenModulo:$('#hiddenModulo').val(),
     anhofiltro :$('#anhofiltro').val(),
   
   } 
          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+'/grupos/categoriasPeriodoFiltro/'+$('#cursofiltro').val();
          //console.log($('#form').serializeArray());
          console.log(formData);
          var cards="";
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data); 
                for (var i = 0; i < data['categorias'].length; i++) {
                    options+='<option value="' + data['categorias'][i].idcursocategorias + '">' + data['categorias'][i].nombre + ' ' + data['categorias'][i].edadInicio + '-' + data['categorias'][i].edadFin + '</option>';

                };      
                 //console.log(options);
                $('#hiddenModulo').val(data['modulos']);
                $('#categoriafiltro').append(options);

                for (var i = 0; i < data['periodos'].length; i++) {
                    options2+='<option value="' + data['periodos'][i].id + '">' + data['periodos'][i].numPeriodo + '</option>';

                };      
                 //console.log(options);
                $('#periodofiltro').append(options2);
                


             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
                });



});

$('#anhofiltro').on('change', function (e) {
/*    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriafiltro').empty();
    var options="";
   // options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categoriasfiltro/'+$('#cursofiltro').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro').append(options);
    });
    console.log(valueSelected);
 */
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    
     $('#periodofiltro').empty();
      var options2="";
     
   
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     hiddenModulo:$('#hiddenModulo').val(),
     anhofiltro :$('#anhofiltro').val(),
   
   } 
          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+'/grupos/periodos';
          //console.log($('#form').serializeArray());
          console.log(formData);
          var cards="";
          $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data); 
    
                for (var i = 0; i < data['periodos'].length; i++) {
                    options2+='<option value="' + data['periodos'][i].id + '">' + data['periodos'][i].numPeriodo + '</option>';

                };      
                 //console.log(options);
                $('#periodofiltro').append(options2);
            
             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de accion anhofiltro:', data);
              
                  }
            });

});


/*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#btnFiltrar").click(function (e) {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     cursofiltro:$('#cursofiltro').val(),
     categoriafiltro:$('#categoriafiltro').val(),
     anhofiltro :$('#anhofiltro').val(),
     titulo:$( "#cursofiltro option:selected" ).text(),
     
   } 
          $('#divCardsGrupos').text("");     
          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/filtrar";
          //console.log($('#form').serializeArray());
          console.log(formData);
          var cards="";
              
          

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
             console.log(data);
              $('#tableCategorias').text("");

            $('#divCardsGrupos').html(data['outputGrupos']);
            $('#tableCategorias').append(data['outputCategorias']);   
           $('#cursoNombreDiv').html(data['titulo']);  



             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
                });
         
        });
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click','.filtrar',function(e){
   var value= $(this).val();
   
  // $('#hiddenIdCategoria').val(value);
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
    e.preventDefault();
   /////Datos que se envian para recibir en el controlador 
   var formData = {
     cursofiltro:$('#cursofiltro').val(),
     categoriafiltro:$('#categoriafiltro').val(),
     anhofiltro :$('#anhofiltro').val(),
     titulo:$( "#cursofiltro option:selected" ).text(),
     value:value,
     periodofiltro:$('#periodofiltro').val(),
     
   } 
          $('#divCardsGrupos').text("");     
          var type = "PUT"; //for creating new resource
          var my_url = $('#path').val()+"/grupos/filtrar";
          //console.log($('#form').serializeArray());
          console.log(formData);
          var cards="";
              
          

          $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
             console.log(data);
              $('#tableCategorias').text("");
//$("#divCardsGrupos").remove();
            $('#divCardsGrupos').html(data['outputGrupos']);
            $('#tableCategorias').append(data['outputCategorias']);   
           $('#cursoNombreDiv').html(data['titulo']);
           // $('#hiddenModulo').val(data['selectModulo'])  

$("#divCardsGrupos").pagify(4, ".single-item");
//$("#divCardsGrupos").pagify();
//$("#divCardsGrupos").pagify(2, ".single-item");
            $(".editarmodal").tooltip();
            $(".infoModal").tooltip();
            $(".asigDocente").tooltip();
            $(".asigAula").tooltip();
            $(".asigNotas").tooltip();
            $(".asigEstudiantes").tooltip();
  

             },
             error: function (data) {
                  var errors=data.responseJSON;
                  console.log(errors);
                         $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema"+errors,
                        closeBtn : false,
                        timer : 3000
                        });
              
                         console.log('Error de peticion:', data);
              
                  }
                });

        
           

});
  $(document).on('click','.infoModal',function(){

  var form_id = $(this).val();

       $("#tablainfo").empty();////Deja vacia la tabla
  $.ajax({

    type: "GET",
    url: 'grupos/buscar/'+form_id,
    data: form_id,
    dataType: 'json',
    success: function (data) {
      console.log(data);

      var row = '<tr><td width="30%"> Nivel: </td><td width="70%">Nivel ' + data['grupo'].numNivel + '</td>';
      //row +='<tr><td> Idioma: </td><td>' + data.descripcion + '</td>';
      row +='<tr><td> Sección: </td><td>' + data['seccion'] + '</td>';
      row +='<tr><td> Aula Asignada: </td><td>' + data['aula'] + '</td>';
      row +='<tr><td> Docente Asignado: </td><td>' + data['docente'] + '</td>';
      row +='<tr><td> Cupos: </td><td>' + data['grupo'].cupos + '</td>';
      row +='<tr><td> Estado: </td><td>' + data['grupo'].estado + '</td>';
      
      $("#tablainfo").append(row); ///Se anhade a la tabla           

    },
    error: function (data) {
      console.log('Error de boton Info:', data);
    }
  });

  $('#modalInfo').modal('show'); ///modal de informacion
  });


 
/* $(document).on('click','.updateAula',function(e){
  $.niftyNoty({
                        type: "danger",
                        container : "floating",
                        title : "Upps!",
                        message : "A ocurrido un problema",
                        closeBtn : false,
                        timer : 3000
                        });

 }*/

////https://codepen.io/marcomarasco/pen/aGojVb         ////link donde lo encontre
 (function($) {
  var pagify = {
    items: {},
    container: null,
    totalPages: 1,
    perPage: 3,
    currentPage: 0,
    createNavigation: function() {
      this.totalPages = Math.ceil(this.items.length / this.perPage);

      $('.pagination', this.container.parent()).remove();
      var pagination = $('<ul style="border: 1px solid #ccc;box-shadow: 0px 0px #bbbbbb !important; border-radius: 5px;background-color:white;" class="pagination"></ul>').append('<li><a  class="nav prev disabled" data-next="false"><</a></li>');

      for (var i = 0; i < this.totalPages; i++) {
        var pageElClass = "page";
        if (!i)
          pageElClass = "page current";
        var pageEl = '<li><a class="' + pageElClass + '" data-page="' + (
        i + 1) + '">' + (
        i + 1) + "</a></li>";
        pagination.append(pageEl);
      }
      pagination.append('<li><a  class="nav next" data-next="true">></a></li>');

      this.container.after(pagination);

      var that = this;
      $("body").off("click", ".nav");
      this.navigator = $("body").on("click", ".nav", function() {
        var el = $(this);
        that.navigate(el.data("next"));
      });

      $("body").off("click", ".page");
      this.pageNavigator = $("body").on("click", ".page", function() {
        var el = $(this);
        that.goToPage(el.data("page"));
      });
    },
    navigate: function(next) {
      // default perPage to 5
      if (isNaN(next) || next === undefined) {
        next = true;
      }
      $(".pagination .nav").removeClass("disabled");
      if (next) {
        this.currentPage++;
        if (this.currentPage > (this.totalPages - 1))
          this.currentPage = (this.totalPages - 1);
        if (this.currentPage == (this.totalPages - 1))
          $(".pagination .nav.next").addClass("disabled");
        }
      else {
        this.currentPage--;
        if (this.currentPage < 0)
          this.currentPage = 0;
        if (this.currentPage == 0)
          $(".pagination .nav.prev").addClass("disabled");
        }

      this.showItems();
    },
    updateNavigation: function() {

      var pages = $(".pagination .page");
      pages.removeClass("current");
      $('.pagination .page[data-page="' + (
      this.currentPage + 1) + '"]').addClass("current");
    },
    goToPage: function(page) {

      this.currentPage = page - 1;

      $(".pagination .nav").removeClass("disabled");
      if (this.currentPage == (this.totalPages - 1))
        $(".pagination .nav.next").addClass("disabled");

      if (this.currentPage == 0)
        $(".pagination .nav.prev").addClass("disabled");
      this.showItems();
    },
    showItems: function() {
      this.items.hide();
      var base = this.perPage * this.currentPage;
      this.items.slice(base, base + this.perPage).show();

      this.updateNavigation();
    },
    init: function(container, items, perPage) {
      this.container = container;
      this.currentPage = 0;
      this.totalPages = 1;
      this.perPage = perPage;
      this.items = items;
      this.createNavigation();
      this.showItems();
    }
  };

  // stuff it all into a jQuery method!
  $.fn.pagify = function(perPage, itemSelector) {
    var el = $(this);
    var items = $(itemSelector, el);

    // default perPage to 5
    if (isNaN(perPage) || perPage === undefined) {
      perPage = 3;
    }

    // don't fire if fewer items than perPage
    if (items.length <= perPage) {
      return true;
    }

    pagify.init(el, items, perPage);
  };
})(jQuery);

//$(".container").pagify(6, ".single-item");
//$("#divCardsGrupos").pagify(6, ".single-item");
//$("#divCardsGrupos").pagify(1, ".single-item");
//$("#divCardsGrupos").pagify();


$("#divCardsGrupos").pagify(4, ".single-item");


////////////////Esto para busqueda///////////////////
 $("#search").on('keyup',function(){
    var value = $(this).val();
    var toggle=$('#modalAsigDocenteAulaToggle').val();

    if (value.length % 2 == 0) {

    }else{///si es impar
      $("#tablaAsigDocenteAula").empty();
          if (toggle==1) {
               $.ajax({

                    type: "GET",
                    url: $('#path').val()+'/grupos/busquedaDocente/'+value,
                    data: {'search':value},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                         $("#tablaAsigDocenteAula").html(data);            
                    
                    },
                    error: function (data) {
                        console.log('Error de info boton:', data);
                    }
               });
          }else{
               $.ajax({

                    type: "GET",
                    url: $('#path').val()+'/grupos/busquedaAula/'+value,
                    data: {'search':value},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                         $("#tablaAsigDocenteAula").html(data);            
                    
                    },
                    error: function (data) {
                        console.log('Error de info boton:', data);
                    }
               });
          }
        }//fin else de impar
    
 });
///////////////////fin busqueda///////////////////


$(document).on('click','.asigDocente',function(e){
  var value = $(this).val();

    //  $("#tablaAsigDocenteAula").empty();
  $('#modalAsigDocenteAulaIdGrupo').val(value);
  $('#modalAsigDocenteAulaToggle').val(1);////1 es para docente
   $('#modalAsigDocenteAulaLabel').html("Asignacion de Docente");
  $('#modalAsigDocenteAula').modal('show');  
 });

$(document).on('click','.asigAula',function(e){
  var value = $(this).val();

      $("#tablaAsigDocenteAula").empty();
  $('#modalAsigDocenteAulaIdGrupo').val(value);
  $('#modalAsigDocenteAulaToggle').val(2);////2 es para Aula
   $('#modalAsigDocenteAulaLabel').html("Asignacion de Aula");
  $('#modalAsigDocenteAula').modal('show');  
 });


$(document).on('click','.btnAsigAulaDocente',function(e){
    var value = $(this).val();
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
   e.preventDefault();
 
   var idgrupos = $('#modalAsigDocenteAulaIdGrupo').val();
   var toggle = $('#modalAsigDocenteAulaToggle').val();

   if (toggle==2) {
        /////Datos que se envian para recibir en el controlador 
       var formData = {
         idaulas:value,
       }   
      var my_url = $('#path').val()+"/grupos/updateAula/"+idgrupos;

   }else if (toggle==1) {//es de Docente
         var formData = {
           iddocentes:value,
         }   
      var my_url = $('#path').val()+"/grupos/updateDocente/"+idgrupos;
   }

   
          var type = "PUT"; //for creating new resource
          console.log(my_url);
         
        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                   console.log(data);
                  // data[0];
                  if(data['bandera']==1){
                     $('#modalAsigDocenteAula').modal('hide');

                     
                     $.niftyNoty({
                      type: "success",
                      container : "floating",
                      title : "Bien Hecho!",
                      message : data['response'],
                      closeBtn : false,
                      timer : 3000
                      });

                     if (data['toggle']==2) {
                      $('#aula'+idgrupos).html(data['nomAula']);
                      $('#aula'+idgrupos).css("color","green");
                     }else{
                        $('#docente'+idgrupos).html(data['nomDocente']);
                        $('#docente'+idgrupos).css("color","green");
                        $('#estado'+idgrupos).html("INICIADO");
                        
                     }
                     
                     
                             
                    // setTimeout(function(){
                      //  $("#form").trigger("reset");
                    //    window.location.reload();////recarga la pagina actual
                       // $(location).attr('href','/peticionForm');
                    // }, 4000);
                   } else{
                     ///menasje de error
                    $.niftyNoty({
                      type: "danger",
                      container : "floating",
                      title : "Upps!",
                      message :  data['response'],
                      closeBtn : false,
                      timer : 3000
                      });

                   }

             },
             error: function (data) {
                  var errors=data.responseJSON;
                    console.log(errors);
                  //  $('#btnGuardar').attr("disabled", false);
                  ///menasje de error
                   $.niftyNoty({
                    type: "danger",
                    container : "floating",
                    title : "Upps!",
                    message : "A ocurrido un problema"+errors,
                    closeBtn : false,
                    timer : 3000
                    });
                  
                  console.log('Error de btnAsigAula:', data);
              
              }
      });


 });

