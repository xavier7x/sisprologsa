function init_TagsInput() {
    console.log('iniciando tags');
        $('#keywords').tagsInput({
            width: 'auto'
        });
};
function obtenerUltimoId(){
    var mydata;
    //var ids = "#"+id;
    var sumaid = 0;
    if ($('#visualizar').val() == 1) {
        //$('#gestionar-tab').click(function(){
            $.ajax({
                async: false,
                type: "POST",
                url: "util/servicios/queryUltimoId.php",
                //data: {idparametro:idparam},
                dataType: "json",
                //beforeSend: function(){},
                error: function(request, status, error) {
                    console.log(request.responseText);
                    //document.location = 'Parametros';
                },
                success: function(respuesta) {
                    mydata = respuesta['idparametro'];
                    sumaid = parseInt(mydata) + parseInt(1);
                },
                complete: function(){
                    $('#LastId').text(sumaid);
                    if($("#idparametro").val().length == 0){
                        $("#idparametro").val(sumaid);
                    }
                }
            });
        //});
        
    } else {
        $('#myModalWarningBody').html('Usted no tiene privilegios para visualizar');
        $('#myModalWarning').modal("show");
    }
}
function mostrarDatos() {
    if ($('#visualizar').val() == 1) {
        var mydata;

        $('#jqGridParametros').jqGrid('clearGridData');
        $.ajax({
            async: false,
            type: "POST",
            url: "util/servicios/query.php",
            //data: {}, 
            dataType: "json",
            //beforeSend: function(){},
            error: function(request, status, error) {
                console.log(request.responseText);
                //document.location = 'Parametros';
            },
            success: function(respuesta) {
                mydata = respuesta.rows;
            },
            //complete: function(){}
        });

        $('#jqGridParametros').jqGrid('setGridParam', { data: mydata });
        $('#jqGridParametros').trigger('reloadGrid');

        $("#jqGridParametros").jqGrid({
            datatype: 'local',
            data: mydata,
            styleUI: 'Bootstrap',
            colModel: [
                { label: 'Gestión', name: 'btn_gestion', width: 100, align: 'left', sortable: false, search: false },
                { label: 'IdParametro', name: 'idparametro', key: true, width: 150 },
                { label: 'codigo', name: 'codigo', width: 200 },
                { label: 'nombre', name: 'nombre', width: 200 },
                { label: 'url amigable', name: 'url_amigable', align: 'center', width: 100, search: false },
                { label: 'Descripcion Corta', name: 'descripcion_corta', align: 'center', width: 150, search: false },
                { label: 'Descripcion Larga', name: 'descripcion_larga', align: 'center', width: 150, search: false },
                { label: 'Titulo', name: 'title', align: 'center', width: 150, search: false },
                { label: 'Palabras Clave', name: 'keywords', align: 'center', width: 150, search: false },
                { label: 'Creado', name: 'fecha_creado', align: 'center', width: 150, search: false },
                { label: 'Actualizado', name: 'fecha_actualizado', align: 'center', width: 150, search: false },
                { label: 'Estado', name: 'estado', align: 'center', width: 200, search: false }
            ],
            height: 'auto',
            autowidth: true, // El ancho de la tabla es el de la pagina
            shrinkToFit: false, // El ancho de la columna es el que tiene parametrizado
            viewrecords: true,
            //autoencode: false,
            rowNum: $('#param_paginacion').val(),
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            pager: "#jqGridParametrosPager"
        });


        $('#jqGridParametros').jqGrid('filterToolbar', {
            stringResult: true,
            // No es necesario dar enter para que funque la busqueda
            searchOnEnter: false,
            searchOperators: false
        });

        // Limipar la barra de busqueda

        $('#jqGridParametros')[0].clearToolbar();

    } else {
        $('#myModalWarningBody').html('Usted no tiene privilegios para visualizar');
        $('#myModalWarning').modal("show");
    }
}

function mostrarDetalleServicios(idParametro) {
    var mydata;
    if ($('#visualizar').val() == 1) {
        var idparam = idParametro;
        $.ajax({
            async: false,
            type: "POST",
            url: "util/servicios/queryDetalle.php",
            data: {idparametro:idparam},
            dataType: "json",
            //beforeSend: function(){},
            error: function(request, status, error) {
                console.log(request.responseText);
                //document.location = 'Parametros';
            },
            success: function(respuesta) {
                mydata = respuesta.rows;
                console.log(mydata);
            },
            complete: function(){
                var campo = '';
                for(x=0;x<mydata.length;x++){
                    campo = '#'+mydata[x]['campo']; 
                    $(campo).val(mydata[x]['valor']);
                }
            }
        });
    } else {
        $('#myModalWarningBody').html('Usted no tiene privilegios para visualizar');
        $('#myModalWarning').modal("show");
    }
}
function limpiarFormParametrosDetalle() {
    $('#formParametroDetalle').trigger("reset");
    //$('#idparametro').val('');
    //$('#idparametro').removeAttr("disabled");
    $('#nombre').val('');
    $('#codigo').val('');
    $('#codigo').removeAttr("disabled");
    $('#descripcion_corta').val('');
    $('#url_amigable').val('');
    $('#descripcion_larga').val('');
    $('#keywords').val('');
    $('#title').val('');
    $('#estado').val('');
    $('#accion').text('insertar');
}

