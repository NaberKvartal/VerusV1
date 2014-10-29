<script>

    function createPerson(){
        var nameAdd, surnameAdd;
        nameAdd = jQuery('#name').val();
        surnameAdd = jQuery('#surname').val();
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/people.php',
            data: {action: 'create', name: nameAdd, surname:surnameAdd}
        }).done(function() {
            window.location.replace('');
        });

    }

    function editPerson(id){
        var name1, surname1;
        name1 = jQuery('#name').val();
        surname1 = jQuery('#surname').val();
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/people.php',
            data: {action: 'edit', name: name1, surname:surname1, idPer: id}
        }).done(function() {
            window.location.replace('http://invest.yuma.lviv.ua/people/?id='+id);
        });
    }

    function deletePerson(id){
        jQuery.ajax ({
            url: 'http://invest.yuma.lviv.ua/backend/people.php',
            data: {action: 'delete', id: id}
        }).done(function() {
            window.location.replace('');
        });
    }

</script>