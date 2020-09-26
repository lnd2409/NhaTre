$(document).ready(function(){
    $(document).on('click','.openModal',function(){
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            type: "GET",
            url: "{!! route('chi-tiet-giao-vien', ['id'=>"+ id +"]) !!}",
            // data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    });
});
