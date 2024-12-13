function cart(product_id) {
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
    var o = window.location.protocol + "//" + $(location).attr("host"),
	//var o = 'http://localhost/100web6/public_html',
        e = jQuery("#show-cart"),
        r = o + "/cart/add",
        qty = jQuery("#qty").val();
        if(!qty) { qty = 1;}
    $.ajax({
        type: "GET",
        url: r,
        data: { qty: qty, production: product_id },
        success: function (result) {
           if(result==1){

                    e.load(o + "/cart/list", function () {
                        $('.success-cart').show();
                        setTimeout(function() {
                            $('.success-cart').hide();
                        }, 3e3);
                    });


                }
			else if(result==2){

                    e.load(o + "/cart/list", function () {
                        $('.stock-cart').show();
                        setTimeout(function() {
                            $('.stock-cart').hide();
                        }, 3e3);
                    });


                }
        },
        error: function (result) {
            console.log("Error:", result);
        },
    });
}


function wishlist(product_id) {
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
    var o = window.location.protocol + "//" + $(location).attr("host"),
   //var o = 'http://localhost/100web6/public_html',
        r = o + "/wishlist/add";
        var wishlistCount = parseInt($("#wishlistCount").html());
    $.ajax({
        type: "GET",
        url: r,
        data: { production: product_id },
        success: function (result) {
           if(result==1){
                 $(".add-wishlist").addClass("heart-icon-active");
                 $("#wishlistCount").html(wishlistCount+1);
                  $('.success-wishlist').show();
                        setTimeout(function() {
                            $('.success-wishlist').hide();
                        }, 3e3);
                }
			else{
				 $('.added-wishlist').show();
                        setTimeout(function() {
                            $('.added-wishlist').hide();
                        }, 3e3);
			}
        },
        error: function (result) {
            console.log("Error:", result);
        },
    });
}


function remove(cart_id) {
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
    var o = window.location.protocol + "//" + $(location).attr("host"),
    // var o = 'http://localhost/100web6/public_html',
        e = jQuery("#show-cart"),
        r = o + "/cart-remove";
    $.ajax({
        type: "GET",
        url: r,
        data: {  cart_id: cart_id },
        success: function (result) {
           if(result==1){

                    e.load(o + "/cart/list", function () {});


                }
        },
        error: function (result) {
            console.log("Error:", result);
        },
    });
}


setTimeout(() => {$(".alert").fadeOut(1e3)}, 3000);
setTimeout(() => {$(".success-wishlist").fadeOut(1e3)}, 1000);
setTimeout(() => {$(".success-cart").fadeOut(1e3)}, 1000);
setTimeout(() => {$(".added-wishlist").fadeOut(1e3)}, 1000);
setTimeout(() => {$(".stock-cart").fadeOut(1e3)}, 1000);



$("#show-cart").click(function (t) {
    $('.mini-cart-drop-down').toggle();
});


$("body").mouseup(function (t) {
     $('.mini-cart-drop-down').hide();
})

const swiper = new Swiper('.bottom-slider', {
    // Optional parameters
    loop: true,
    spaceBetween: 10,
    slidesPerView: window.innerWidth > 992 ? 6 : 2,
    speed: 1500,
    autoplay: {
        delay: 5000, // Time between slide transitions (in milliseconds)
        disableOnInteraction: false // Allow manual interaction (click/drag) without stopping the autoplay
    },

    // Navigation arrows
    navigation: {
        nextEl: '.bottom-slide-next',
        prevEl: '.bottom-slide-prev',
    },
})

const swiper2 = new Swiper('.top-slider', {
    // Optional parameters
    loop: true,
    spaceBetween: 15,
    speed: 1000,
    autoplay: {
        delay: 2000, // Time between slide transitions (in milliseconds)
        disableOnInteraction: false // Allow manual interaction (click/drag) without stopping the autoplay
    },

    // Navigation arrows
    navigation: {
        nextEl: '.top-slide-next',
        prevEl: '.top-slide-prev',
    },

    // Breakpoints
    breakpoints: {
        // when window width is >= 992px
        992: {
            slidesPerView: 4
        },
        // when window width is less than 992px
        0: {
            slidesPerView: 1
        }
    }
});


// document.addEventListener('DOMContentLoaded', function () {
//     var iframe = document.querySelector('#landing--main iframe');
//     var src = iframe.src;
//     console.log(iframe)
//     // Check if "autoplay=1" is already present in the URL to avoid duplication
//     if (!src.includes('autoplay=1')) {
//       // Add "&autoplay=1" to the iframe's src
//      iframe.src += "&autoplay=1";
//
//     }
//   });
