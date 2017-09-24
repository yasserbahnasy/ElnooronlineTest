/*###################<ADD Like>####################*/
function addLike($id){
    
     var formData = new FormData($("#form1")[0]);
         $.ajax({
         type: "post",
         url: "/like/"+$id,
         data: formData,
         async: false,
         cache: false,
         contentType: false,
         processData: false,
             success: function(data){
             $("#divider").html(data);
             }
         });
   }
/*###################</ADD Like>####################*/


/*###################<ADD DisLike>####################*/
function addDisLike($id){

     var formData = new FormData($("#form1")[0]);
         $.ajax({
         type: "post",
         url: "/dislike/"+$id,
         data: formData,
         async: false,
         cache: false,
         contentType: false,
         processData: false,
             success: function(data){
             $("#divider").html(data);
             }
         });
   }
   /*###################</ADD Like>####################*/
  