(function ($) {
    if (!!window.performance && window.performance.navigation.type === 2) {
        console.log('Reloading');
        window.location.reload();
    }
    $(window).on('resize', function (e) {
        e.preventDefault();
        if ($(window).width() < 1199) {
            $(".main-menu").slideUp();
            $(".main-menu").addClass("close");
            $(".mobile-menu-arrow").unbind("click");
            $(".mobile-menu-arrow").on('click', function (e) {

                if ($(".main-menu").hasClass('close')) {
                    $(".main-menu").slideDown();
                    $(".main-menu").removeClass("close");
                    $(".main-menu").addClass("open");
                } else if ($(".main-menu").hasClass('open')) {
                    $(".main-menu").slideUp();
                    $(".main-menu").removeClass("open");
                    $(".main-menu").addClass("close");
                }
            })
            $(".main-menu > li").each(function () {
                var liele = $(this);
                liele.find(".submenu").slideUp();
                if (liele.find(".submenu").length && !(liele.find(".menu-updown-arror").length)) {
                    liele.append("<span class='menu-updown-arror'><i class='fa fa-angle-down'></i></span>");
                }
                if (liele.find(".submenu").length) {
                    $(this).find(".menu-updown-arror").unbind("click");
                    $(this).find(".menu-updown-arror").on('click', function (e) {
                        $(this).prev(".submenu").toggle();
                    });
                }
            });
        } else {
            $(".mobile-menu-arrow").unbind("click");
            $(".main-menu").removeClass("close");
            $(".main-menu").removeClass("open");
            $(".main-menu").slideDown();
            $(".main-menu > li").each(function () {
                var liele = $(this);
                liele.find(".submenu").slideDown();
                if (liele.find(".submenu").length) {
                    liele.find(".menu-updown-arror").remove();
                }
            });
        }
    });


    $(window).on('load', function () {
        if ($(window).width() < 1199) {
            $(".main-menu").slideUp();
            $(".main-menu").addClass("close");
            $(".mobile-menu-arrow").unbind("click");
            $(".mobile-menu-arrow").on('click', function (e) {
                e.preventDefault();
                if ($(".main-menu").hasClass('close')) {
                    $(".main-menu").slideDown();
                    $(".main-menu").removeClass("close");
                    $(".main-menu").addClass("open");
                } else if ($(".main-menu").hasClass('open')) {
                    $(".main-menu").slideUp();
                    $(".main-menu").removeClass("open");
                    $(".main-menu").addClass("close");
                }
            })
            $(".main-menu > li").each(function () {
                var liele = $(this);
                liele.find(".submenu").slideUp();
                if (liele.find(".submenu").length && !(liele.find(".menu-updown-arror").length)) {
                    liele.append("<span class='menu-updown-arror'><i class='fa fa-angle-down'></i></span>");
                }
                if (liele.find(".submenu").length) {
                    $(this).find(".menu-updown-arror").unbind("click");
                    $(this).find(".menu-updown-arror").on('click', function (e) {
                        $(this).prev(".submenu").toggle();
                    });
                }
            });
        } else {
            $(".mobile-menu-arrow").unbind("click");
            $(".main-menu").removeClass("close");
            $(".main-menu").removeClass("open");
            $(".main-menu").slideDown();
            $(".main-menu > li").each(function () {
                var liele = $(this);
                liele.find(".submenu").slideDown();
                if (liele.find(".submenu").length) {
                    liele.find(".menu-updown-arror").remove();
                }
            });
        }
    });
})(jQuery);
$("form.ajax-cat-test input").on('click', function () {
    $("div#divLoading").addClass('show');
    var paren = $(this).parents("form.ajax-cat-test"),
        url = paren.attr('action');
    $.ajax({
        url: url, //this is your uri
        type: 'POST', //this is your method
        data: paren.serialize(),
        dataType: 'json',
        success: function (response) {
            $("div#divLoading").removeClass('show');
            if (response.data) {
                $(".servic-post-wapper").find(".services").html(response.data);
                if (response.paginat) {
                    //$(".servic-post-wapper").find(".pagination").css({visibility: visible});
                    $(".servic-post-wapper").find(".pagination").fadeIn();

                } else {
                    $(".servic-post-wapper").find(".pagination").fadeOut();
                    //$(".servic-post-wapper").find(".pagination").css({visibility: hidden});
                }
                // $(".servic-post-wapper").append(response.paginat);
            }
        }
    });
});
$(".request-call").live('click', function (event) {
    event.preventDefault();
    var id = $(this).data("id"),
        windowWidth = $(window).width(),
        windowHeight = $(document).height();
    $(".request-call-form").find("input[name=testId]").val(id);
    $(".request-call-form").css({
        width: windowWidth,
        height: windowHeight
    });
    $(".request-call-form").fadeIn();
    $("#requestCall").fadeIn();
});
$(".Cenal").live('click', function (event) {
    event.preventDefault();
    if ($(".form-warp").find(".alert-success")) {
        $(".form-warp").find(".alert-success").remove();
        $(".form-warp").find(".ok").remove();
    }
    $(".request-call-form").fadeOut();
});
$("#requestCall").submit(function (e) {
    e.preventDefault();
    var rurl = $(this).attr("action"),
        nummber = $(this).find("input[name=number]").val();
    if (nummber != "") {
        $.ajax({
            url: rurl, //this is your uri
            type: 'POST', //this is your method
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success == true) {
                    $("#requestCall").fadeOut();
                    $(".form-warp").append("<div class='alert alert-success' role='alert'><strong>Well done!</strong> Your Call Request Send successfully.</div>");
                    $(".form-warp").append("<a href='' class='btn btn-primary Cenal ok'>OK</a>");
                }
            }
        });
    }
});
//add to cart done
$(".add-cart").live('click', function (event) {
    event.preventDefault();
    $("div#divLoading").addClass('show');
    var paren = $(this).parents(".hover"),
        addURL = $(this).parents(".hover").data("cart-add"),
        removeURL = $(this).parents(".hover").data("cart-remove");
    $.ajax({
        url: addURL, //this is your uri
        type: 'GET', //this is your method
        dataType: 'json',
        success: function (response) {
            $("div#divLoading").removeClass('show');
            if (response.datastatus) {
                $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                paren.find('.add-cart').remove();
                paren.append("<a class='remove-cart' href='" + removeURL + "'><span class='remove-from-cart-text'>Remove from Cart</span><span class='glyphicon glyphicon-check'></span></a>");
            } else {
                location.reload(true);
            }
        }
    });
});
//remove from cart done
$(".remove-cart").live('click', function (event) {
    event.preventDefault();
    $("div#divLoading").addClass('show');
    var paren = $(this).parents(".hover"),
        addURL = $(this).parents(".hover").data("cart-add"),
        removeURL = $(this).parents(".hover").data("cart-remove");
    $.ajax({
        url: removeURL, //this is your uri
        type: 'GET', //this is your method
        dataType: 'json',
        success: function (response) {
            $("div#divLoading").removeClass('show');
            if (response.datastatus) {
                $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                paren.find('.remove-cart').remove();
                paren.append("<a class='add-cart' href='" + addURL + "'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart'></span></a>");
            } else {
                location.reload(true);
            }
        }
    });
});


