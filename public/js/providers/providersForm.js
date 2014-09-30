$(document).ready(function () {
    $( "div.Frutas" ).addClass( "hidden" );
    $( "div.Hortalizas" ).addClass( "hidden" );
    var actual = "ninguno";
    $("Select.fruits").imagepicker({
        hide_select: true,
        show_label: true,

        clicked: function () {


            if ($(this).context.selectedOptions.length == 1) {

                if ($(this).context.selectedOptions[0].innerHTML == "Frutas") {
                    console.log("frutas");
                    $( "div.Frutas" ).removeClass( "hidden" );
                    $( "div.Hortalizas" ).addClass( "hidden" );

                } else {
                    console.log("hortalizas");
                    $( "div.Frutas" ).addClass( "hidden" );
                    $( "div.Hortalizas" ).removeClass( "hidden" );


                }


            }
            else if ($(this).context.selectedOptions.length == 2) {

                console.log('Ambos')

                $( "div.Frutas" ).removeClass( "hidden" );
                $( "div.Hortalizas" ).removeClass( "hidden" );
            }
            else if ($(this).context.selectedOptions.length == 0) {

                console.log('Ninguno')
                $( "div.Frutas" ).addClass( "hidden" );
                $( "div.Hortalizas" ).addClass( "hidden" );
            }


        }
    });

    $("Select.fruits-detail").imagepicker({show_label: true});
    $("Select.vegetables-detail").imagepicker({show_label: true});

});