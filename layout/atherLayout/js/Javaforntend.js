//Hide Placeholder On Form login Focus
$("input").on('focus',function () {
    $place = $(this).attr("placeholder");
   $(this).attr("placeholder","");
  }).on("blur",function () {
    $(this).attr("placeholder",$place);

  });




// close the refrch relode
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
 }  ;


 

$(function()
{
 'use strict';

  // Switch Between Login & Signup

  $('.login-page h1 span').click(function () {
    $(this).addClass('selected').siblings().removeClass('selected');
    $('.login-page form').hide();
    $('.' + $(this).data('class')).fadeIn(150);
  });



 /*ADD Astrisk   On Required Field */
 $('input').each(function(){
  if($(this).attr('required')==='required'){
   $(this).after('<span class="asterisk">*</span>');
  }
 });


  //confirmtion massage on button
  $('.confirm').click(function (){
    return confirm('Are You Sure ?');
  });


  $('.live').keyup(function(){

    $($(this).data('class')).text($(this).val());
  });

   /* Start Contact Form */ // الجزء الخاص بنموذج ^ تواصل معنا ^ ممكن استخدام الكلاسات الخاصه به 

 var userError = true,
        emailError = true,
        msgError = true;

    $('.contact-username').blur(function(){

        if($(this).val().length < 4 ){
            $(this);
            $(this).css('border','1px solid #f00').parent().find('.custom-alert').fadeIn(200)
                                                     .end().find('.asterisx').fadeIn(100);
            userError = true;
        }else{
            $(this);
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200)
                                                     .end().find('.asterisx').fadeOut(100);
            userError = false;
        }
    });


    $('.email').blur(function(){

        if($(this).val()==='' ){
            $(this).css('border','1px solid #f00').parent().find('.custom-alert').fadeIn(200)
                                                     .end().find('.asterisx').fadeIn(100);
            emailError = true;
        }else{
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200)
                                                     .end().find('.asterisx').fadeOut(100);
            emailError = false;
        }
    });    

    
    $('.massage').blur(function(){

        if($(this).val().length < 10 ){
            $(this).css('border','1px solid #f00').parent().find('.custom-alert').fadeIn(200)
                                                     .end().find('.asterisx').fadeIn(100);
            msgError = true;
        }else{
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200)
                                                     .end().find('.asterisx').fadeOut(100);
            msgError = false;
        }
    });      

    // submit form validation
    $('.contact-form').submit(function (e) {
        if(userError === true || emailError === true || msgError === true ){
            e.preventDefault();
            $('.username , .email , .massage ').blur();
        }
    });
 
    
  // Trigger The Selectboxit 
  $("select").selectBoxIt({
    autoWidth: false
  });


});
