var editRatingId;

function getResult(data){
    return data=='false'?false:true;
}

function saveComment(){

    $.post(url+"/cpanel/Rating/saveRating",{id:editRatingId,rating:$("input[name='rating']:checked").val(),description:$("textarea[name='description']").val()},function(data){

        if(getResult(data)) location.href = url+"/cpanel/rating";
        else bootbox.alert('Ошибка редактирования');

    });
    return false;
}

$(document).ready(function(){

// Редактирование комментария
$(".editRow").click(function(){
    var obj = $(this);
    editRatingId = obj.attr("data-rel");
    $.post(url+"/cpanel/Rating/editRating",{id:editRatingId},function(data){
        if(getResult(data)) bootbox.alert(data);
        else bootbox.alert('Ошибка редактирования');
    });
});

//удаление комментария
$(".removeRow").click(function(){
    if(!confirm('Удалить выбранный отзыв?')) return false;
    var obj = $(this);
    $.post(url+"/cpanel/Rating/deleteRating",{id:obj.attr('data-rel')},function(data){
        if(getResult(data)) obj.parent().parent().fadeOut();
        else bootbox.alert('Ошибка удаления');
    });
});

});