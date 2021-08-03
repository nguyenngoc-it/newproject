$(document).ready(function () {
    let baseUrl = window.location.origin
    // console.log(baseUrl)
    $.ajax({
        url: baseUrl + "/api/index",
        type: "GET",
        data: {},
        dataType: "json"
    }).done(function (response) {
        // console.log(response)
        display(response)

    }).fail(function () {
        console.log("fail")
    })

    function display(res) {
        let data = "";
        // let url = "{{asset('storage/')}}";
        let url = 'storage/'
        // console.log(url)
        for (let i = 0; i < res.length; i++) {
            let imgUrl = url + res[i].image;
            // let addToCartUrl = res[i].id;
            data +=
                `<div class="col-lg-3 col-md-6 col-12" >

                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="product-image"  style="height: 250px">
                                                <img  src="${imgUrl}"  style="height: 100%">
                                                <div class="button" >
                                                    <a data-id="${res[i].id}"  " class="btn addtocart">
                                                    <i class="lni lni-cart"></i> Add to Cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">Watches</span>
                                                <h4 class="title">
                                                    <a href="product-grids.html">Xiaomi Mi Band 5</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span>$199.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                 </div>
                `
        }
        $('#product').html(data);
    }

    function addToCart() {
        let productId = $(this).attr('data-id');
        $.ajax({
            url: baseUrl + '/cart/addToCart/' + productId,
            type: "GET",
            dataType: "json",
            success: function (data) {
                // console.log(data)
                let count=0;
                for (const dataKey in data) {
                    count++;
                }
                $('#shoppingCart').html(count);
            },
            error: function () {
            }
        })
    }
    $(document).on('click','.addtocart',addToCart);

});

