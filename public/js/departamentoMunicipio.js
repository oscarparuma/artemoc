jQuery(document).ready(function () {
    jQuery('select[name="departamento"]').on('change', function() {
        var departamentoID = jQuery(this).val();
        if(departamentoID) {
            jQuery.ajax({
                url : '/findMunicipioWithDepartamentoID/' + departamentoID,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                console.log(data);
                jQuery('select[name="municipio"]').empty();
                jQuery.each(data, function(key,value){
                    $('select[name="municipio"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
                }
            });
        } else {
            $('select[name="municipio"]').empty();
        }
    });
});