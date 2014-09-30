$(document).ready(function () {

//  Get the Product variable
    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        }
        else {
            return results[1] || 0;
        }
    }

// place it on the search input to filter
    if ($.urlParam('product') != null) {


        $('input[type="search"]').val(decodeURI($.urlParam('product')));


        e = jQuery.Event("keyup");
        e.which = 13; //enter key
        $('input[type="search"]').trigger(e);

    }


});