$(".remove-link").live('click', function (event) {
    event.preventDefault();
    $("div#divLoading").addClass('show');
    var paren = $(this).parents(".remove"),
        removeURL = $(this).parents(".remove").data("cart-remove"),
        addURL = $(this).parents(".hover").data("cart-add"),
        id = $(this).parents(".remove").data("cart-id");
    $.ajax({
        url: removeURL, //this is your uri
        type: 'GET', //this is your method
        dataType: 'json',
        success: function (response) {
            $("div#divLoading").removeClass('show');
            if (response.datastatus) {
                $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
                $("#" + id).find(".hover").append("<a class='add-cart' href='" + addURL + "'><span class='add-to-cart-text'>Add to Cart</span><span class='glyphicon glyphicon-shopping-cart'></span></a>");
                $("#" + id).find('.remove-cart').remove();
            } else {
                location.reload(true);
            }
        }
    });
});

$(".add-health-cart3").live('click', function (event) {
    event.preventDefault();

    $("div#divLoading").addClass('show');
    var paren = $(this).parents(".title3"),
        addURL = $(this).parents(".title3").data("cart-add-health3"),
        removeURL = $(this).parents(".title3").data("cart-remove-health3");
    // alert(addURL);
    $.ajax({
        url: addURL, //this is your uri
        type: 'GET', //this is your method
        dataType: 'json',
        success: function (response) {
            if (response.datastatus == true) {
                $(".single-widget.cart-widget").find("ul.item-list").html(response.data);
            }
            //paren.find('.add-cart2').remove();
            //paren.append("<a class='remove-cart2' href='" + removeURL + "'><span class='glyphicon glyphicon-check'></span></a>");
            $("div#divLoading").removeClass('show');
        }
    });
});
