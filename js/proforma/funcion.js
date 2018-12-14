function id_amigable(esto){
    var contenido=""
    for (var i = 0; i < esto.length; i ++){
    contenido += (esto.charAt(i) == " ") ? "-" : esto.charAt(i);
    }//fin del for
    return contenido;
}
$(document).ready(function(){
    var li = "";
    var nombre="";
    var titleNombre ="";
    var li_amigable = "";
    $('#agregarServicio').append('<div id="mensajeInicial" class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-warning"></i> Atención !</h5>Por favor elige cualquiera de nuestros servicios del listado.</div>');
    
    $("#listadoServicios li a").click(function(){
            li = $(this).attr('id');
            nombre = $(this).text(); 
            titleNombre = $(this).attr('title');
            li_amigable = id_amigable(li);
            li_amigable = li_amigable.toLowerCase();
            $('#mensajeInicial').remove();
            $('#agregarServicio').append('<div id="creado_'+li_amigable+'"><label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label" for="textarea">'+titleNombre+'</label><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><textarea id="input-creado-'+li_amigable+'" class="form-control" rows="7" id="textarea" title ="'+nombre+'" placeholder="ingrese un mejor detalle sobre el servicio '+nombre+'" name="textarea" required></textarea></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="javascript:void(0)" id="borrar_'+li_amigable+'"><span class="glyphicon glyphicon-remove"></span></a></div></div>');
            $(this).attr('disabled','disabled');
            $(this).off('click');
        }            
    );

    $('body').on('click', '#agregarServicio div a', function(){
        var id_borrar = $(this).attr('id');
        var li_on = id_borrar.replace("borrar_","#");
        id_borrar = id_borrar.replace("borrar_","#creado_");
        $(id_borrar).remove();
        $(li_on).removeAttr("disabled");
        $(li_on).on('click',function(){
            li = $(this).text();
            li_amigable = id_amigable(li);
            li_amigable = li_amigable.toLowerCase();
            nombre = $(this).text();
            $('#agregarServicio').append('<div id="creado_'+li_amigable+'"><label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label" for="textarea">'+li+'</label><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><textarea id="input-creado-'+li_amigable+'" class="form-control" rows="7" id="textarea" title ="'+nombre+'" placeholder="ingrese un mejor detalle sobre el servicio '+nombre+'" name="textarea" required></textarea></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="javascript:void(0)" id="borrar_'+li_amigable+'"><span class="glyphicon glyphicon-remove"></span></a></div></div>');
            $(this).attr('disabled','disabled');
            $(this).off('click');
        });
    })

    /***********************************/
    /*         envio de proforma       */
    /********************************* */
    /*$("#formularioProforma :input")*/
    
    var parametros = {};
    var id = "";
    var valor = "";
    var cont=0;
    //var campname = "";
    var titleCamp = '';
    var sendParametros = false;
    var acumulador = 0;
    var data;
    $("#enviarProforma").click(function(){
        parametros = {};
        $('#formularioProforma').find('input, select, textarea').each(function() {
            cont = 0;
            id = $(this).attr('id');
            titleCamp = $(this).attr('title');
            valor = $(this).val();
            if ($.trim($(this).val()) <= 0) {
                alert('Por favor llene el campo: '+ titleCamp);
                cont++;
            } else {
                //campname = '"'+id+'" : '+valor;
                id = id.replace("input-creado-","");
                parametros[id] = valor;
                //parametros.push(parametros);
            }

            if(cont >  0){
                parametros = {};
                cont++;
            }
            acumulador = cont;
            
        });
        function captchaGoogle() {
            var response = grecaptcha.getResponse();
            if(response.length == 0){
              return 'robot';
            } else {
              return 'humano';
            }
        }
        if(acumulador == 0){
            if(captchaGoogle() == 'humano'){
                data = parametros;

                $.ajax({
                    data: data,
                    url: '../../inc/proforma/gestionProforma.php',
                    type: 'post',
                    beforsend: function(){
                        
                    },
                    success: function(response){
                        alert(response);
                    }
                });
            }else{
                //alert('acaso eres un robot!!');
                $("#modalProforma").modal();
                //$('#agregarServicio').append('<div id="mensajeInicial" class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-warning"></i> Atención !</h5>Por favor elige cualquiera de nuestros servicios del listado.</div>');
            }
        }
            
        
    });

});