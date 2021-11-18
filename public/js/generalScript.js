$('.add-to-cart').on('click', function () {
  if($(this).closest("div").parent().find('.prix').val()<=0){
   return false;
  }
    var cart = $('.animate-cart');
    var imgtodrag = $(this).parent().parent().parent().find("img").eq(0);
    if (imgtodrag) {
        var imgclone = imgtodrag.clone()
            .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
            .css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '100'
            })
            .appendTo($('body'))
            .animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 75,
                'height': 75
            }, 1000, 'easeInOutExpo');

        setTimeout(function () {
            cart.effect("shake", {
                times: 2
            }, 200);

        }, 1500);

        imgclone.animate({
            'width': 0,
            'height': 0
        }, function () {
            $(this).detach()
        });

    }
});
$('.filterProducts li a').on('click',function () {
    var li = $(this).parent();
    var id = li.attr('id');
    var pro =$('.product-cat');


    if(pro.hasClass('showProducts') ){
        pro.removeClass('showProducts')

    }else{

    }


    $('.'+id).addClass('showProducts');
});
$(function () {
    var li = $('.filterProducts li');
    li.hasClass('active') ? $('.'+li.attr('id')).addClass('showProducts') : '';

});

$('.visibility-cart').on('click',function(){

    var $btn =  $(this);
    var $cart = $('.cart');


    if ($btn.hasClass('is-open')) {
        $btn.removeClass('is-open');
        $btn.text('O')
        $cart.removeClass('is-open');
        $cart.addClass('is-closed');
        $btn.addClass('is-closed');
    } else {
        $btn.addClass('is-open');
        $btn.text('X')
        $cart.addClass('is-open');
        $cart.removeClass('is-closed');
        $btn.removeClass('is-closed');
    }


})
function openCloseCart(){
    $("#headCart").toggle();
}

// SHOPPING CART PLUS OR MINUS
 function en_mins_qte(e) {
     var $this = $(e);

     var $input = $this.parent().find('input');

     var value = parseInt($input.val());

    if (value > 1) {
        value = value - 1;
    } else {
        value = 1;
    }

    $input.val(value);
    qte_change_achat($input.get(0));


};

 function en_plus_qte(e) {

    var $this = $(e);

    var $input = $this.parent().find('input');

    var value = parseInt($input.val());

    if (value < 1000) {
        value = value + 1;
    } else {
        value =1000;
    }

    $input.val(value);
    qte_change_achat($input.get(0));
};

// RESTRICT INPUTS TO NUMBERS ONLY WITH A MIN OF 0 AND A MAX 100
$('.cart input').on('blur', function(){

    var input = $(this);
    var value = parseInt($(this).val());

    if (value < 0 || isNaN(value)) {
        input.val(1);
    } else if
    (value > 1000) {
        input.val(1000);
    }
});
