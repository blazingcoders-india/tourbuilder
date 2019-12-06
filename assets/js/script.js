/* global country_id */

$(document).ready(function () {

    var validator = $("#clients").validate({
        rules: {

            
            short_name: {
                required: true,
                maxlength: 12
              },
              
            

        },
        messages: {

             
             

        },

        submitHandler: function () {
            jQuery(form).ajaxSubmit({
            });

        }
    });
       var validator = $("#zones").validate({
            rules: {

            
            short_name: {
                required: true,
                maxlength: 12
              },
              
            

        },
        });
       var validator = $("#destinations").validate({
            rules: {

            
            short_name: {
                required: true,
                maxlength: 12
              },
              
            

        },
        });
        var validator = $("#providers").validate({
        rules: {

             
            short_name: {
                required: true,
                maxlength: 12
              },
              client_link: {
                required: true,
                url: true
              },
            

        },
        

        submitHandler: function () {
            jQuery(form).ajaxSubmit({
            });

        }
    });
    var validator = $("#meal_plan").validate({
           
        });
    var validator = $("#products").validate({
           
        });
    var validator = $("#clients").validate({
           
        });
    var validator = $("#tags").validate({
           
        });
    var validator = $("#tours_status").validate({
           
        });
    var validator = $("#tours_info").validate({
           
        });
});

$(document).ready(function(){
    
    
    //add more fields group
    $(".addMore").click(function(){
       
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        
    });
    $(".addMorephone").click(function(){
       
            var fieldHTML = '<div class="form-group fieldGroupphone">'+$(".fieldGroupphoneCopy").html()+'</div>';
            $('body').find('.fieldGroupphone:last').after(fieldHTML);
        
    });
    $(".addMoreproperty").click(function(){
       
            var fieldHTML = '<div class="form-group fieldGroupproperty">'+$(".fieldGrouppropertyCopy").html()+'</div>';
            $('body').find('.fieldGroupproperty:last').after(fieldHTML);
        
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
    $("body").on("click",".removephone",function(){ 
        $(this).parents(".fieldGroupphone").remove();
    });
    $("body").on("click",".removeproperty",function(){ 
        $(this).parents(".fieldGroupproperty").remove();
    });
});
 
 
 $(function () {

    $('.tags').on('keyup' , function (e) {

        console.log(e.which);
        if (e.which === 186 || e.which ===188){
            
            $('.div').append("<span class='spanclass'> <input type='hidden' name='temp[]' value='"+$(this).val().slice(0 , -1)+"' class='tag_hidden'>"+$(this).val().slice(0 , -1)+"</span>");
//             $('.div').append(" <input type='hidden' name='temp[]' value='"+$(this).val().slice(0 , -1)+"' class='tag_hidden'>");
            //$('.tag_hidden').val($(this).val());
            $(this).val('')
        }
    });

    $('.div').on('click' , 'span' , function () {

        $(this).fadeOut(500,function () {
            $(this).remove();
        })
    })

});


$('#tours_client_id').change(function(){
    var client_id= $("#tours_client_id").val();     
     var client_url=url+'admin/get_client_name';
 
   jQuery.ajax({
        type:"GET",
        url: client_url,
        dataType:'json',
        data: {client_id : client_id},
       success: function(response){
         
	 $('#tour_name').val(response); 

          

        }
      });
});