$(document).ready(function () {
    
    
// Navbar Background Change on scroll   
 
$(function () {
    $(window).scroll(function () { 
        $('nav').toggleClass('bg-first , shadow-lg', $(this).scrollTop()> 50);
    });
});



// Testimonial Start
$('#testimonial-slider').owlCarousel({
	items:1,
	itemsDesktop:[1000,1],
	itemsDesktopSmall:[979,1],
	itemsTablet:[768,1],
	pagination: false,
	navigation:true,
	navigationText:["",""],
	slideSpeed:1000,
	autoPlay:true
});
$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
$( ".owl-next").html('<i class="fa fa-chevron-right"></i>');

// button animation
$(".owl-prev, .owl-next").hover(function () {
		$(this).css({
			background : 'white',
			color : '#daa520',
			position : 'relative'
		});
		$(this).animate({
			bottom : '5px',
		});
		
	}, function () {
		$(this).css({
			color : 'white',
			background : '#daa520',
			position : 'relative'
		});
		$(this).animate({
			bottom : '0px',
		});
	}
);
// Testimonial End

// Fade Up Animation
$('.fade-up').hover(function () {
		// over
		$(this).css({
			position : 'relative'
		});
		$(this).animate({
			bottom : '25px',
		});
	}, function () {
		// out
		$(this).animate({
			bottom : '0',
		});
	}
);

// Fade Up sm
$('.fade-up-sm').hover(function () {
		// over
		$(this).css({
			position : 'relative'
		});
		$(this).animate({
			bottom : '2px',
		});
	}, function () {
		// out
		$(this).animate({
			bottom : '0',
		});
	}
);


// Table Pagination and search for Laywer Dashboard Start
    $('.table').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    })  

// Table End




});


