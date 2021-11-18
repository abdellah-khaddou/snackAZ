function showNewContent() {
    // i dont use set function because faible perfermance website
    //not working
    // Code here

    var n_td_h = $(".designtable thead tr ").children('th').length;
    var n_tr_b = $(".designtable tbody ").children('tr').length;
    for(i=0,j=1;i<n_td_h;i++,j++){
        $(".designtable thead tr th").eq(i).addClass('column'+j);
        $(".designtable thead tr th").eq(i).attr("data-column","column"+j);
    }
    for(i=0;i<n_tr_b;i++){
        var n_td_b = $("tbody tr:eq("+i+") ").children('td').length;
        for(j=0,x=1;j<n_td_b;j++,x++){
            $("tbody tr:eq("+i+") td:eq("+j+")").addClass('column'+x);
            $("tbody tr:eq("+i+") td:eq("+j+")").attr("data-column",'column'+x);
        }
    }
    //$("tbody tr:eq(1) td:eq(2)").css('color','black');

    $(".designtable thead tr ").addClass('head');
    $(".designtable thead tr th ").addClass('column100');
    $(".designtable  tr ").addClass('row100');
    $(".designtable  td ").addClass('column100');

    (function ($) {
        "use strict";
        $('.column100').on('mouseover',function(){
            var table1 = $(this).parent().parent().parent();
            var table2 = $(this).parent().parent();
            var verTable = $(table1).data('vertable')+"";
            var column = $(this).data('column') + "";

            $(table2).find("."+column).addClass('hov-column-'+ verTable);
            $(table1).find(".row100.head ."+column).addClass('hov-column-head-'+ verTable);
        });

        $('.column100').on('mouseout',function(){
            var table1 = $(this).parent().parent().parent();
            var table2 = $(this).parent().parent();
            var verTable = $(table1).data('vertable')+"";
            var column = $(this).data('column') + "";

            $(table2).find("."+column).removeClass('hov-column-'+ verTable);
            $(table1).find(".row100.head ."+column).removeClass('hov-column-head-'+ verTable);
        });


    })(jQuery);


}

