jQuery(document).ready(function() {


    jQuery("#select-basic, #select-multi").select2();
    jQuery('#select-search-hide').select2({minimumResultsForSearch: 5});
    $(".datepicker").pickadate(
        { monthsFull: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthsShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
        weekdaysFull: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        weekdaysShort:  ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        showMonthsShort: undefined,
        showWeekdaysFull: undefined,
        today: 'Сегодня',
        clear: 'Очистить',
        format: 'yyyy-mm-dd'}
    );

    $(".float").keyup(function(){
        $(this).val( $(this).val().replace(",","."));
    });

    $("#add_trader").click(function(){
        if($(this).hasClass("save_trader")) saveTrader();
        $(this).html("cохранить").addClass("save_trader");
        $("#add_trader_input").fadeIn();
        return false;
    });

    function showMessage(str){
        bootbox.alert(str);
        return false;
    }

    function saveTrader(){
        var obj = $("#add_trader_input");
        if(obj.val().length==0) return showMessage('Введиет название Трейдера');

        $.post(url+"/cpanel/Ajax/addTrader",{trader:obj.val()},function(data){
           if(parseInt(data)) {
               $("#add_trader_input").css("marginTop","0");
               $("#add_trader_input").prev("br").remove();
               $("#add_trader,#s2id_trader,#trader").remove();
               bootbox.alert("Сохранение прошло успешно");
               obj.attr("disabled","disabled");
               $("#add_trader_input").after("<input type='hidden' value='"+data+"' name='trader'>");
           }else bootbox.alert("Ошибка добавления Трейдера");
        });

    }

});