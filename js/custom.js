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

});