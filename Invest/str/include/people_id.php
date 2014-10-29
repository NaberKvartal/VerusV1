<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--    <h1 class="page-header">Dashboard</h1>-->
    <input class="form-control" style="width: 200px;" placeholder="Ім'я" name="name" id="name"><br>
    <input class="form-control" style="width: 200px;" placeholder="Прізвище" name="surname" id="surname"><br>
    <div class="btn btn-lg btn-primary" onclick="createPerson();">Додати користувача</div>
    <button class="btn btn-primary btn-lg" style="display: none" id='openModal' data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>
    <h2 class="sub-header">Користувачі</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Прізвище</th>
                <th>Оновити</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <?php
            $db_table_to_show = 'people';
            $qr_result = mysql_query("select * from " . $db_table_to_show);

            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
                echo '<th><a href="/people/?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th>' . $data['name'] . '</th>';
                echo '<th>' . $data['surname'] . '</th>';
                echo '<th><a href="/people/edit.php?id=' . $data['id'] . '" class="btn btn-warning">Оновити</a></th>';
                echo '<th><div onclick="deletePerson(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
