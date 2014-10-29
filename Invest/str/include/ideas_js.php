<script>
    function createIdea(){
        var nameAdd, nameAd, payAdd, timeAdd, a, b, c, d, e, f;
        nameAdd = jQuery('#city').val();
        nameAd = jQuery('#id_author').val();
        payAdd = jQuery('#address').val();
        timeAdd = jQuery('#square').val();
        a = jQuery('#type').val();
        b = jQuery('#to_kad').val();
        c = jQuery('#to_plan').val();
        d = jQuery('#to_dpt').val();
        e = jQuery('#desc').val();
        f = jQuery('#who').val();
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/ideas.php',
            data: {action: 'create', id_author:nameAd, city: nameAdd, address: payAdd, square: timeAdd,
                type:a, to_kad:b, to_plan:c, to_dpt:d, desc:e, who:f}
        }).done(function(response) {
            window.location.replace('');
        });
    }
</script>