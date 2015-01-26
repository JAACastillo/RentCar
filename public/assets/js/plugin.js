(function($) {
    /**
     * [Borrar Filas]
     * @return {[type]} [description]
     */
    jQuery.fn.borrarFila = function()
    {
        $(this).click(function(e) {
            e.preventDefault();
            var form = $(this).data('form');
            var row = $(this).parents('tr');
            var postUrl = $(form).attr('action').replace('TERM_ID', $(this).data('id'));

            if(confirm('Esta seguro de borrar la fila?')) {
               
                // row.toggleClass('danger')
                $.ajax({
                    url: postUrl,
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        row.toggleClass('danger')
                    }
                });
            }
        });
    }
    /**
     * [Configuración del Datetimepicker]
     */
    $.fn.datetimepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        suffix: [],
        meridiem: []
    };
    /**
     * [Rango de Fechas]
     * @param  {[type]} opcion [Guarda los Parámetros deL Plugin]
     */
    jQuery.fn.rangoFechas = function(opcion)
    {
        var variable = {
            maxDate: ''
        }

        $.extend(variable,opcion);

        $(this).change(function() {
            $(variable.maxDate).datetimepicker('setStartDate',$(this).val());
        });
    }

    /**

     * [Mostrar Imagnes / Fotos]

     * @return {[type]} [description]

     */

    jQuery.fn.showFoto = function()

    {

        $(this).click(function(e) {

            e.preventDefault();

            url = $(this).attr('href');

            mdl = $(this).data('modal');



            $.ajax({

                url: url,

                type: 'GET',

                dataType: 'JSON',

                success: function(data)

                {

                    $(mdl).modal();

                    var img = "";

                    var active= "active";

                    data.forEach(function(dt) {

                        img += "<div class='item " + active + "' >"

                        img += "<img alt='cargada por ajax' src='/admin/assets/img/" + dt.ruta_imagen + "' class='img-responsive' />"

                        img += "</div>";

                        active = "";

                    });

                    $(".carousel-inner").html(img);

                }

            });

        });

    }

    /**

     * [Borrar desde la Vista]

     * @return {[type]} [description]

     */

    jQuery.fn.showBorrar = function()

    {

        $(this).click(function(e) {

            var form = $(this).data('form');

            var postUrl = $(form).attr('action').replace('TERM_ID', $(this).data('id'));

            var url = $(this).attr('href');

            if(confirm('Esta seguro de borrar la fila?'))

            {

                $.ajax({

                    url: postUrl,

                    type: 'POST',

                    data: $(form).serialize(),

                    dataType: 'JSON',

                    success: function(data) {

                        location.href=url;

                    }

                });

            }

            else

                e.preventDefault();

        });

    }
    /**
     * [Modal] [Formulario Tipo] [Editar]
     * @return {[type]}   [description]
     */
    jQuery.fn.editarModal = function(opcion)
    {
        var variable = {
            crearModal: '',
            modal: '',
            modal_id: ''
        }

        $.extend(variable,opcion);

        $(this).click(function(e) {
            e.preventDefault();
            url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    $(variable.crearModal).modal();

                    if(variable.modal == '#marca')
                        $(variable.modal).val(data.marca);
                    else if(variable.modal == '#tipo')
                        $(variable.modal).val(data.tipo);
                    else
                        $(variable.modal).val('');

                    $(variable.modal_id).val(data.id);
                }
            });
        });
    }

    /**
     * [Precio Total] [Formulario] [Paso 4] [Prestamo]
     * @return {[type]}   [description]
     */
    jQuery.fn.precio = function(opcion)
    {
        var variable = {
            auto: '',
            extra: '',
            descuento: '',
            total: ''
        }

        $.extend(variable,opcion);

        $(this).click(function(e) {
            e.preventDefault();
            $(variable.total).val('');
            _auto = $(variable.auto).val();
            _extra = $(variable.extra).val();
            _descuento = $(variable.descuento).val();

            if(_descuento != 0) {
                _descuento = _descuento / 100;
                _total = (parseFloat(_auto) + parseFloat(_extra));
                _cantidadDescontada = (parseFloat(_total) * parseFloat(_descuento));
                _total = _total - _cantidadDescontada;
            }
            else
                _total = (parseFloat(_auto) + parseFloat(_extra));
            $(variable.total).val(_total.toFixed(2))
        });
    }

    jQuery.fn.removerClase = function() {
        $(this).click(function(e) {
            e.preventDefault();
            var clase = $(this).attr('class');
            if(clase == 'opc glyphicon glyphicon-chevron-up') {
                var cls1 = 'opc glyphicon glyphicon-chevron-up';
                var cls2 = 'opc glyphicon glyphicon-chevron-down';
            }
            else {
                var cls1 = 'opc glyphicon glyphicon-chevron-down';
                var cls2 = 'opc glyphicon glyphicon-chevron-up';
            }

            $(this).removeClass(cls1).addClass(cls2);
        });
    }
})(jQuery)