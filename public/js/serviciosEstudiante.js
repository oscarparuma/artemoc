jQuery(document).ready(function () {
    jQuery('select[id="estudiante_id"]').on('change',function(){
        var estudianteID = jQuery(this).val();
        if(estudianteID) {
            jQuery.ajax({
                url : '/serviciosestudiantes/getservicios/' + estudianteID,
                type : "GET",
                dataType : "json",
                success: function(data) {
                    //console.log(data);
                    jQuery('select[name="servicio"]').empty();
                    jQuery.each(data, function(key,value) {
                        $('select[name="servicio"]').append('<option value="'+ value.servicio.id +'">'+ value.servicio.nombre +'</option>');
                    });
                }
            });
        } else {
            $('select[name="servicio"]').empty();
        }
    });
});