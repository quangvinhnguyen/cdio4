/**
 * Created by vinh on 11/21/2016.
 */
$(document).ready(function () {
    $(".updatecart").click(function () {
        var rowId = $(this).attr('id');
        var qty = $(this).parent().parent().find(".qty").val();
        var token  =$("input[name='_token']").val();


        $.ajax({
            type:'GET',
            url:'cap-nhat/'+rowId+'/'+qty,
            cache:false,
            data:{'_token':token,'id':rowId,'qty':qty},

            success:function(data) {
                if(data == "OKE"){
                    //alert("OK");
                    $("#rl").load(location.href+" #rl");
                }
                else{
                    alert("UPDATE FAIL");
                }


            }

        });
    });

    $(".Delete").click(function () {
        var rowId = $(this).attr('id');
        var token  =$("input[name='_token']").val();

        // alert(rowId);
        $.ajax({
            type:'GET',
            url:'xoa-san-pham/'+rowId,
            cache:false,
            data:{'_token':token,'id':rowId},

            success:function(data) {
                if(data == "OKE"){
                    //alert("OK");
                    //;
                    //window.location.reload();
                     $("#rl").load(location.href+" #rl","");

                }
                else{
                    alert("Delete FAIL");
                }


            }

        });
    });
    $(".Pay").click(function () {
        var name = $(this).attr('id');
        if(name == 0){
            alert("You need login !");
        }


    });



});

