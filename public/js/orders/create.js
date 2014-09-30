$(document).ready(function () {


    //Calendar formatting
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);


//giving calendar functionality

    $(function() {
        $( "#datepicker_start" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#datepicker_end" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#datepicker_end" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#datepicker_start" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });

    $('#periodSelect').change(function () {

        $('#datepicker_end').val("");
        $('#datepicker_start').val("");

       // If the User selects a Single Date
        if ($(this).val()==1) {

            $('.hideInput').hide();

        }
        else{

            $('.hideInput').show();

        }
    });

    $('#datepicker_start').change(function () {


        if( $('#periodSelect').val()==1)
        {
            $('#datepicker_end').val($(this).val());
        }


    });

// Give the same value for amount than max amount
    $('#amount').change(function () {

            $('#max_amount').val($(this).val());
            $('#spanmax').text('');




    });


    //Check if max amount is iqual or smaller than amount

    $('#max_amount').change(function () {

        if( parseInt($(this).val())>= parseInt($('#amount').val()) ){

            $('#spanmax').text('La cantidad máxima debe ser menor o igual a la cantidad total');
            $('input[type="submit"]').attr('disabled','disabled');
        }
        else{
            $('#spanmax').text('');
            $('input[type="submit"]').removeAttr('disabled');
        }

    });

    //Check if max amount is iqual or smaller than amount

    $('#min_amount').change(function () {

        if(parseInt($(this).val())>= parseInt($('#amount').val())){

            $('#spanmin').text('La cantidad mínima debe ser menor o igual a la cantidad total');
            $('input[type="submit"]').attr('disabled','disabled');
        }
        else{
            $('#spanmin').text('');
            $('input[type="submit"]').removeAttr('disabled');
        }

    });






});

