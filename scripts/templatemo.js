

'use strict';
$(document).ready(function() {

    

  $('#btn-minus').click(function(){
    var val = $("#var-value").html();
    val = (val=='1') ? val : val-1;
    $("#var-value").html(val);
    $("#product-quantity").val(val);
    return false;
  });
  $('#btn-plus').click(function(){
    var val = $("#var-value").html();
    val++;
    $("#var-value").html(val);
    $("#product-quantity").val(val);
    return false;
  });

    $('.btn-size').click(function(){
      var this_val = $(this).html();
      $("#product-size").val(this_val);
      $(".btn-size").removeClass('btn-dark');
      $(".btn-size").addClass('btn-secondary');
      $(this).removeClass('btn-secondary');
      $(this).addClass('btn-dark');
      return false;
    });
    // End product detail

});
