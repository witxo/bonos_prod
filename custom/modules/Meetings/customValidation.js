SUGAR.util.doWhen("typeof(check_form) != 'undefined' && typeof check_form == 'function'", function() {
    check_form = _.wrap(check_form, function(originalCheckFormFunction, originalCheckFormFunctionArg) {
        // Adding custom validation 
      datos = 0;
        jQuery.ajax({
        type: "GET",        
        url: 'http://www.ivema.es/crm3/custom/bonoUsed.php?bono_c='+document.getElementById("bono_c").value,
        //dataType: 'json',
        //data: {functionname: 'getCurr', arguments: [the_string]}, 
         success:function(data) {
           datos = data;
         //alert(data); 
      
         },
          async: false
    });
       record_file = document.getElementById("record").value;
      if (record_file == datos)
      {
           // If custom validation is positive, calling original Sugar validation
            return originalCheckFormFunction(originalCheckFormFunctionArg);
      }
      else
      {
        alert('El bono ya se ha utilizado antes');
        return false;
      }

      //  isCustomValid = confirm('Are you sure you want to save this record?');
        

    });
});