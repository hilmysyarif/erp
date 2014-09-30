$(document).ready(function() {
$("input[type=checkbox]").change(function(){
  recalculate();
});
function recalculate(){
    var sum_amount = 0;
    var sum_price = 0;
    $("input[type=checkbox]:checked").each(function(){
      var id = $(this).val();
			sum_amount += parseInt($('#amount'+id).html());
			sum_price  += parseInt($('#price'+id).html());
      
    });
var amount = $("#amount").html(); 
var price = $("#price").html(); 
var amount_left = amount - sum_amount;
var amount_price = amount - sum_price;

$("#amount_taken").html(sum_amount);
$("#amount_left").html(amount_left);
$("#price_topay").html(sum_price);
$("#price_left").html(price_left);
}
});