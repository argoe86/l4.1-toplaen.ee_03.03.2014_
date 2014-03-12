$(document).ready(function (){
$('#taotlus_summa').live('keyup', function(){
  var summa=parseInt($('#taotlus_summa').val());
if(!summa){
  summa=0;
}
  var half="15 päeva "+parseInt(summa*1.1)+" €";
  var full="30 päeva "+parseInt(summa*1.2)+" €";
      $('#teie-laen').css({'background-color':'#2ecc71', 'color':'white'})
      $('#teie-laen').val(half +" | " + full)

});

$('#laenutaotluse_saada_nupp').bind('click', function(){
 var ankeet= $('#laenutaotluse_ankeet').serialize();
 $.post("front_update.php",{func:'laenutaotlus',ankeet:ankeet}, function (data){

    if(data['laenutaotlus']['response']){
  //    alert("Taotlus on edukalt edastatud.");
      var eesnimi=$("#i_eesnimi").val();
      var perenimi=$("#i_perenimi").val();
      var telefon=$("#i_telefon").val();
      var email=$("#i_email").val();


        dhtmlx.modalbox({ 
      title:"Teade", 
      text:"<span>Tere "+eesnimi+" "+perenimi+", <br> Teie laenutaotlus on edukalt saadetud. Positiivse laenuvastuse puhul helistatakse teile teie poolt antud numbril "+telefon+", juhul kui teiega ei ole ühendust võetud kontrollige oma emaili aadressi "+email+".<br><input type='button' onclick='dhtmlx.modalbox.hide(this)' value='Sulge'></span>",
    //  text:"Height, widht and position can be redeined<br><br> You can use code like <div><code>onclick='dhtmlx.modalbox.hide(this)'</code></div> to close a modal box <br/><br/> <a href='#' onclick='dhtmlx.modalbox.hide(this)'>click to close</a>",
      width:"450px",
      height:"300px"
    });
     document.getElementById("laenutaotluse_ankeet").reset();



    }
 },"json")

 
})

  $.post('front_update.php', {func:'maakond'}, function(data){
           var tmpl=_.template($('#template-maakond').html())
           var html=tmpl({maakonnad:data['maakonnad']})
           $('#select-maakond').html(html);
  },"json")

$("#county").live('change',function  () {
 var maakond= $("#"+this.id +" option:selected").val();
  $.post('front_update.php', {func:'linnkyla', type:maakond}, function(data){
           var tmpl=_.template($('#template-linnkyla').html())
           var html=tmpl({linnkyla:data['linnkyla']})
           $('#select-linnkyla').html(html);
  },"json")






})


$("#linnkyla").live('change',function  () {
 var linnkyla= $("#"+this.id +" option:selected").val();

  $.post('front_update.php', {func:'tanavtalu', type:linnkyla}, function(data){
           var tmpl=_.template($('#template-tanavtalu').html())
           var html=tmpl({tanavtalu:data['tanavtalu']})
           $('#select-tanavtalu').html(html);
  },"json")

})


   $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
 
  });

   


/*
  LoanApplicationForm = Backbone.View.extend({
     el:$('.Loan-Application-Form'),
     events:{
        'click input':'message',

     },
     message:function (e){
      //alert($(e.target).data("id"))
    //  alert(e.currentTarget.id);
     },

   })
*/
  var editor = new Editor;
 // var editor =  new LoanApplicationForm;


$("#plaenu").bind('click',function (){
$("#plaenu").overlay({url:'laenutaotlus.php'});
})
/*        $( ".laenu-slider" ).slider({
            value:0,
            min: 0,
            max: 9,
            step: 1,
            slide: function( event, ui ) {

                $( "#slider-summa" ).val( sliderValue [ ui.value ] );
                
               var kokku= parseFloat($( "#slider-summa" ).val())+parseFloat($( "#slider-summa" ).val()) / 100 * parseFloat(intress[$('.period-slider').slider("option","value")]);
               //  $('.tulemus').html('Laenusumma '+ $( "#slider-summa" ).val()+' Eurot + Intress '+ $( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")] + ' Eurot<br>Tagasimakse kokku:  '+ kokku)
                 $('.tulem_laen').html($( "#slider-summa" ).val())
                 $('.tulem_intress').html($( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")])
                 $('.tulem_kokku').html(kokku)                                  
            }
           
        });
            $( ".period-slider" ).slider({
            value:0,
            min: 0,
            max: 9,
            step: 1,
              start: function( event, ui ) {
              kokku='';
                              $( "#slider-period" ).val( periodValue_n [ ui.value ] );
               var kokku= parseFloat($( "#slider-summa" ).val())+parseFloat($( "#slider-summa" ).val()) / 100 * parseFloat(intress[$('.period-slider').slider("option","value")]);
               //  $('.tulemus').html('Laenusumma '+ $( "#slider-summa" ).val()+' Eurot + Intress '+ $( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")] + ' Eurot<br>Tagasimakse kokku:  '+ kokku)
                 $('.tulem_laen').html($( "#slider-summa" ).val())
                 $('.tulem_intress').html($( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")])
                 $('.tulem_kokku').html(kokku)   
                 kokku='';
              },

            slide: function( event, ui ) {
            kokku='';
               
               var kokku= parseFloat($( "#slider-summa" ).val())+parseFloat($( "#slider-summa" ).val()) / 100 * parseFloat(intress[$('.period-slider').slider("option","value")]);
               //  $('.tulemus').html('Laenusumma '+ $( "#slider-summa" ).val()+' Eurot + Intress '+ $( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")] + ' Eurot<br>Tagasimakse kokku:  '+ kokku)
                 $('.tulem_laen').html($( "#slider-summa" ).val())
                 $('.tulem_intress').html($( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")])
                 $('.tulem_kokku').html(kokku) 
                 kokku='';               
                  $( "#slider-period" ).val( periodValue_n [ ui.value ] );                  
            }
        });


        $( "#slider-period" ).val( periodValue [0] );
                $( "#slider-summa" ).val( sliderValue [0] );
   
        var kokku= parseFloat($( "#slider-summa" ).val())+parseFloat($( "#slider-summa" ).val()) / 100 * parseFloat(intress[$('.period-slider').slider("option","value")]);              
    //  	 $('.tulemus').html('Laenusumma '+ $( "#slider-summa" ).val()+' Eurot + Intress '+ $( "#slider-summa" ).val()/100*intress[$('.period-slider').slider("option","value")] + " Eurot<br>Tagasimakse kokku: "+kokku)
 */      
})
function toggle_editor(){
	
	$('#editor1').hide()

}