function redimensionarjqGrid() {
    var width = $('#contiene_jqGrid').width();
    //console.log(width);
    $('#jqGridParametros').setGridWidth((width - 4));
}

function getCleanedString(cadena) {
    // Definimos los caracteres que queremos eliminar
    var specialChars = "¡!@#$^%*()+=\\[]\"'{}|´:<>¿?,.";
    // Los eliminamos todos
    for (var i = 0; i < specialChars.length; i++) {
        cadena = cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
    }
    // Lo queremos devolver limpio en minusculas
    cadena = cadena.toLowerCase();
    // Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
    cadena = cadena.replace(/ /g, "-");
    // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
    cadena = cadena.replace(/[áäàâ]/gi, "a");
    cadena = cadena.replace(/[éëèê]/gi, "e");
    cadena = cadena.replace(/[íïìî]/gi, "i");
    cadena = cadena.replace(/[óöòô]/gi, "o");
    cadena = cadena.replace(/[úüùû]/gi, "u");

    cadena = cadena.replace(/ñ/gi, "n");
    cadena = cadena.replace(/&/gi, "y");
    cadena = cadena.replace(/_/gi, "-");
    cadena = cadena.replace(/\//gi, "-");
    return cadena;
}
/***********************************************************/
/*                                                         */
/*                   DOCUMENTO - READY                     */
/*                                                         */
/***********************************************************/
$(document).ready(function() {
    obtenerUltimoId();
    mostrarDatos();
    //init_TagsInput();
    $(window).on("resize", function() {
        redimensionarjqGrid();
    });

    // Select all tabs
    $('.nav-tabs a').on('click', function(event) {
        redimensionarjqGrid();
    });

    $('#limpiarFormParametrosDetalle').click(function() {
        limpiarFormParametrosDetalle();
    });

    $("#jqGridParametros").on("click", '.gestion_update', function(event) {
        var usuario = $("#session_usuario").val();
        var datos = $("#jqGridParametros").jqGrid('getRowData', this.dataset.idparametro);
        mostrarDetalleServicios(datos['idparametro']);
        $('#idparametro').val(datos['idparametro']);
        $('#idparametro').attr("disabled", "disabled");
        $('#nombre').val(datos['nombre']);
        $('#codigo').val(datos['codigo']);
        $('#codigo').attr("disabled", "disabled");
        $('#descripcion_corta').val(datos['descripcion_corta']);
        $('#url_amigable').val(datos['url_amigable']);
        $('#descripcion_larga').val(datos['descripcion_larga']);
        $('#title').val(datos['title']);
        $('#keywords').val(datos['keywords']);
        //$('#Keywords').tagsInput({onAddTag:datos['keywords']});
        $('#estado').val(datos['estado']);
        $('#accion').text('actualizar');
        // Select tab by name
        $('.nav-tabs a[href="#menu1Now"]').tab('show');

    });

    /*$("#formParametros").submit(function(){
        mostrarDatos();
        limpiarFormParametrosDetalle();
        return false;
    });*/

    $("#formParametroDetalle").submit(function() {

        /* 
        { label: 'Gestión', name: 'btn_gestion', width: 100, align: 'left', sortable: false, search: false },
                { label: 'IdParametro', name: 'idparametro', key: true, width: 150 },
                { label: 'codigo', name: 'codigo', width: 200 },
                { label: 'nombre', name: 'nombre', width: 200 },
                { label: 'url amigable', name: 'url_amigable', align: 'center', width: 100, search: false },
                { label: 'Descripcion Corta', name: 'descripcion_corta', align: 'center', width: 150, search: false },
                { label: 'Descripcion Larga', name: 'descripcion_larga', align: 'center', width: 150, search: false },
                { label: 'Titulo', name: 'title', align: 'center', width: 150, search: false },
                { label: 'Palabras Clave', name: 'keywords', align: 'center', width: 150, search: false },
                { label: 'Creado', name: 'fecha_creado', align: 'center', width: 150, search: false },
                { label: 'Actualizado', name: 'fecha_actualizado', align: 'center', width: 150, search: false },
                { label: 'Estado', name: 'estado', align: 'center', width: 200, search: false }
        */
        var usuario = $("#session_usuario").val();
        var idparametro = $("#idparametro").val();
        var codigo = $("#codigo").val();
        var nombre = $("#nombre").val();
        var estado = $("#estado").val();
        var url_amigable = $("#url_amigable").val();
        var descripcion_corta = $("#descripcion_corta").val();
        var descripcion_larga = $("#descripcion_larga").val();
        var tituloPagina = $("#title").val();
        var keywords = $("#keywords").val();
        var titulo = $("#titulo").val();
        var parrafo1 = $("#parrafo1").val();
        var titulo2 = $("#titulo2").val();
        var parrafo2 = $("#parrafo2").val();
        var titulo3 = $("#titulo3").val();
        var parrafo3 = $("#parrafo3").val();
        var accion = $('#accion').text();
        if (accion == 'actualizar') {
            //actualizar
            if ($('#actualizar').val() == 1) {
                $.ajax({
                    type: "POST",
                    url: "util/servicios/update.php",
                    dataType: 'json',
                    data: {
                        usuario: usuario,
                        idparametro: idparametro,
                        codigo: codigo,
                        nombre: nombre,
                        url_amigable: url_amigable,
                        descripcion_corta: descripcion_corta,
                        descripcion_larga: descripcion_larga,
                        tituloPagina: tituloPagina,
                        keywords: keywords,
                        titulo: titulo,
                        parrafo1: parrafo1,
                        titulo2: titulo2,
                        parrafo2: parrafo2,
                        titulo3: titulo3,
                        parrafo3: parrafo3,
                        estado:estado
                    },
                    beforeSend: function() {
                        $("#submitFormParametrosDetalle").html('Actualizando');
                        $('#submitFormParametrosDetalle').prop("disabled", true);
                    },
                    error: function(request, status, error) {
                        console.log(request.responseText);
                        document.location = 'servicios';
                    },
                    success: function(respuesta) {
                        switch (respuesta.estado) {
                            case 1:
                                $('#myModalSuccessBody').html(respuesta.mensaje);
                                $('#myModalSuccess').modal("show");

                                limpiarFormParametrosDetalle();
                                $('.nav-tabs a[href="#home"]').tab('show');
                                mostrarDatos();
                                break;
                            case 2:
                                $('#myModalWarningBody').html(respuesta.mensaje);
                                $('#myModalWarning').modal("show");

                                break;
                            default:
                                alert('Se ha producido un error');
                                document.location = 'servicios';
                                break;
                        }
                    },
                    complete: function() {
                        $('#submitFormParametrosDetalle').prop("disabled", false);
                        $("#submitFormParametrosDetalle").html('Guardar');
                    }
                });
            } else {
                $('#myModalWarningBody').html('Usted no tiene privilegios para actualizar');
                $('#myModalWarning').modal("show");
            }
            //fin actualizar

        } else {
            // Insercion
            if ($('#insertar').val() == 1) {
                idparametro = $("#LastId").text();
                $.ajax({
                    type: "POST",
                    url: "util/servicios/insert.php",
                    dataType: 'json',
                    data: {
                        usuario: usuario,
                        idparametro: idparametro,
                        codigo: codigo,
                        nombre: nombre,
                        url_amigable: url_amigable,
                        descripcion_corta: descripcion_corta,
                        descripcion_larga: descripcion_larga,
                        tituloPagina: tituloPagina,
                        keywords: keywords,
                        titulo: titulo,
                        parrafo1: parrafo1,
                        titulo2: titulo2,
                        parrafo2: parrafo2,
                        titulo3: titulo3,
                        parrafo3: parrafo3,
                        estado:estado
                    },
                    beforeSend: function() {
                        $("#submitFormParametrosDetalle").html('Insertando');
                        $('#submitFormParametrosDetalle').prop("disabled", true);
                    },
                    error: function(request, status, error) {
                        console.log(request.responseText);
                        document.location = 'servicios';
                    },
                    success: function(respuesta) {
                        switch (respuesta.estado) {
                            case 1:
                                $('#myModalSuccessBody').html(respuesta.mensaje);
                                $('#myModalSuccess').modal("show");

                                limpiarFormParametrosDetalle();
                                $('.nav-tabs a[href="#home"]').tab('show');
                                mostrarDatos();
                                break;
                            case 2:
                                $('#myModalWarningBody').html(respuesta.mensaje);
                                $('#myModalWarning').modal("show");

                                break;
                            default:
                                alert('Se ha producido un error');
                                document.location = 'servicios';
                                break;
                        }
                    },
                    complete: function() {
                        $('#submitFormParametrosDetalle').prop("disabled", false);
                        $("#submitFormParametrosDetalle").html('Guardar');
                    }
                });
            } else {
                $('#myModalWarningBody').html('Usted no tiene privilegios para insertar');
                $('#myModalWarning').modal("show");
            }
        }

        return false;
    });

});