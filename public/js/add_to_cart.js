function add_to_cart(id) {
    var button = $("#"+id);
    button.prop('disabled',true);
    var route = button.attr('route');
    var qtyToIncreaseBy = $("#qtyValue"+id).val() ?? 1;
   $.ajax({
       type: "get",
       url: route,
       data: { id: id,qtyToIncreaseBy:qtyToIncreaseBy},
       dataType:'json',
       success:function(response){
        var jsonObject = response.cart.items;
        var keyCount  = Object.keys(jsonObject).length;
        $( "#keyCount" ).text('There are ' + keyCount + ' items in your cart');
        
        $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        console.log(Object.keys(jsonObject)[0]);
        $("#cartProduct").attr("src",response.img_src);
        $('#popupAddcart').modal("show");
        
        // window.location.href = response.url;
           $( "#totalQty" ).show();
           $( "#totalQty" ).text(response.cart.keyCount);
           button.prop('disabled',false);
       },
       error:function(result)
       {
           alert('Error occur!Please try again.');
           button.prop('disabled',false);
           return false;
       }
   });
   return false;

   

}
function add_to_wishlist(id){
    var button = $("#"+id+'wishlist');
    button.prop('disabled',true);
    var route = button.attr('route');
    $.ajax({
        type: "get",
        url: route,
        data: { id: id},
        dataType:'json',
        success:function(response){
            console.log(response.count);
         $( "#ajaxWishlist" ).text(response.count);
         $( "#wishlistCount" ).text('There are ' + response.count + ' items in your wishlist');
         $("#wishlistProduct").attr("src",response.img_src);
         $('#popupAddwishlist').modal("show");
         
        //  $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        //  console.log(jsonObject);
        //  console.log(Object.keys(jsonObject)[0]);
        //  $("#cartProduct").attr("src",response.img_src);
        //  $('#popupAddcart').modal("show");
         
        //  // window.location.href = response.url;
        //     $( "#totalQty" ).show();
        //     $( "#totalQty" ).text(response.cart.keyCount);
            button.prop('disabled',false);
        },
        error:function(result)
        {


            window.location.href="/add_wishlist?id="+id;
            button.prop('disabled',false);
            return false;
        }
    });
    
}
function quickView(id){
    var button = $("#"+id+'quick');
    button.prop('disabled',true);
    var route = button.attr('route');
    $.ajax({
        type: "get",
        url: route,
        data: { id: id},
        dataType:'json',
        success:function(response){
            $("#quickTitle").text(response.product.medicine_name);
            $("#quickPrice").text('Rs ' + response.product.sp_per_piece);
            $('#popupQuickview').modal("show");
        //  var jsonObject = response.cart.items;
        //  var keyCount  = Object.keys(jsonObject).length;
        //  $( "#keyCount" ).text('There are ' + keyCount + ' items in your cart');
         
        //  $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        //  $('#popupAddcart').modal("show");
         
         // window.location.href = response.url;
            // $( "#totalQty" ).show();
            // $( "#totalQty" ).text(response.cart.keyCount);
            // button.prop('disabled',false);
            button.prop('disabled',false);
        },
        error:function(result)
        {
            alert('Error occur!Please try again.');
            button.prop('disabled',false);
            return false;
        }
    });
    return false;
}

function isNarcotic(){
    alert('Sorry, We do not facilitate the sale of this product.Please visit nearby hospital pharmacy with a valid prescription.')
}
function viewDetails(sale_id){
    var button = $("#"+sale_id);
    button.prop('disabled',true);
    var route = button.attr('route');
    var result;
    $.ajax({
        type: "get",
        url: route,
        data: { id: sale_id},
        dataType:'json',
        success:function(response){
            $('#viewDetalBody').empty();
            $.each(response.details,function(index,value){
                result += 'Medicine Name:'+value.medicine_name
                            'Quantity:'+value.quantity
                            'Rate:'+value.Rate
                            'Total Amount:'+value.total_amount;
                $("#viewDetalBody").append(
                    '<tr><td>'+value.medicine_name+'</td><td>'+value.quantity+'</td><td>'+value.Rate+'</td><td>'+value.total_amount+'</td></tr>'
            );
            });
           $('#popupViewDetail').modal('show');
        },
        error:function(result)
        {
            alert('Error occur!Please try again.');
            button.prop('disabled',false);
            return false;
        }
    });
}

