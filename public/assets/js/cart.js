$(document).ready(function (){

    function cartUpdate(){
        let baseUrlCart = window.location.origin
        // console.log(baseUrlCart)
        let productId= $(this).attr('data-id');
        let quantity= $(this).parents('tr').find('input').val();
        // alert(quantity)
        $.ajax({
            url: baseUrlCart+ '/cart/updateQuantity/' +productId,
            type:"GET",
            data: {id: productId, quantity: quantity},
            success: function (data){
                console.log(data)


            },
            error: function (){

            }

        });


    }

    $(function (){
        $(document).on('click', '.cartUpdate', cartUpdate);
    });
});


