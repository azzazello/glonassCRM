jQuery(document).ready(function() {


    jQuery("#select-basic, #select-multi").select2();
    jQuery('#select-search-hide').select2({minimumResultsForSearch: 5});
    $(".datepicker").pickadate(
        { monthsFull: ['������', '�������', '����', '������', '���', '����', '����', '������', '��������', '�������', '������', '�������'],
        monthsShort: ['���','���','���','���','���','���','���','���','���','���','���','���'],
        weekdaysFull: ['�����������','�����������','�������','�����','�������','�������','�������'],
        weekdaysShort:  ['��','��','��','��','��','��','��'],
        showMonthsShort: undefined,
        showWeekdaysFull: undefined,
        today: '�������',
        clear: '��������',
        format: 'yyyy-mm-dd'}
    );

    $(".float").keyup(function(){
        $(this).val( $(this).val().replace(",","."));
    });

});