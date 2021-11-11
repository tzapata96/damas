var dragged;
var fichaId;
var targetId;
var target1Id;
var target2Id;
var target1_Id;
var target2_Id;
var targetEat1;
var comer1 = 0;
var targetEat2;
var comer2 = 0;
var target2;
var vacioTG1 = 0;
var vacioTG2 = 0;
var EatTg;

var RTG1 = 0;

var countTG = 1;
var count = 1;

 /* while(countTG <= 64 && countTG >= 1 ){
    (RTG + count) = parseFloat(fichaId) - parseFloat(7);
    (RTG + count) = countTG;
    $('#'+(RTG + count).addClass('dropzone'));
    $('#'+(RTG + count).removeClass('a'));
    $('#'+(RTG + count).css('background-color', '#18171c'));
    count++;
  }*/

  function EnviarFicha(idFicha, Posicion){
    /*$.post('recibir.php', {idFicha, Posicion}, function(data){
      if(data!=null){
        alert('los datos se enviaron correctamente');
      }else
      alert(' los datos no se enviaron correctamente');*/
      var url = "recibir.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: (idFicha, Posicion),
           success: function(data)             
           {
             $('#resp').html(data); 
    }
  })
  
  /*(document).on('ready',function(){       
    $('#btn-ingresar').click(function(){
        var url = "datos_login.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: idFicha, Posicion,
           success: function(data)             
           {
             $('#resp').html(data);               
           }
       });
    });
});
  */
  
  
  
}

  /* events fired on the draggable target */
  document.addEventListener("drag", function( event ) {
  }, false);

  document.addEventListener("dragstart", function( event ) {
    
    vacioTG1 = 0;
    vacioTG2 = 0;
    
    let target2Id = 0;
    let target1Id = 0;
    // store a ref. on the dragged elem
      dragged = event.target;
      // make it half transparent
      event.target.style.opacity = .5;
      fichaId = event.target.parentNode.id;
      color = dragged.alt;
      foto = dragged.src;
      console.log(fichaId);
      console.log(event.target.parentNode);
     // console.log(('#'+fichaId).is(':empty'));
     
     

     

    //fichaId == 1 || fichaId == 17 || fichaId == 33 || fichaId == 49

    //fichaId == 16 || fichaId == 32 || fichaId == 48 || fichaId == 64

     
     
     
      if (color == "a"){
        target1Id = parseFloat(fichaId) - parseFloat(7);
        target2Id = parseFloat(fichaId) - parseFloat(9);
        targetEat1 = parseFloat(target1Id) - parseFloat(7);
        targetEat2 = parseFloat(target2Id) - parseFloat(9);
        console.log("entrar");
      }else{
        target1Id = parseFloat(fichaId) + parseFloat(7);
        target2Id = parseFloat(fichaId) + parseFloat(9);
        targetEat1 = parseFloat(target1Id) + parseFloat(7);
        targetEat2 = parseFloat(target2Id) + parseFloat(9);
        console.log(targetEat1, targetEat2, 'AAAAAB');
      }

      

      console.log(fichaId, targetEat1, targetEat2, 'AAAAAB');
      
      target2 = target2Id;
      target1_Id = target1Id;
      target2_Id = target2Id;
      target1Id = '#'+ target1Id;
      target2Id = '#'+ target2Id;

      console.log($(target1Id), $(target2Id), 'AAAA');

      vacioTG1  = $(target1Id).is(':empty');
      vacioTG2 = $(target2Id).is(':empty');

      /*if(fichaId == 44){
        while(countTG <= 64 && countTG >= 1 ){
          (RTG + count) == parseFloat(fichaId) - parseFloat(7);
          (RTG + count) == countTG;
          $('#'+(RTG + count).addClass('dropzone'));
          $('#'+(RTG + count).removeClass('a'));
          $('#'+(RTG + count).css('background-color', '#18171c'));
          count++;
          console.log((RTG + count));
        }
      }*/

       
    /*if(foto = "assets/damajust1.png"){
      while(fichaId != 1 && fichaId != 17 && fichaId != 33 && fichaId != 49 && fichaId != 3 && fichaId != 5 && fichaId != 7){
        RTG1 = parseFloat(fichaId) - parseFloat(-7);
        $('#'+RTG1).addClass('dropzone');
        $('#'+RTG1).removeClass('a');
        $('#'+RTG1).css('background-color', '#18171c');
        fichaId = RTG1; 
      count++
    }

      while (fichaId != 16 || fichaId != 32 || fichaId != 48 || fichaId != 64 || fichaId != 3 || fichaId != 5 || fichaId != 7){
        RTG2 = parseFloat(fichaId) - parseFloat(-9);
        $('#'+RTG2).addClass('dropzone');
        $('#'+RTG2).removeClass('a');
        $('#'+RTG2).css('background-color', '#18171c');
        fichaId = RTG2; 
      count++
      }

      while(fichaId != 1 || fichaId != 17 || fichaId != 33 || fichaId != 49 || fichaId != 64 || fichaId != 62 || fichaId != 59 || fichaId != 57){
        RTG3 = parseFloat(fichaId) - parseFloat(-9);
        $('#'+RTG3).addClass('dropzone');
        $('#'+RTG3).removeClass('a');
        $('#'+RTG3).css('background-color', '#18171c');
        fichaId = RTG3; 
      count++
      }

      while(fichaId != 16 || fichaId != 32 || fichaId != 48 || fichaId != 64 || fichaId != 62 || fichaId != 59 || fichaId != 57){
        RTG4 = parseFloat(fichaId) - parseFloat(-9);
        $('#'+RTG4).addClass('dropzone');
        $('#'+RTG4).removeClass('a');
        $('#'+RTG4).css('background-color', '#18171c');
        fichaId = RTG4; 
      count++
      }
    //}else{*/

      if (fichaId == 1 || fichaId == 17 || fichaId == 33 || fichaId == 49){
          if(color != "a"){
            if (!$(target2Id).is(':empty') && $('#'+targetEat2).is(':empty')){
              $('#'+targetEat2).removeClass('a');
              $('#'+targetEat2).addClass('dropzone');
              $('#'+targetEat2).css('background-color', '#18171c');
              comer1 = 1;
              console.log('OPA LA COCA');
            }else{
              $(target2Id).removeClass('a');
              $(target2Id).addClass('dropzone');
              $(target2Id).css('background-color', '#18171c');
            }
            console.log('target 2');
          }else{
            if (!$(target1Id).is(':empty') && $('#'+targetEat1).is(':empty')){
              $('#'+targetEat1).removeClass('a');
              $('#'+targetEat1).addClass('dropzone');
              $('#'+targetEat1).css('background-color', '#18171c');
              comer2 = 1;
            }else{
              $(target1Id).removeClass('a');
              $(target1Id).addClass('dropzone');
              $(target1Id).css('background-color', '#18171c');
            }

            console.log('target 1');
          }
    }else if(fichaId == 16 || fichaId == 32 || fichaId == 48 || fichaId == 64){
      if(color != "a"){
          if (!$(target2Id).is(':empty') && $('#'+targetEat2).is(':empty')){
            $('#'+targetEat2).removeClass('a');
            $('#'+targetEat2).addClass('dropzone');
            $('#'+targetEat2).css('background-color', '#18171c');
            console.log('opa la coca');
            comer1 = 1;
          }else{
            $(target1Id).removeClass('a');
            $(target1Id).addClass('dropzone');
            $(target1Id).css('background-color', '#18171c');
          }

            console.log('target 1');
          }else{
            //console.log('APA LA COKITA');
            //console.log($(tar))
            if (!$(target2Id).is(':empty') && $('#'+targetEat2).is(':empty')){
              $('#'+targetEat2).removeClass('a');
              $('#'+targetEat2).addClass('dropzone');
              $('#'+targetEat2).css('background-color', '#18171c');
              console.log('OPA LA COCA');
              comer2 = 1;
            }else{
              $(target2Id).removeClass('a');
              $(target2Id).addClass('dropzone');
              $(target2Id).css('background-color', '#18171c');
            }

            console.log('target 2');
          }
    }else{
      console.log('entrando');
      console.log(vacioTG1, vacioTG2);
      if (vacioTG1 == true  && vacioTG2 == true){
        $(target1Id).addClass("dropzone");
        $(target1Id).removeClass('a');
        $(target1Id).css('background-color', '#18171c');
        $(target2Id).addClass("dropzone");
        $(target2Id).removeClass('a');
        $(target2Id).css('background-color', '#18171c');
        console.log('nada');

    }else if (vacioTG1 == false && vacioTG2 == true){

      // SEGUN EL COLOR:
      // Ficha blanca come a negra -- targetEat1 -- target1_Id - 49
      // Ficha negra come a blanca -- targetEat1 -- target1_Id - 64
    console.log(dragged.alt, $(target1Id).children('img').attr('alt'));
    
    if ($(target1Id).children('img').attr('alt') != color){
      //fichaId != 16 && fichaId != 32 && fichaId != 48 && fichaId != 64
      console.log(target1_Id);
    if(color != 'a'){
      if ($('#'+targetEat1).is(':empty') && target1_Id != 1 && target1_Id != 17 && target1_Id != 33 && target1_Id != 49){
       // if(target1_Id != 16 || target1_Id != 32 || target1_Id != 48 || target1_Id != 64){ 
          $('#'+targetEat1).removeClass('a');
          $('#'+targetEat1).addClass('dropzone');
          $('#'+targetEat1).css('background-color', '#18171c');
          comer1 = 1;
          console.log($('#'+targetEat2));
          console.log('entrar');
        //}
      }else{
        $(target2Id).addClass('dropzone');
        $(target2Id).removeClass('a');
        $(target2Id).css('background-color', '#18171c');
        console.log('AAA');
      }
      console.log('comer target 1');
    
    }else{
      if ($('#'+targetEat1).is(':empty') && target1_Id != 16 && target1_Id != 32 && target1_Id != 48 && target1_Id != 64){
        // if(target1_Id != 16 || target1_Id != 32 || target1_Id != 48 || target1_Id != 64){ 
           $('#'+targetEat1).removeClass('a');
           $('#'+targetEat1).addClass('dropzone');
           $('#'+targetEat1).css('background-color', '#18171c');
           comer1 = 1;
           console.log($('#'+targetEat2));
           console.log('entrar');
         //}
       }else{
         $(target2Id).addClass('dropzone');
         $(target2Id).removeClass('a');
         $(target2Id).css('background-color', '#18171c');
         console.log('AAA');
       }
       console.log('comer target 1');


    }
    }else{
      $(target2Id).addClass('dropzone');
      $(target2Id).removeClass('a');
      $(target2Id).css('background-color', '#18171c');
      $(target1Id).addClass('dropzone');
      $(target1Id).removeClass('a');
      $(target1Id).css('background-color', '#18171c');
    }
    
  }else if(vacioTG1 == true && vacioTG2 == false){
      console.log('AAAA');
      //console.log($(target2Id).children('img').attr('alt'));
      //console.log(color);
      
      // SEGUN EL COLOR
      // ficha negra come a blanca -- targetEat2 && target2_Id --  49 FINAL
      // ficha blanca come a negra -- targetEat2 && target2_Id -- 64 FINAL

    if ($(target2Id).children('img').attr('alt') != color){
      console.log(target2_Id + 'AAAAA');
      
    if(color != 'a'){
      if ($('#'+targetEat2).is(':empty') && target2_Id != 16 && target2_Id != 32 && target2_Id != 48 && target2_Id != 64){
        
        //target2Id.remplace('#',"");
        console.log(target2Id);
        //if(target2_Id != 1 && target2_Id != 17 && target2_Id != 33 && target2_Id != 49){ 
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).css('background-color', '#18171c');
        comer2 = 1;
        console.log($('#'+targetEat2));
        console.log('AAA');
        //}
      }else{
        $(target1Id).addClass('dropzone');
        $(target1Id).removeClass('a');
        $(target1Id).css('background-color', '#18171c');
        console.log($(target2Id));
      }
      console.log('comer target 1');
    
    }else{
      if ($('#'+targetEat2).is(':empty') && target2_Id != 1 && target2_Id != 17 && target2_Id != 33 && target2_Id != 49){
        
        //target2Id.remplace('#',"");
        console.log(target2Id);
        console.log("AAAAAABUENAS");
        //if(target2_Id != 1 && target2_Id != 17 && target2_Id != 33 && target2_Id != 49){ 
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).css('background-color', '#18171c');
        comer2 = 1;
        console.log($('#'+targetEat2));
        console.log('AAA');
        //}
      }else{
        $(target1Id).addClass('dropzone');
        $(target1Id).removeClass('a');
        $(target1Id).css('background-color', '#18171c');
        console.log($(target2Id));
      }
      console.log('comer target 1');
    }
    
    }else{
      $(target2Id).addClass('dropzone');
      $(target2Id).removeClass('a');
      $(target2Id).css('background-color', '#18171c');
      $(target1Id).addClass('dropzone');
      $(target1Id).removeClass('a');
      $(target1Id).css('background-color', '#18171c');
    }
    }else if(vacioTG1 == false && vacioTG2 == false){
      console.log('comer tg1y2');
      console.log($(target1Id).children('img').attr('alt'), $(target2Id).children('img').attr('alt'));
      console.log($('#'+targetEat1).is(':empty'), $('#'+targetEat2).is(':empty'));
      console.log(fichaId, targetEat2, targetEat1);
    if ($(target1Id).children('img').attr('alt') != color && $(target2Id).children('img').attr('alt') != color){
      if ($('#'+targetEat1).is(':empty') && $('#'+targetEat2).is(':empty')){
        $('#'+targetEat1).addClass('dropzone');
        $('#'+targetEat1).removeClass('a');
        $('#'+targetEat1).css('background-color', '#18171c');
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).css('background-color', '#18171c');
        comer1 = 1;
        comer2 = 1;
        console.log('AAAA');
      }else if($('#'+targetEat2).is(':empty') == true){
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).css('background-color', '#18171c');
        comer2 = 1;
      }else if($('#'+targetEat1).is(':empty') == true){
        $('#'+targetEat1).addClass('dropzone');
        $('#'+targetEat1).removeClass('a');
        $('#'+targetEat1).css('background-color', '#18171c');
        comer1 = 1;
        console.log()
      }else{
        console.log('nothing')

      }  
    }else{
      $(target2Id).addClass('dropzone');
      $(target2Id).removeClass('a');
      $(target2Id).css('background-color', '#18171c');
      $(target1Id).addClass('dropzone');
      $(target1Id).removeClass('a');
      $(target1Id).css('background-color', '#18171c');
    }
  }
}   
     

    console.log(vacioTG1, vacioTG2);
    /*switch(vacioTG1 & vacioTG2){
      case true & true:
        console.log('funciona AAA');
        console.log(vacioTG1, vacioTG2);
        break;
      case false & true:
        console.log('comer target1');
        console.log(vacioTG1, vacioTG2);
        break;
      case true & false:
        console.log('comer target2');
        console.log(vacioTG1, vacioTG2);
        break;
      case false & false:
      console.log('comer target1 o target2');
      console.log(vacioTG1, vacioTG2);
      break;
    }*/
    
    /*if (vacioTG1 == true  && vacioTG2 == true){
        $(target1Id).addClass("dropzone");
        $(target1Id).removeClass('a');
        $(target1Id).css('background-color', '#18171c');
        $(target2Id).addClass("dropzone");
        $(target2Id).removeClass('a');
        $(target2Id).css('background-color', '#18171c');
        console.log('nada');

    }else if (vacioTG1 == false && vacioTG2 == true){
      if ($('#'+targetEat1).is(':empty')){
          $('#'+targetEat1).removeClass('a');
          $('#'+targetEat1).addClass('dropzone');
          $('#'+targetEat1).css('background-color', '#18171c');
        console.log($('#'+targetEat2));
        console.log('entrar');
      }else{
        $(target1Id).addClass('dropzone');
      }
      console.log('comer target 1');

    }else if(vacioTG1 == true && vacioTG2 == false){
      if ($('#'+targetEat2).is(':empty')){
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).css('background-color', '#18171c');
        console.log($('#'+targetEat2));
        console.log('entrar');
      }else{
        $(target2Id).addClass('dropzone');
      }
      console.log('comer target 1');
    }else if(vacioTG1 == false && vacioTG2 == false){
      console.log('comer tg1y2');
      
      if ($('#'+targetEat1).is(':empty')){
        $('#'+targetEat1).addClass('dropzone');
        $('#'+targetEat1).removeClass('a');
        $('#'+targetEat1).css('background-color', '#18171c');
      }else if($('#'+targetEat2).is(':empty')){
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).css('background-color', '#18171c');
      }else if($('#'+targetEat1).is(':empty') && $('#'+targetEat2).is(':empty')){
        $('#'+targetEat1).addClass('dropzone');
        $('#'+targetEat1).removeClass('a');
        $('#'+targetEat1).css('background-color', '#18171c');
        $('#'+targetEat2).addClass('dropzone');
        $('#'+targetEat2).removeClass('a');
        $('#'+targetEat2).css('background-color', '#18171c');
        console.log()
      }else{
        console.log('nothing');

      }
      console.log('comer target 1');
     
      console.log('comer target 1 y 2');
    
    }*/
  }
  , false);

  document.addEventListener("dragend", function( event ) {
      // reset the transparency
      event.target.style.opacity = "";
      
      fichaId = dragged.parentNode.id;
      color = dragged.alt;

      let target11Id;
      let target22Id;

      if (color == "a"){
        target11Id = parseFloat(fichaId) - parseFloat(7);
        target22Id = parseFloat(fichaId) - parseFloat(9);
        targetEat1 = parseFloat(target11Id) - parseFloat(7);
        targetEat2 = parseFloat(target22Id) - parseFloat(9);
      }else{
        target11Id = parseFloat(fichaId) + parseFloat(7);
        target22Id = parseFloat(fichaId) + parseFloat(9);
        targetEat1 = parseFloat(target11Id) + parseFloat(7);
        targetEat2 = parseFloat(target22Id) + parseFloat(9);
      }

      $("#"+target11Id).removeClass('dropzone');
      $("#"+target22Id).removeClass('dropzone');
      $('#'+targetEat1).removeClass('dropzone');
      $('#'+targetEat2).removeClass('dropzone');
      $("#"+fichaId).removeClass('dropzone');

  }, false);

  /* events fired on the drop targets */
  document.addEventListener("dragover", function( event ) {
      // prevent default to allow drop
      event.preventDefault();
  }, false);

  document.addEventListener("dragenter", function( event ) {
      // highlight potential drop target when the draggable element enters it
      if ( event.target.className == "dropzone" ) {
          event.target.style.background = "#231a24";
      }

  }, false);

  document.addEventListener("dragleave", function( event ) {
      // reset background of potential drop target when the draggable element leaves it
      if ( event.target.className == "dropzone" ) {
          event.target.style.background = "#18171c";
      }

  }, false);

  document.addEventListener("drop", function( event ) {
      // prevent default action (open as link for some elements)
      event.preventDefault();
      // move dragged elem to the selected drop target
      if ( event.target.className == "dropzone" ) {
          event.target.style.background = "#18171c";
               
          fichaId = dragged.parentNode.id;
          color = dragged.alt;

          let target11Id;
          let target22Id;

          if (color != "a" && fichaId == 64 || fichaId != 62 || fichaId != 59 || fichaId != 57){
            $('#'+event.target.id).attr('src') == 'assets/damajust1.png';
          }else if(color = "a" && fichaId == 1 || fichaId == 3 || fichaId == 5 || fichaId == 7){
            $('#'+event.target.id).attr('src') == 'assets/damajust1.png';
          }

          if (color == "a"){
            target11Id = parseFloat(fichaId) - parseFloat(7);
            target22Id = parseFloat(fichaId) - parseFloat(9);
            console.log("entrar");
          }else{
            target11Id = parseFloat(fichaId) + parseFloat(7);
            target22Id = parseFloat(fichaId) + parseFloat(9);
          }

          $("#"+target11Id).removeClass('dropzone');
          $("#"+target22Id).removeClass('dropzone');
          $("#"+fichaId).removeClass('dropzone');

          
            if (comer1 == 1){
            $('#'+target11Id).empty();
            }else if(comer2 == 1){
            $('#'+target22Id).empty();
          }
        

          console.log(fichaId);
          console.log(event.target.id);

          var url = "recibir.php";
          $.ajax({                        
           type: "POST",                 
           url: url,                     
           data:  {'idficha': fichaId ,'target' : event.target.id},
           //processData: false,
           success: function(data)             
           {
             $('.user').html(data); 
             }
            })
        
        //setTimeout(come,30000, comer1, comer2, target22Id, target11Id);
          
          dragged.parentNode.removeChild( dragged );
          event.target.appendChild( dragged );
          console.log(event.target.id);

      }
  }, false);