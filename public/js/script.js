function csvbtn(){
    $(".btncsv").click();
}
function excelbtn(){
    $(".btnexcel").click();
}
function pdfbtn(){
    $(".btnpdf").click();
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image-show').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    readURL(this);
});

function add_to_cart(id,firstTime) {

    var prix = $('.prix'+id).val();
    var qte = $('.qte'+id).val();
    var url = $('.url_cart'+id).val();
    if(prix <= 0){
        alert("entrer le prix ");
        return false;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method : 'post',
        data :{prix:prix,qte:qte},
        success: function (resultat) {
            $('#badge').html(resultat.totalqte);

            if(firstTime){

                location.reload();
            }
            $('#table_achat-pro').load(' #table_achat-pro');


        }
    });

}


 function qte_change_achat(input) {


    if(input.value <1){
        input.value =1;

    }
     var qte = input.value;
    var url = $(input).closest('div').parent().find('.url_cart_change');
     url = $(url).val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method : 'post',
        data :{qte:qte},
        success: function (resultat) {
            $('#badge').html(resultat.totalqte);
            $('#tp').html(resultat.qtee);

            $('#table_achat-pro').load(' #table_achat-pro');

        }
    });


};
function delete_to_cart(url) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method : 'post',

        success: function (resultat) {

            if(resultat.totalqte > 0){
                $('#badge').html(resultat.totalqte);
            }else{
                $('#table_achat-pro').hide();
                location.reload();
            }

            $('#table_achat-pro').load(' #table_achat-pro');

        }
    });
}


