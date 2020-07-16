$(function(){
   $("#some").keyup(function(){
        var someData = $('#some').val();
        var ByJson = {'text':someData};
        $.ajax({
             url:'AJAX.php',
             type:'post',
             data: ByJson ,
             success:function(any){
                $('.searchList').html(any);
             }
        })  ;

      return false ;
   });
});