<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h4 class="sub-header"><a href="/people/?id=<?php echo $person_id;?>"><?php echo $array_people[$person_id][0];?></a> => Ввід та вивід коштів</h4>
    <div id="sandbox-container">
        <input type="text" class="form-control" placeholder="Дата" id="date"><br/>
    </div>
    <input type="text" class="form-control" placeholder="Сума" id="sum"><br/>
    <select class="form-control" id="type">
        <option>Ввід</option>
        <option>Вивід</option>
    </select><br/>
    <button class="btn btn-primary" onclick="addFinanceWay('<?php echo $person_id; ?>');">Додати транзакцію</button>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Сума</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <?php
            $changes = 0;
            $db_table_to_show = 'finance_way';
            $qr_result = mysql_query("select * from " . $db_table_to_show . " where `id_person`=" . $person_id . " ORDER BY  `finance_way`.`date` ASC ");
            while($data = mysql_fetch_array($qr_result)){
                    if($data['type']=='in'):
                        $changes = $changes + $data['sum'];
                        echo '<tr class="success">';
                    else:
                        $changes = $changes - $data['sum'];
                        echo '<tr class="danger">';
                    endif;
                    echo '<th>' . $data['date'] . '</th>';
                    echo '<th>' . $data['sum'] . '</th>';
                    echo '<th><button class="btn btn-danger" onclick="deleteFinanceWay(' . $data['id'] . ')">Видалити</button></th>';
                    echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php $balance = $payment['status'] + $changes;?>
    <h4>Баланс рахунку: <?php echo $balance;?></h4>
    <script>
        $('#sandbox-container input').datepicker({
            format: "yyyy/mm/dd",
            todayBtn: "linked",
            autoclose: true
        });
    </script>

</div>
