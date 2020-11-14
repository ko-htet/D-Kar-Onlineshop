$(document).ready(function(){
    showdata();
    count();

    $(".atc").click(function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var photo = $(this).data('photo');
        var price = $(this).data('price');
        var discount = $(this).data('discount');
        
        var item = {
            id:id,
            name:name,
            photo:photo,
            price:price,
            discount:discount,
            qty:1
        }
        // console.log(item);
        var itemList = localStorage.getItem('atcItems');
        var itemArray;
        if(itemList == null){
            itemArray = [];
        }else{
            itemArray = JSON.parse(itemList);
        }
        itemArray.push(item);
        // console.log(itemArray);
        var Stringitem = JSON.stringify(itemArray);
        localStorage.setItem('atcItems', Stringitem);
        showdata();
        count();
    });
    function showdata(){
        var itemList = localStorage.getItem('atcItems');
        if(itemList){
            var itemArray = JSON.parse(itemList);
            // console.log(itemArray);
            var html="";
            var j = 1;
            $.each(itemArray, function(i,v){  //data-id -> data is transfer data and id is variable
                var id = v.id;
                var name = v.name;
                var photo = v.photo;
                var unitprice = v.price;
                var discount = v.discount;
                var qty = v.qty;
                if(discount){
                    var price = discount;
                }else{
                    var price = unitprice;
                }
                var subtotal = price * qty;
                html += `
                    <tr>
                        <td class="cart_product_img">
                            <img src="${photo}" class="img-fluid" style="width: 100px;">
                        </td>
                        <td class="cart_product_desc">
                            <h5>${name}</h5>
                        </td>
                        <td>
							<span type="submit" class="btn btndecrease btn-sm" data-id="${i}"><i class="fa fa-minus" aria-hidden="true"></i></span>
						    <span> ${qty} </span>
							<span type="submit" class="btn btnincrease btn-sm" data-id="${i}"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</td>
                        <td>`;

                if (discount > 0) {
                    html += `<p class="font-weight-lighter"><del> ${unitprice} MMK </del></p>
                            <p class="text-danger">${discount} MMK</p>`;
                }
                else{
                    html += `<p>${unitprice} MMK</p>`;
                }`</td>
                    </tr>`;
            });
            $("#atctable").html(html);
        }
    };
    function count(){
		var itemList = localStorage.getItem("atcItems");
		if (itemList) {
			var itemArray = JSON.parse(itemList);
			var totalcount =0;
			var noti = 0;
			$.each(itemArray, function(i,v){

				var unitprice = v.price;
				var discount = v.discount;
				var qty = v.qty;
				if (discount) {
					var price = discount;
				}
				else{
					var price = unitprice;
				}
				var subtotal = price * qty;

				noti += qty ++;
				totalcount += subtotal ++;
			})
			$('.CartAmount').html(noti);
			$('.totalamount').html(totalcount+' Ks');
		}
		else{
			$('.CartAmount').html(0);
			$('.totalamount').html(0+' Ks');
		}
	};
    $("tbody#atctable").on("click",".btnincrease",function(){
        var id = $(this).data("id");
        var itemList = localStorage.getItem("atcItems");
        var itemArray = JSON.parse(itemList);
        $.each(itemArray,function(i,v){
            if(i == id){
                v.qty++;
            }
        })
        var Stringitem = JSON.stringify(itemArray);
        localStorage.setItem("atcItems", Stringitem);
        showdata();
        count();
    });
    $("tbody#atctable").on("click",".btndecrease",function(){
        var id = $(this).data("id");
        var itemList = localStorage.getItem("atcItems");
        var itemArray = JSON.parse(itemList);
        $.each(itemArray,function(i,v){
            if(i == id){
                v.qty--;
                if(v.qty < 1){
                    itemArray.splice(id,1);
                }
            }
        })
        var Stringitem = JSON.stringify(itemArray);
        localStorage.setItem("atcItems", Stringitem);
        showdata();
        count();
    });
})