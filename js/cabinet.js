var editRatingId;

function getResult(data){
    return data=='false'?false:true;
}

function saveComment(){

    $.post(url+"/Rating/saveComment",{id:editRatingId,rating:$("input[name='rating']:checked").val(),description:$("textarea[name='description']").val()},function(data){

        if(getResult(data)) location.reload();
        else bootbox.alert('������ ��������������');

    });
}

// �������������� �����������
$(".editComment").click(function(){

    var obj = $(this);
    editRatingId = obj.attr('id').substr(8);

    $.post(url+"/Rating/editComment",{id:editRatingId},function(data){
        if(getResult(data)) $("#editDiv").html(data);
        else bootbox.alert('������ ��������������');
    });
});

//�������� �����������
$(".deleteComment").click(function(){
    if(!confirm('������� ��������� �����������?')) return false;
    var obj = $(this);
    $.post(url+"/Rating/deleteComment",{id:obj.attr('id').substr(8)},function(data){
        if(getResult(data)) obj.parent().parent().fadeOut();
        else bootbox.alert('������ ��������');
    });
});