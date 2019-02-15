//cart
$('body').on('click', '.add-to-cart-link', function(e){
     e.preventDefault();
     var id = $(this).data('id'),
         qty = $(this).parent().find('.add-qty input').val() ? 
         $(this).parent().find('.add-qty input').val() : 1,
         mod = $('.add-mod select').val();
     $.ajax({
         url: '/cart/add',
         data: {id: id, qty: qty, mod: mod},
         type: 'GET',
         success: function(res){
             showCart(res);
         },
         error: function(){
             alert('Ошибка! Попробуйте позже');
         }
     });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error');
        }
    })
});

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error');
        } 
    })
}

function showCart(cart){
    if($.trim(cart) == '<h3>Cart is empty</h3>'){
        $('#cart .modal-footer a, #clearCart')
                .css('display', 'none');
    } else {
        $('#cart .modal-footer a, #clearCart')
                .css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    changeSumMainCart();
}

function changeSumMainCart(){
    if($('.cart-sum').text()){
        $('.simpleCart_total').html($('.cart-sum').text());
    } else {
        $('.simpleCart_total').text('Empty Cart');
    }
}

function getCart(){
    $.ajax({
         url: '/cart/show',
         type: 'GET',
         success: function(res){
             showCart(res);
         },
         error: function(){
             alert('Ошибка! Попробуйте позже');
         }
     });
}


//currency
$('#currency').change(function(){
    window.location = 'currencies/change?curr=' + $(this).val();
});
//product's mods 
$('#mods').on('change', function(){
    var modId = $(this).val(),
        price = $(this).find('option').filter(':selected').data('price'),
        color = $(this).find('option').filter(':selected').data('title'),
        basePrice = $('#base-price').data('base');
    if (price){
        $('#base-price').text(symbolLeft + price + ' ' + symbolRight);
    } else {
        $('#base-price').text(symbolLeft + basePrice + ' ' + symbolRight);
    }
});