$(".ps-header__search .ps-input").on("keyup", function () {
    var self = this;
    var route = $(this).attr('route');
    if (self.timer){
        clearTimeout(self.timer);
    }
    self.timer = setTimeout(function ()
    {
        var keyword = self.value;
        if(self.value)
        {
        self.timer = null;
        $.ajax({
            type: "get",
            url: route,
            data: { keyword: keyword},
            dataType:'json',
            success:function(response){
                $('#search_response').empty();
                $.each(response.results,function(index,value){
                    
                    $("#search_response").append(
                        '<div class="col-12 col-lg-6"><div class="ps-product ps-product--horizontal"><div class="ps-product__thumbnail"><a class="ps-product__image" href="/product?id='+value.id+'"><figure><img src="'+value.img+'"/></figure></a></div><div class="ps-product__content" style = "margin-top:0px"><h4 class="ps-product__title ps-product__price sale"><a style = "margin-top:10px" href = "/product?id='+value.id+'">'+value.medicine_name+'</a></h4><p style = "margin-top:-20px">'+value.composition+'</p><p style = "margin-top:-10px">'+value.company_name+'</p><p style = "margin-top:-7px">'+value.brand_name+'</p><div class="ps-product__meta" style = "margin-top:-7px"><span class="ps-product__price sale">Rs '+value.sp_per_piece+'</span></div></div></div></div>'
                );
                });
                $('.ps-search--result').addClass('active');
            },
            error:function(result)
            {
                alert('Error occur!Please try again.');
                
                return false;
            }
        });
        
    } else {
        $('.ps-search--result').removeClass('active');
    }
}, 1000);


});

$(".ps-search--mobile .ps-input").on("keyup", function () {
    var self = this;
    var route = $(this).attr('route');
    if (self.timer){
        clearTimeout(self.timer);
    }
    self.timer = setTimeout(function ()
    {
        var keyword = self.value;
        if(self.value)
        {
        self.timer = null;
        
            
            $.ajax({
                type: "get",
                url: route,
                data: { keyword: keyword},
                dataType:'json',
                success:function(response){
                    $("#search_result_mobile").empty();
                    $.each(response.results,function(index,value){
                        console.log(value.company_name);
                        $("#search_result_mobile").append(
                            '<div class="ps-search__item"><div class="ps-product ps-product--horizontal"><div class="ps-product__thumbnail"><a class="ps-product__image" href="/product?id='+value.id+'"><figure><img src="'+value.img+'" alt="Image unavailable" /></figure></a></div><div class="ps-product__content" style = "display:inline-block"><h5 class="ps-product__title class="ps-product__price"><a href = "/product?id='+value.id+'">'+value.medicine_name+'</a></h5><p style = "margin-top:-20px">'+value.composition+'</p><p>'+value.company_name+'</p><p>'+value.brand_name+'</p><div class="ps-product__meta"><span class="ps-product__price">Rs '+value.sp_per_piece+'</span></div></div></div></div>'
                    );
                    });
                    $('.ps-search--mobile .ps-search__result').addClass('active');

                },
                error:function(result)
                {
                    alert('Error occur!Please try again.');
                
                    return false;
                }
            });
            
        } else {
            $('.ps-search--mobile .ps-search__result').removeClass('active');
        }
    }, 1000);
    
    
});

