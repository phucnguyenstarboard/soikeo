var dt_index;

$(document).ready(function() {
    /**
     * Submit search form
     */
    $("#form-search").submit(function(event){
        event.preventDefault();

        searchData($('#form-search'), function(data) { reloadDataTable(data); });
    });

    initDataTable();
});

function reloadDataTable(result) {
    dt_index.destroy();
    $('#search_result').html(result);
    initDataTable();

    if($("#form-create").attr("novalidate")!=undefined){
        $("#form-create").find("input,select,textarea").jqBootstrapValidation('destroy');
        initValidation();
    }
}
