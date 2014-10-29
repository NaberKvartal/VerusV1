</div>
</div>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<script>
    var array_people = {
    <?php
    $db_table_to_show = 'people';
$qr_result = mysql_query("select * from " . $db_table_to_show);
while($row = mysql_fetch_array($qr_result)){
    echo '\''.$row['name'].' '.$row['surname'].'\''.':'.$row['id'].',';
}
    ?>
    'empty': false}
    function checkVacancy(id, type, id_project) {
        var value = jQuery('select#vacancy-'+id).val();
        value = array_people[value];
        console.log(value);
        console.log(id);
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/check_proposition.php',
            data: {id_vacancy: id, id_person: value, type: type, id_project: id_project}
        }).done(function(response) {
            window.location.replace('');
//            console.log(response);
        });
    }
    function deletePerson(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'person', id: id}
        }).done(function() {
            window.location.replace('/people');
        });
    }
    function deleteFinanceWay(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'finance_way', id: id}
        }).done(function() {
            window.location.replace('');
        });
    }
    function deleteConcept(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'concept', id: id}
        }).done(function() {
            window.location.replace('/concepts');
        });
    }
    function deleteIdea(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'idea', id: id}
        }).done(function() {
            window.location.replace('/ideas');
        });
    }
    function deleteInvestment(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'investment', id: id}
        }).done(function() {
            window.location.replace('');
        });
    }
    function deleteTrans(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'trans', id: id}
        }).done(function() {
            window.location.replace('');
        });
    }
    function deleteProject(id) {
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/delete.php',
            data: {type: 'project', id: id}
        }).done(function() {
            window.location.replace('/projects');
        });
    }
    function addFile() {
        var file_count = jQuery('#file_count').val();
        var prev = jQuery('#pdf_'+file_count);
        ++file_count;
        jQuery('<input type="file" class="form-control" id="pdf_'+file_count+'" name="pdf_'+file_count+'">').insertAfter(prev);
        jQuery('#file_count').val(file_count);
    }
    function bigSearchPerson() {
        jQuery('.table-responsive tbody').html('');
        var text = jQuery('#searchInput').val();
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/search.php',
            data: {type: 'people_big', text: text}
        }).done(function(response) {
            jQuery('.table-responsive tbody').html(response);
        });
    }
    function projectSearch() {
        jQuery('.table-responsive tbody').html('');
        var text = jQuery('#projectsSearch').val();
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/search.php',
            data: {type: 'projects', text: text}
        }).done(function(response) {
            jQuery('.table-responsive tbody').html(response);
        });
    }
    var role<?php if($_SESSION['admin']) {
    echo "='admin'";
    } else {
    echo "='user'";
    }?>;
    function filter() {
        jQuery('.table-responsive tbody').html('');
        var filterCity = jQuery('#filterCity').val();
        var filterStatus = jQuery('#filterStatus').val();
        var filterTime = jQuery('#filterTime').val();
        if(!jQuery('#filterCity').val()) filterCity = 'empty';
        if(jQuery('#filterStatus').val() == 'Виберіть статус проекту') filterStatus = 'empty';
        if(jQuery('#filterTime').val() == 'Виберіть час тривалості проекту') filterTime = 'empty';
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/search.php',
            data: {
                type: 'filter',
                filterCity: filterCity,
                filterStatus: filterStatus,
                filterTime: filterTime,
                role: role}
        }).done(function(response) {
            jQuery('.table-responsive tbody').html(response);
        });


    }

    function searchPerson(toName, toID, container, type) {
        var text = jQuery(toName).val();
        if(text.length == 0) {
            jQuery(container).html('');
            return false;
        }
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/search.php',
            data: {type: type, text: text}
        }).done(function(response) {
            jQuery(container).html(response);
            jQuery('.drop').click(function() {
                var id = jQuery(this).attr('id');
                var name = jQuery(this).attr('data-name');
                id = id.replace('id-', '');
                jQuery(toID).val(id);
                jQuery(toName).val(name);
                jQuery(container).html('');
            });
        });
    }
    function addFinanceWay(person) {
        var date = jQuery('#date').val();
        var sum = jQuery('#sum').val();
        var type = jQuery('#type').val();
        jQuery.ajax ({
            url: 'http://kvartal.yuma.lviv.ua/backend/finance.php',
            data: {date: date, sum: sum, type: type, person:person}
        }).done(function(response) {
            window.location.replace('');
        });

    }
    $(document).ready(function () {
        $('#name_author').keyup(function () {
            searchPerson('#name_author', '#id_author', '#author', 'people');
        });
        $('#name_a1').keyup(function () {
            searchPerson('#name_a1', '#a1', '#con_a1', 'people');
        });
        $('#name_b1').keyup(function () {
            searchPerson('#name_b1', '#b1', '#con_b1', 'people');
        });
        $('#name_c1').keyup(function () {
            searchPerson('#name_c1', '#c1', '#con_c1', 'people');
        });
        $('#name_d1').keyup(function () {
            searchPerson('#name_d1', '#d1', '#con_d1', 'people');
        });
        $('#name_e1').keyup(function () {
            searchPerson('#name_e1', '#e1', '#con_e1', 'people');
        });
        $('#name_f1').keyup(function () {
            searchPerson('#name_f1', '#f1', '#con_f1', 'people');
        });
        $('#name_g1').keyup(function () {
            searchPerson('#name_g1', '#g1', '#con_g1', 'people');
        });
        $('#name_h1').keyup(function () {
            searchPerson('#name_h1', '#h1', '#con_h1', 'people');
        });
        $('#name_i1').keyup(function () {
            searchPerson('#name_i1', '#i1', '#con_i1', 'people');
        });
        $('#name_j1').keyup(function () {
            searchPerson('#name_j1', '#j1', '#con_j1', 'people');
        });
        $('#name_k1').keyup(function () {
            searchPerson('#name_k1', '#k1', '#con_k1', 'people');
        });
        $('#name_user').keyup(function () {
            searchPerson('#name_user', '#user_id', '#con_user', 'people');
        });
        $('#name_broker').keyup(function () {
            searchPerson('#name_broker', '#broker_id', '#con_broker', 'people');
        });
        $('#searchInput').keyup(function () {
            bigSearchPerson();
        });
        $('#projectsSearch').keyup(function () {
            projectSearch();
        });
        $('#filterCity').keyup(function () {
            filter();
        });
        $('#filterStatus').change(function () {
            filter();
        });
        $('#filterTime' +
            '').change(function () {
            filter();
        });
    });
</script>
</body>
</html>