

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--    <h1 class="page-header">Dashboard</h1>-->
<div id="adder" style="display: none;">    <input class="form-control" style="width: 200px;" placeholder="Назва" id="name">
    <input class="form-control" style="width: 200px;" placeholder="Прихідний рахунок" id="pay">
    <input class="form-control" style="width: 200px;" placeholder="Тривалість робіт (місяці)" id="time_realize"><br>
    <input class="form-control" style="width: 200px;" placeholder="Вартість будівництва одної секції" id="cost_one_sec">
    <input class="form-control" style="width: 200px;" placeholder="Кількість секцій" id="sec_count">
    <input class="form-control" style="width: 200px;" placeholder="Загальна вартість будівництва" id="full_cost_sec"><br>
    <input class="form-control" style="width: 200px;" placeholder="Середня ціна одного м.кв. житлової площі" id="middle_cost_life">
    <input class="form-control" style="width: 200px;" placeholder="Загальна площа житла" id="square_life">
    <input class="form-control" style="width: 200px;" placeholder="Дохід від житлової площі" id="sum_cost_life"><br>
    <input class="form-control" style="width: 200px;" placeholder="Середня ціна одного м.кв. комерційної площі" id="middle_cost_bus">
    <input class="form-control" style="width: 200px;" placeholder="Загальна комерційна площа" id="square_bus">
    <input class="form-control" style="width: 200px;" placeholder="Дохід від комерційної площі" id="sum_cost_bus"><br>
    <input class="form-control" style="width: 200px;" placeholder="Загальний дохід" id="full_cost"><br>
    <div class="btn btn-lg btn-primary" onclick="create();">Створити проект</div></div>
    <div class="btn btn-lg btn-primary" id="creatorBut" onclick="openCreator();">Створити проект</div>
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
    <h2 class="sub-header">Проекти</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Прихідний рахунок</th>
                <th>Тривалість</th>
                <th>Оновити</th>
<!--                <th>Видалити</th>-->
            </tr>
            </thead>
            <?php
            while($data = mysql_fetch_array($qr_result)){
                $id=$data['id'];
                echo '<tr id="th' . $id . '">';
                echo '<th>' . $id . '</a></th>';
                echo '<th><a href="/in/project.php?id=' . $id . '">' . $data['name'] . '</a></th>';
                echo '<th>' . $data['pay'] . '</th>';
                echo '<th>' . $data['time_realize'] . '</th>';
                echo '<th><div onclick="update(' . $data['id'] . ')" class="btn btn-warning">Оновити</div></th>';
//                echo '<th><div onclick="deleteProject(' . $data['id'] . ')" class="btn btn-danger"">Видалити</div></th>';
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
                <h4 class="modal-title" id="myModalLabel">Оновити інформацію</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="updateID" style="display: none" class="form-control">
                <input type="text" id="updateName" class="form-control" style="width: 200px;">
                <input type="text" id="updatePay" class="form-control" style="width: 200px;">
                <input type="text" id="updateTime" class="form-control" style="width: 200px;">
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" onclick="saveUpdate()">Зберегти зміни</button>
            </div>
        </div>
    </div>
</div>