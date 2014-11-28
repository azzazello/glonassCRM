var editRatingId;

function getResult(data){
    return data=='false'?false:true;
}

function saveComment(){

    $.post(url+"/cpanel/Ajax/saveRating",{id:editRatingId,rating:$("input[name='rating']:checked").val(),description:$("textarea[name='description']").val()},function(data){

        if(getResult(data)) location.href = url+"/cpanel/rating";
        else bootbox.alert('Ошибка редактирования');

    });
    return false;
}

function deleteAllRating(){
    var result = new Array();
    $(".rating_checkbox:checked").each(function(){
        result.push($(this).val());
    });

    $.post(url+"/cpanel/Ajax/deleteAllRating", {id:result},function(data){
        if(data=='true') location.reload();
        else bootbox.alert('Ошибка удаления');
    });
}

$(document).ready(function(){



$("#delete_all_record").click(function(){
    bootbox.dialog({
        message: "Удалить выбранные отзывы?",
        title: "Удаление",
        closeButton: true,
        animate: true,
        buttons: {
            danger: {
                label: "Да",
                className: "btn-danger",
                callback: function() {
                    deleteAllRating();
                }
            },
            main: {
                label: "Нет",
                className: "btn-primary"
            }
        }
    });
});


    $('input[name="total"]').change(function () {
        $('.rating_checkbox').prop('checked', this.checked);
    });


// Редактирование комментария
$(".editRow").click(function(){
    var obj = $(this);
    editRatingId = obj.attr("data-rel");
    $.post(url+"/cpanel/Ajax/editRating",{id:editRatingId},function(data){
        if(getResult(data)) bootbox.alert(data);
        else bootbox.alert('Ошибка редактирования');
    });
});

//удаление комментария
$(".removeRow").click(function(){
    var obj = $(this);
    bootbox.dialog({
        message: "Удалить данный отзыв?",
        title: "Удаление",
        buttons:{
            danger: {
                label: "Да",
                className: "btn-danger",
                callback: function() {
                    $.post(url+"/cpanel/Ajax/deleteRating",{id:obj.attr('data-rel')},function(data){
                        if(getResult(data)) location.reload();
                        else bootbox.alert('Ошибка удаления');
                    });
                }
            },
            main: {
                label: "Нет",
                className: "btn-primary",
            }
        }
    });

});

});