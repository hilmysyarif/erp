$(document).ready(function () {
    var numberOffers = 0;
    $('.datesInput').click(function () {


    })

    $('.datesNumber').click(function () {

        var display = $("#f" + $(this).attr('id')).css('display');

        if (display == "none") {
            $("#f" + $(this).attr('id')).show();
            $("#i" + $(this).attr('id')).focus();
            numberOffers++;
            if (numberOffers == 1) {
                $("#days").html('Ofertando para <h1>' + numberOffers + '</h1> día');
            }
            else {
                $("#days").html('Ofertando para <h1>' + numberOffers + '</h1> días');
            }

        } else {
            $("#f" + $(this).attr('id')).hide();
            $("#i" + $(this).attr('id')).val('');
            numberOffers--;
            if (numberOffers == 0) {
                $("#days").html("Aún no haz Ofertado. Qué esperas?");
            }
            else {
                $("#days").html('Ofertando para <h1>' + numberOffers + '</h1> días');
            }

        }


        //   $("#"+$(this).attr('id')).toggleClass("selectedDate");

    })

});