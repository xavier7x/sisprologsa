function show_stack_topleft(type,text) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        /*nonblock: {
            nonblock: !0
        },*/
        addclass: "custom",
        styling: "bootstrap3",
        hide: !1,
        buttons: {
            classes: {
                //closer_hover: false,
                //sticker_hover: false,
                closer: 'glyphicon glyphicon-remove',
                pin_up: 'glyphicon glyphicon-play',
                pin_down: 'glyphicon glyphicon-pause'
            }
        },
        //stack: stack_topleft
    };
    switch (type) {
    case 'error':
        opts.title = "Oh No";
        opts.text = text;
        opts.type = "error";
        break;
    case 'info':
        opts.title = "Informacion";
        opts.text = text;
        opts.type = "info";
        break;
    case 'success':
        opts.title = "Buenas noticias";
        opts.text = text;
        opts.type = "success";
        break;
    }
    new PNotify(opts);
}


function save(value) {
    if(value.length > 0){
        show_stack_topleft('success','Se realizo la actualizacion con exito');
    }else{
        show_stack_topleft('info','Sin cambios que realizar');
    }
}

function obtenerids(ids){ //los parametros deben tener los ids o las clases separadas por comas
    $(ids).dblclick(function (e) {
        e.stopPropagation();      //<-------stop the bubbling of the event here
        var currentEle = $(this);
        var value = $(this).html();
        updateVal(currentEle, value);
    });
}

/***********************************************************/
/*                                                         */
/*                   DOCUMENTO - READY                     */
/*                                                         */
/***********************************************************/
$(document).ready(function() {
    var campos = '';
    campos = "#titulo, #parrafotitulo, #buttonInicio, #titulo2, #parrafotitulo2";
    obtenerids(campos);
});