function reduceByOne(id){
    var button = $("#"+id);
    button.prop('disabled',true);
    var route = button.attr('route');
   $.ajax({
       type: "get",
       url: route,
       data: { id: id},
       dataType:'json',
       success:function(response){
        if(response.route){
            window.location.href = response.route;
        }
        else{
            console.log(response.qty);
            $("#cartPrice"+id).text('Rs '+response.price);
            $("#cartQty"+id).attr("value",response.qty);
            $("#cartPriceMobile"+id).text('Rs '+response.price);
            $("#cartQtyMobile"+id).attr("value",response.qty);
            $("#cartTotalPrice").text('Rs '+response.totalPrice);
            $("#cartNetTotalPrice").text('Rs '+response.totalPrice);
        }
        //    var jsonObject = response.cart.items;
        //    console.log(Object.keys(jsonObject)[0]['qty']);
        // var jsonObject = response.cart.items;
        // var keyCount  = Object.keys(jsonObject).length;
        // $( "#keyCount" ).text('There are ' + keyCount + ' items in your cart');
        
        // $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        // console.log(jsonObject);
        // console.log(Object.keys(jsonObject)[0]);
        // $("#cartProduct").attr("src",response.img_src);
        // $('#popupAddcart').modal("show");
        
        // // window.location.href = response.url;
        //    $( "#totalQty" ).show();
        //    $( "#totalQty" ).text(response.cart.keyCount);
            button.prop('disabled',false);
       },
       error:function(result)
       {
           alert('Error occur!Please try again.');
           button.prop('disabled',false);
           return false;
       }
   });
   return false;
}
function addByOne(id){
    var button = $("#add"+id);
    button.prop('disabled',true);
    var route = button.attr('route');
   $.ajax({
       type: "get",
       url: route,
       data: { id: id},
       dataType:'json',
       success:function(response){
            $("#cartPrice"+id).text('Rs '+response.price);
            $("#cartQty"+id).attr("value",response.qty);
            $("#cartPriceMobile"+id).text('Rs '+response.price);
            $("#cartQtyMobile"+id).attr("value",response.qty);
            $("#cartTotalPrice").text('Rs '+response.totalPrice);
            $("#cartNetTotalPrice").text('Rs '+response.totalPrice);
            if(response.route){
                window.location.href = response.route;
            }
        //    var jsonObject = response.cart.items;
        //    console.log(Object.keys(jsonObject)[0]['qty']);
        // var jsonObject = response.cart.items;
        // var keyCount  = Object.keys(jsonObject).length;
        // $( "#keyCount" ).text('There are ' + keyCount + ' items in your cart');
        
        // $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        // console.log(jsonObject);
        // console.log(Object.keys(jsonObject)[0]);
        // $("#cartProduct").attr("src",response.img_src);
        // $('#popupAddcart').modal("show");
        
        // // window.location.href = response.url;
        //    $( "#totalQty" ).show();
        //    $( "#totalQty" ).text(response.cart.keyCount);
            button.prop('disabled',false);
       },
       error:function(result)
       {
           alert('Error occur!Please try again.');
           button.prop('disabled',false);
           return false;
       }
   });
   return false;
}
function confirm_order(price){
    var button = $("#confirm_order");
    button.prop('disabled',true);
    var route = button.attr('route');
 
         $( "#total_order_amount" ).text('You are about to place an order of amount Rs '+price);
         $('#popupConfirmOrder').modal("show");
         
        //  $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        //  console.log(jsonObject);
        //  console.log(Object.keys(jsonObject)[0]);
        //  $("#cartProduct").attr("src",response.img_src);
        //  $('#popupAddcart').modal("show");
         
        //  // window.location.href = response.url;
        //     $( "#totalQty" ).show();
        //     $( "#totalQty" ).text(response.cart.keyCount);
            button.prop('disabled',false);
        
   return false;
}
function confirm_order_from_master(price){
    var button = $("#confirm_order_from_master");
    var route = button.attr('route');
 
         $( "#total_order_amount" ).text('You are about to place an order of amount Rs '+price);
         $('#popupConfirmOrder').modal("show");
         
        //  $("#totalPrice").text('Rs ' + response.cart.totalPrice);
        //  console.log(jsonObject);
        //  console.log(Object.keys(jsonObject)[0]);
        //  $("#cartProduct").attr("src",response.img_src);
        //  $('#popupAddcart').modal("show");
         
        //  // window.location.href = response.url;
        //     $( "#totalQty" ).show();
        //     $( "#totalQty" ).text(response.cart.keyCount);
        
   return false;
}
function imagePopUp(id){
    $('#prescriptionPopUp').modal("show");
    $("#prescription").attr("src",$("#prescription"+id).attr("src"));

}
