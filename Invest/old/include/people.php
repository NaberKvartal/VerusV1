

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--    <h1 class="page-header">Dashboard</h1>-->
    <input class="form-control" style="width: 200px;" placeholder="Ім'я" name="name" id="name"><br>
    <input class="form-control" style="width: 200px;" placeholder="Прізвище" name="surname" id="surname"><br>
    <div class="btn btn-lg btn-primary" onclick="create();">Додати користувача</div>
    <button class="btn btn-primary btn-lg" style="display: none" id='openModal' data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>
    <!--            <div class="row placeholders">-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--                <div class="col-xs-6 col-sm-3 placeholder">-->
    <!--                    <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">-->
    <!--                    <h4>Label</h4>-->
    <!--                    <span class="text-muted">Something else</span>-->
    <!--                </div>-->
    <!--            </div>-->
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
            while($data = mysql_fetch_array($qr_result)){
                echo '<tr id="th' . $data['id'] . '">';
                echo '<th><a href="/in/people.php?id='.$data['id'].'">' . $data['id'] . '</a></th>';
                echo '<th>' . $data['name'] . '</th>';
                echo '<th>' . $data['surname'] . '</th>';
                echo '<th><div onclick="update(' . $data['id'] . ')" class="btn btn-warning">Оновити</div></th>';
                echo '<th><div onclick="deleteUser(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Оновити інформацію про користувача</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="updateID" style="display: none" class="form-control">
                <input type="text" placeholder="Ім'я" id="updateName" class="form-control" style="width: 200px;"><br>
                <input type="text" placeholder="Прізвище" id="updateSurname" class="form-control" style="width: 200px;">
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate()">Зберегти зміни</button>
            </div>
        </div>
    </div>
</div>