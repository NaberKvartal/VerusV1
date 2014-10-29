<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script>
    function openCreator() {
        jQuery('#adder').show();
        jQuery('#creatorBut').remove();
    }
    var toCut, cutted;
    function create() {
        var nameAdd, payAdd, timeAdd, a, b, c, d, e, f, g, h, i, j, k, l, m,n;
        nameAdd = jQuery('#name').val();
        payAdd = jQuery('#pay').val();
        timeAdd = jQuery('#time_realize').val();
        a = jQuery('#cost_one_sec').val();
        b = jQuery('#sec_count').val();
        c = jQuery('#full_cost_sec').val();
        d = jQuery('#middle_cost_life').val();
        e = jQuery('#square_life').val();
        f = jQuery('#sum_cost_life').val();
        g = jQuery('#middle_cost_bus').val();
        h = jQuery('#square_bus').val();
        i = jQuery('#sum_cost_bus').val();
        j = jQuery('#full_cost').val();
        k = a*b;
        if(!nameAdd || !nameAdd.length) return false;
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/project.php',
            data: {action: 'create', name: nameAdd, pay: payAdd, time_realize: timeAdd,
                cost_one_sec:a, sec_count:b, cost_all_sec: k, full_cost_sec:c, middle_cost_life:d, square_life:e,
                sum_cost_life:f, middle_cost_bus:g, square_bus:h, sum_cost_bus:i, full_cost:j}
        }).done(function(response) {
            jQuery('input').val('');
            console.log(response);
            window.location.replace('');
        });
    }
    function deleteProject(id) {
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/project.php',
            data: {action: 'delete', id: id}
        }).done(function() {
            jQuery('#th'+id).remove();
        });
    }
    function update(id) {
        jQuery('#openModal').click();
        getProject(id);
    }
    function getProject(id) {
        jQuery('#updateID').val(id);
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/project.php',
            data: {action: 'get', id: id}
        }).done(function(response) {
            toCut = response;
            getPart();
            jQuery('#updateName').val(cutted);

            getPart();
            jQuery('#updatePay').val(cutted);

            getPart();
            jQuery('#updateTime').val(toCut);

            clearPart();
        });
    }
    function saveUpdate() {
        var id=jQuery('#updateID').val();
        var nameAdd=jQuery('#updateName').val();
        var payAdd=jQuery('#updatePay').val();
        var timeAdd=jQuery('#updateTime').val();
        jQuery.ajax ({
            url: 'http://yuma.lviv.ua/in/backend/project.php',
            data: {action: 'update', id: id, name: nameAdd, pay: payAdd, time_realize: timeAdd}
        }).done(function(response) {
            toCut = response;
            getPart();
            var id = cutted;

            getPart();
            jQuery('#th'+id+' th').eq(1).text(cutted);

            getPart();
            jQuery('#th'+id+' th').eq(2).text(cutted);

            getPart();
            jQuery('#th'+id+' th').eq(3).text(toCut);
            clearPart();

            jQuery('#closeModal').click();
        });
    }


    function getPart() {
        var index = toCut.indexOf('|');
        cutted = toCut.substr(0, index);
        index++;
        toCut = toCut.substr(index);
    }
    function clearPart() {
        toCut = '';
        cutted = '';
    }
</script>

</body>
</html>