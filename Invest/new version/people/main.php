<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--    <h1 class="page-header">Dashboard</h1>-->
    <?php if($_SESSION['admin']==true){ ?>

    <a href="/people/?action=create" class="btn btn-lg btn-primary">Додати користувача</a>
    <?php } ?>
    <h4 class="sub-header">Користувачі</h4>
    <input type="text" class="form-control" placeholder="Пошук... Введіть ім'я або прізвище користувача" id="searchInput" style="width: 400px !important;">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
<!--                <th>ID</th>-->
                <th>Ім'я</th>
                <th>Прізвище</th>
                <?php if($_SESSION['admin'] == true) {?>
                <th>Оновити</th>
                <th>Видалити</th>
                <?php } ?>
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'people';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
//                echo '<th><a href="/people/?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th><a href="/people/?id='.$data['id'].'">' . $data['name'] . '</a></th>';
                echo '<th><a href="/people/?id='.$data['id'].'">' . $data['surname'] . '</a></th>';
                if($_SESSION['admin'] == true) {
                echo '<th><a href="/people/?action=edit&id='.$data['id'].'" class="btn btn-warning">Оновити</a></th>';
                echo '<th><div onclick="deletePerson(\'' . $data['id'] . '\')" class="btn btn-danger"">Видалити</div></th>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
