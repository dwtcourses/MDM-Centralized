$('#select').change(function(){
    var appID = $(this).val();
    var $table = $("#table");
    if(appID){
        $.ajax({
            type:"GET",
            url:"{{url('get-table')}}?id_aplikasi="+appID,
            success:function(res){
                if(res){
                    $table.empty();
                    $table.append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $table.append('<option value="'+key+'">'+value+'</option>');
                    });

                }else{
                    $table.empty();
                }
            }
        });
    }else{
        $table.empty();
        $('#column').empty();
    }
});
$('#table').on('change',function(){
    var tableID = $(this).val();
    var $kolom = $("#column");
    if(tableID){
        $.ajax({
            type:"GET",
            url:"{{url('get-column')}}?id_tabel="+tableID,
            success:function(res){
                if(res){
                    $kolom.empty();
                    $.each(res,function(key,value){
                        $kolom.append('<option value="'+key+'">'+value+'</option>');
                    });

                }else{
                    $kolom.empty();
                }
            }
        });
    }else{
        $kolom.empty();
    }

});