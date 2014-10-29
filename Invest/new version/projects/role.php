<?php
if($_POST) {
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if($roles=='null'){
        $sql="INSERT INTO `roles`(`id_project`, `start_man`, `start_man_pr`, `rek`, `rek_pr`, `kur`, `kur_pr`, `of_gen`, `of_gen_pr`,
         `project`, `project_pr`, `tech`, `tech_pr`, `auditor`, `auditor_pr`, `nets`, `nets_pr`,
         `infra`, `infra_pr`, `earth`, `earth_pr`, `pred`, `pred_pr`)
        VALUES ('".$project_id."','".$_POST['a1']."','".$_POST['a1p']."',
        '".$_POST['b1']."','".$_POST['b1p']."',
        '".$_POST['c1']."','".$_POST['c1p']."',
        '".$_POST['d1']."','".$_POST['d1p']."',
         '".$_POST['e1']."','".$_POST['e1p']."',
         '".$_POST['f1']."','".$_POST['f1p']."',
         '".$_POST['g1']."','".$_POST['g1p']."',
         '".$_POST['h1']."','".$_POST['h1p']."',
         '".$_POST['i1']."','".$_POST['i1p']."',
         '".$_POST['j1']."','".$_POST['j1p']."',
         '".$_POST['k1']."','".$_POST['k1p']."')";
    } else {
        $sql = "UPDATE `roles` SET `start_man`='".$_POST['a1']."',`start_man_pr`='".$_POST['a1p']."',
        `rek`='".$_POST['b1']."',`rek_pr`='".$_POST['b1p']."',
        `kur`='".$_POST['c1']."',`kur_pr`='".$_POST['c1p']."',
        `of_gen`='".$_POST['d1']."',`of_gen_pr`='".$_POST['d1p']."',
        `project`='".$_POST['e1']."',`project_pr`='".$_POST['e1p']."',
        `tech`='".$_POST['f1']."',`tech_pr`='".$_POST['f1p']."',
        `auditor`='".$_POST['g1']."',`auditor_pr`='".$_POST['g1p']."',
        `nets`='".$_POST['h1']."',`nets_pr`='".$_POST['h1p']."',
        `infra`='".$_POST['i1']."',`infra_pr`='".$_POST['i1p']."',
        `earth`='".$_POST['j1']."',`earth_pr`='".$_POST['j1p']."',
        `pred`='".$_POST['k1']."',`pred_pr`='".$_POST['k1p']."'
        WHERE `id_project`=".$project_id;
    }
    mysqli_query($con, $sql);
    mysqli_close($con);
    header( 'Location: /projects/?id='.$project_id );
} else {
    if($roles=='null'){ ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $project_id;?>"><?php echo $array_projects[$project_id][0]?></a> => Додавання ролей</h4>
        <form method="post">
            <input type="text" class="form-control" id="name_a1" placeholder="Старт-Менеджер">
            <input type="text" style="display: none" class="form-control" name="a1" id="a1">
            <div id="con_a1"></div>
            <input class="form-control" placeholder="Відсоток" name="a1p"><br/>

            <input type="text" class="form-control" id="name_b1" placeholder="Реклама-Продаж">
            <input type="text" style="display: none" class="form-control" name="b1" id="b1">
            <div id="con_b1"></div>
            <input class="form-control" placeholder="Відсоток" name="b1p"><br/>

            <input type="text" class="form-control" id="name_c1" placeholder="Куратор">
            <input type="text" style="display: none" class="form-control" name="c1" id="c1">
            <div id="con_c1"></div>
            <input class="form-control" placeholder="Відсоток" name="c1p"><br/>

            <input type="text" class="form-control" id="name_d1" placeholder="Оф. Ген. Підрядник">
            <input type="text" style="display: none" class="form-control" name="d1" id="d1">
            <div id="con_d1"></div>
            <input class="form-control" placeholder="Відсоток" name="d1p"><br/>

            <input type="text" class="form-control" id="name_e1" placeholder="Проектувальник">
            <input type="text" style="display: none" class="form-control" name="e1" id="e1">
            <div id="con_e1"></div>
            <input class="form-control" placeholder="Відсоток" name="e1p"><br/>

            <input type="text" class="form-control" id="name_f1" placeholder="Технагляд">
            <input type="text" style="display: none" class="form-control" name="f1" id="f1">
            <div id="con_f1"></div>
            <input class="form-control" placeholder="Відсоток" name="f1p"><br/>

            <input type="text" class="form-control" id="name_g1" placeholder="Аудитор">
            <input type="text" style="display: none" class="form-control" name="g1" id="g1">
            <div id="con_g1"></div>
            <input class="form-control" placeholder="Відсоток" name="g1p"><br/>

            <input type="text" class="form-control" id="name_h1" placeholder="Зовнішні мережі">
            <input type="text" style="display: none" class="form-control" name="h1" id="h1">
            <div id="con_h1"></div>
            <input class="form-control" placeholder="Відсоток" name="h1p"><br/>

            <input type="text" class="form-control" id="name_i1" placeholder="Інфраструктура">
            <input type="text" style="display: none" class="form-control" name="i1" id="i1">
            <div id="con_i1"></div>
            <input class="form-control" placeholder="Відсоток" name="i1p"><br/>

            <input type="text" class="form-control" id="name_j1" placeholder="Земля">
            <input type="text" style="display: none" class="form-control" name="j1" id="j1">
            <div id="con_j1"></div>
            <input class="form-control" placeholder="Відсоток" name="j1p"><br/>

            <input type="text" class="form-control" id="name_k1" placeholder="Представницькі витрати">
            <input type="text" style="display: none" class="form-control" name="k1" id="k1">
            <div id="con_k1"></div>
            <input class="form-control" placeholder="Відсоток" name="k1p"><br/>

        <button class="btn btn-lg btn-primary" type="submit">Додати команду</button>
        </form>
    </div>
<?php }else{ ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h4 class="sub-header"><a href="/projects/?id=<?php echo $project_id;?>"><?php echo $array_projects[$project_id][0]?></a> => Редагування ролей</h4>
        <form method="post">
            <input type="text" class="form-control" id="name_a1" placeholder="Старт-Менеджер" value="<?php echo $array_people[$roles['start_man']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="a1" id="a1" value="<?php echo $roles['start_man']; ?>">
            <div id="con_a1"></div>
            <input class="form-control" placeholder="Відсоток" name="a1p" value="<?php echo $roles['start_man_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_b1" placeholder="Реклама-Продаж" value="<?php echo $array_people[$roles['rek']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="b1" id="b1" value="<?php echo $roles['rek']; ?>">
            <div id="con_b1"></div>
            <input class="form-control" placeholder="Відсоток" name="b1p" value="<?php echo $roles['rek_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_c1" placeholder="Куратор" value="<?php echo $array_people[$roles['kur']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="c1" id="c1" value="<?php echo $roles['kur']; ?>">
            <div id="con_c1"></div>
            <input class="form-control" placeholder="Відсоток" name="c1p" value="<?php echo $roles['kur_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_d1" placeholder="Оф. Ген. Підрядник" value="<?php echo $array_people[$roles['of_gen']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="d1" id="d1" value="<?php echo $roles['of_gen']; ?>">
            <div id="con_d1"></div>
            <input class="form-control" placeholder="Відсоток" name="d1p" value="<?php echo $roles['of_gen_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_e1" placeholder="Проектувальник" value="<?php echo $array_people[$roles['project']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="e1" id="e1" value="<?php echo $roles['project']; ?>">
            <div id="con_e1"></div>
            <input class="form-control" placeholder="Відсоток" name="e1p" value="<?php echo $roles['project_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_f1" placeholder="Технагляд" value="<?php echo $array_people[$roles['tech']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="f1" id="f1" value="<?php echo $roles['tech']; ?>">
            <div id="con_f1"></div>
            <input class="form-control" placeholder="Відсоток" name="f1p" value="<?php echo $roles['tech_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_g1" placeholder="Аудитор" value="<?php echo $array_people[$roles['auditor']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="g1" id="g1" value="<?php echo $roles['auditor']; ?>">
            <div id="con_g1"></div>
            <input class="form-control" placeholder="Відсоток" name="g1p" value="<?php echo $roles['auditor_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_h1" placeholder="Зовнішні мережі" value="<?php echo $array_people[$roles['nets']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="h1" id="h1" value="<?php echo $roles['nets']; ?>">
            <div id="con_h1"></div>
            <input class="form-control" placeholder="Відсоток" name="h1p" value="<?php echo $roles['nets_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_i1" placeholder="Інфраструктура" value="<?php echo $array_people[$roles['infra']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="i1" id="i1" value="<?php echo $roles['infra']; ?>">
            <div id="con_i1"></div>
            <input class="form-control" placeholder="Відсоток" name="i1p" value="<?php echo $roles['infra_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_j1" placeholder="Земля" value="<?php echo $array_people[$roles['earth']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="j1" id="j1" value="<?php echo $roles['earth']; ?>">
            <div id="con_j1"></div>
            <input class="form-control" placeholder="Відсоток" name="j1p" value="<?php echo $roles['earth_pr']; ?>"><br/>

            <input type="text" class="form-control" id="name_k1" placeholder="Представницькі витрати" value="<?php echo $array_people[$roles['pred']]['0']; ?>">
            <input type="text" style="display: none" class="form-control" name="k1" id="k1" value="<?php echo $roles['pred']; ?>">
            <div id="con_k1"></div>
            <input class="form-control" placeholder="Відсоток" name="k1p" value="<?php echo $roles['pred_pr']; ?>"><br/>

        <button class="btn btn-lg btn-primary" type="submit">Редагувати команду</button>
        </form>
    </div>

<?php } ?>
<?php } ?>