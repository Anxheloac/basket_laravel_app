
$(document).ready(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
})

$('.purchase-btn').click(function () {
    $.ajax({
	  type: "POST",
	  url: "/basket/add",
	  data: {
	  	car_id: $(this).data('carid')
	  },
	  success: function(){
	  	toastr.success('The item is added to basket!')
	  },
	  error: function(){
	  	toastr.error("An error occurr !Try again later");
	  }
	});
});

$('.remove-item-btn').click(function(){
	if(confirm('Are you sure to remove this item from basket ?')){
		window.open($(this).attr('href'), '_self');
	}
})

$('#checkoutBtn').click(function(){
	let isRegistered = $(this).data('register');
	if (isRegistered == 0) {
		toastr.info("Please create an account to proceed for checkout.");
	} else {
		$.ajax({
		  type: "POST",
		  url: "/order/store",
		  data: {},
		  success: function(){
		  	toastr.success('The order is saved!');
		  	window.open('/cars', '_self');
		  },
		  error: function(){
		  	toastr.error("An error occurr !Try again later");
		  }
		});
	}
})