<script>
    function createConcept(){
        var nameAdd, nameAd, payAdd, timeAdd, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, b, c, d;
        nameAdd = jQuery('#id_idea').val();
        nameAd = jQuery('#id_author').val();
        payAdd = jQuery('#build').val();
        timeAdd = jQuery('#square').val();
        a1 = jQuery('#count_1').val();
        a2 = jQuery('#count_2').val();
        a3 = jQuery('#count_3').val();
        a4 = jQuery('#count_4').val();
        a5 = jQuery('#count_5').val();
        a6 = jQuery('#count_6').val();
        a7 = jQuery('#count_7').val();
        a8 = jQuery('#count_8').val();
        a9 = jQuery('#count_9').val();
        a10 = jQuery('#count_10').val();
        b = jQuery('#main_cost').val();
        c = jQuery('#cost_per_m').val();
        d = jQuery('#income').val();
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/concepts.php',
            data: {action: 'create', id_idea: nameAdd, id_author: nameAd, build: payAdd, square: timeAdd,
                count_1:a1, count_2:a2, count_3:a3, count_4:a4, count_5:a5,
                count_6:a6, count_7:a7, count_8:a8, count_9:a9, count_10:a10, main_cost:b, cost_per_m:c, income:d}
        }).done(function(response) {
            window.location.replace('http://invest.yuma.lviv.ua/concept/');
        });

    }
</script>