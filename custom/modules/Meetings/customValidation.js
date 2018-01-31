isadmin = false;
isvalidated = false;
isadmin = document.getElementById("isadmin").value;
iscalendaradmin = document.getElementById("iscalendaradmin").value;
if (document.getElementById("bono_validado_c").checked == true)
{
  isvalidated = 1;
}
else isvalidated = 0;
//isvalidated = document.getElementById("bono_validado_c").value;


  boton1 = document.getElementById("btn_bono_c");
  boton1.style.display = 'initial';
  
  boton2= document.getElementById("btn_clr_bono_c");
  boton2.style.display = 'initial';
  
    boton3= document.getElementById("btn-save");
  boton3.style.display = 'initial';
  
    boton4= document.getElementById("btn-delete");
  boton4.style.display = 'initial';


if ((isadmin != 'true') && (isvalidated == '1'))
{
  boton1 = document.getElementById("btn_bono_c");
  boton1.style.display = 'none';
  
  boton2= document.getElementById("btn_clr_bono_c");
  boton2.style.display = 'none';
  
    boton3= document.getElementById("btn-save");
  boton3.style.display = 'none';
  
    boton4= document.getElementById("btn-delete");
  boton4.style.display = 'none';
  
  var radios = document.getElementsByName("bono_validado_c"); 
  
    for (var a=0; a<radios.length; a++){ 
        radios[a].style.display = 'none';
    }
       boton4= document.getElementById("bono_validado_c_label");
  boton4.style.display = 'none'; 
  
  alert('La clase ya esta validada. No se puede modificar');
  
}
else if ((isadmin != 'true') && (isvalidated == '0') && (iscalendaradmin != 'true'))
{
  
  var radios = document.getElementsByName("bono_validado_c"); 
  
    for (var a=0; a<radios.length; a++){ 
        radios[a].style.display = 'none';
    }

       boton4= document.getElementById("bono_validado_c_label");
  boton4.style.display = 'none'; 
  
      boton4= document.getElementById("btn-delete");
  boton4.style.display = 'none';
  
}




$.getScript("http://www.ivema.es/crm/custom/underscore-min.js?v=dXknmDRBiLDfFfHoAMdy9Q");




SUGAR.util.doWhen("typeof(check_form) != 'undefined' && typeof check_form == 'function'", function() {
    check_form = _.wrap(check_form, function(originalCheckFormFunction, originalCheckFormFunctionArg) {
        // Adding custom validation 
      

      valor_bono = document.getElementById("bono_c").value;
      
        jQuery.ajax({
        type: "GET",        
        url: 'http://www.ivema.es/crm/custom/bonoId.php?bono_c='+valor_bono,
        //dataType: 'json',
        //data: {functionname: 'getCurr', arguments: [the_string]}, 
         success:function(data) {
           datos = data;
         //alert(data); 
      
         },
          async: false
    });
       
      
      document.getElementById("bonos_bonos_id_c").value = datos;
      
      
      
      

      
      if (valor_bono != "")
      {
      datos = 0;
        jQuery.ajax({
        type: "GET",        
        url: 'http://www.ivema.es/crm/custom/bonoUsed.php?bono_c='+valor_bono,
        //dataType: 'json',
        //data: {functionname: 'getCurr', arguments: [the_string]}, 
         success:function(data) {
           datos = data;
         //alert(data); 
      
         },
          async: false
    });
       record_file = document.getElementById("record").value;
      if ((record_file != datos) && (datos != '0'))
      {
            alert('El bono ya se ha utilizado antes');
        	return false;
      }
      else
      {
        datos = 'false';
         jQuery.ajax({
        type: "GET",        
        url: 'http://www.ivema.es/crm/custom/bonoValido.php?alumno_c='+document.getElementById("account_id_c").value+'&bono_c='+document.getElementById("bono_c").value,
        //dataType: 'json',
        //data: {functionname: 'getCurr', arguments: [the_string]}, 
         success:function(data) {
           datos = data;
         //alert(data); 
      
         },
          async: false
    });       
        
        	if (datos == 'false')
            {
                        alert('El bono no pertenece al alumno');
        				return false;
            }
	        else
    	    {
                // If custom validation is positive, calling original Sugar validation
	            return originalCheckFormFunction(originalCheckFormFunctionArg);

        	}
        

      }

      //  isCustomValid = confirm('Are you sure you want to save this record?');
      }
      else return originalCheckFormFunction(originalCheckFormFunctionArg);

    });
});