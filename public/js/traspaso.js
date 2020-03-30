


$('#cursofiltro1').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
     $('#titleacordeon').html('<strong style="font-size: 13px; " >GRUPO INGLES SABATINO</strong>');
    $('#categoriafiltro1').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursofiltro1').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro1').append(options);
    });
    console.log(valueSelected);
});

$('#cursofiltro2').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $('#categoriafiltro2').empty();
    var options="";
    options+='<option selected disabled label="Seleccione una categoria"></option>';


     $.getJSON($('#path').val()+'/grupos/categorias/'+$('#cursofiltro2').val(), function (data) {
          //success data
            console.log(data);     
            for (var i = 0; i < data.length; i++) {
                options+='<option value="' + data[i].idcursocategorias + '">' + data[i].nombre + ' ' + data[i].edadInicio + '-' + data[i].edadFin + '</option>';

            };      
             //console.log(options);
        $('#categoriafiltro2').append(options);
    });
    console.log(valueSelected);
});