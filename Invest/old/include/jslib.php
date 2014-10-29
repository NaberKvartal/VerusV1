<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script>
    function create() {
        var nameAdd, surnameAdd;
        nameAdd = jQuery('#name').val();
        surnameAdd = jQuery('#surname').val();
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/people.php',
            data: {action: 'create', name: nameAdd, surname:surnameAdd}
        }).done(function() {
            jQuery('#name').val('');
            jQuery('#surname').val('');
            window.location.replace('');
        });
    }
    function deleteUser(id) {
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/people.php',
            data: {action: 'delete', id: id}
        }).done(function() {
            jQuery('#th'+id).remove();
        });
    }
    function update(id) {
        jQuery('#openModal').click();
        getUser(id);
    }
    function getUser(id) {
        jQuery('#updateID').val(id);
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/people.php',
            data: {action: 'get', id: id}
        }).done(function(response) {
            var indexer = response.indexOf('|');
            var cut = response.substr(0, indexer);
            jQuery('#updateName').val(cut);
            indexer++;
            cut = response.substr(indexer);
            jQuery('#updateSurname').val(cut);
        });
    }
    function saveUpdate() {
        var id=jQuery('#updateID').val();
        var name=jQuery('#updateName').val();
        var surname=jQuery('#updateSurname').val();
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/people.php',
            data: {action: 'update', id: id, name: name, surname: surname}
        }).done(function(response) {
            var indexer = response.indexOf('|');
            var cut = response.substr(0, indexer);
            var id=cut;
            indexer++;
            response=response.substr(indexer);
            indexer = response.indexOf('|');
            cut=response.substr(0, indexer);
            jQuery('#th'+id+' th').eq(1).text(cut);
            indexer++;
            cut = response.substr(indexer);
            jQuery('#th'+id+' th').eq(2).text(cut);
            jQuery('#closeModal').click();
        });
    }
</script>

</body>
</html>
