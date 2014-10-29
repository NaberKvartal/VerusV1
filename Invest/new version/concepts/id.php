<?php if(!$concept['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Концепції не існує</h1>
    </div>
<?php else: ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="/projects/?action=create&id_concept=<?php echo $concept['id']; ?>" class="btn btn-lg btn-primary">Додати проект</a>
        <a href="/concepts/?action=edit&id=<?php echo $concept['id']; ?>" class="btn btn-lg btn-warning">Редагувати концепцію</a>
        <div onclick="deleteConcept('<?php echo $concept['id'];?>');" class="btn btn-lg btn-danger">Видалити концепцію</div>

        <h1 class="page-header"><?php echo $concept['build'];?></h1>
        <h2 class="sub-header">Інформація про концепцію</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID Ідеї</th>
                    <th><a href="/ideas/?id=<?php echo $concept['id_idea']?>"><?php echo $concept['id_idea'];?></a></th>
                </tr>
                <tr>
                    <th>Автор</th>
                    <th><a href="/people/?id=<?php echo $concept['id_author']?>"><?php echo $array_people[$concept['id_author']]['0'];?></a></th>
                </tr>
                </thead>
                <tr>
                    <th>Посадка будинків</th>
                    <th>
                        <?php
                        for($i=1; $i<20; $i++) {
                            if(file_exists("file/".$concept_id."_".$i.".jpg")):
                                echo ' <a href="/concepts/file/'.$concept_id.'_'.$i.'.jpg" class="btn btn-sm btn-primary">Файл</a> ';
                            endif;
                            if(file_exists("file/".$concept_id."_".$i.".png")):
                                echo ' <a href="/concepts/file/'.$concept_id.'_'.$i.'.png" class="btn btn-sm btn-primary">Файл</a> ';
                            endif;
                            if(file_exists("file/".$concept_id."_".$i.".pdf")):
                                echo ' <a href="/concepts/file/'.$concept_id.'_'.$i.'.pdf" class="btn btn-sm btn-primary">Файл</a> ';
                            endif;
                        }
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>Площа будівництва</th>
                    <th><?php echo $concept['square'];?></th>
                </tr>
                <tr>
                    <th>Реклама</th>
                    <th><?php echo $concept['count_1'];?></th>
                </tr>
                <tr>
                    <th>Генпідряд</th>
                    <th><?php echo $concept['count_2'];?></th>
                </tr>
                <tr>
                    <th>Проект</th>
                    <th><?php echo $concept['count_3'];?></th>
                </tr>
                <tr>
                    <th>Зовнішні мережі</th>
                    <th><?php echo $concept['count_4'];?></th>
                </tr>
                <tr>
                    <th>Земля</th>
                    <th><?php echo $concept['count_5'];?></th>
                </tr>
                <tr>
                    <th>Представницькі</th>
                    <th><?php echo $concept['count_6'];?></th>
                </tr>
                <tr>
                    <th>Адмін. витрати</th>
                    <th><?php echo $concept['count_7'];?></th>
                </tr>
                <tr>
                    <th>Оф. Генпідряд</th>
                    <th><?php echo $concept['count_8'];?></th>
                </tr>
                <tr>
                    <th>Технагляд</th>
                    <th><?php echo $concept['count_9'];?></th>
                </tr>
                <tr>
                    <th>Аудит</th>
                    <th><?php echo $concept['count_10'];?></th>
                </tr>
                <tr>
                    <th>Орієнтовна собівартість</th>
                    <th><?php echo $concept['main_cost'];?></th>
                </tr>
                <tr>
                    <th>Орієнтовна ціна за метр</th>
                    <th><?php echo $concept['cost_per_m'];?></th>
                </tr>
                <tr>
                    <th>Орієнтовний прибуток</th>
                    <th><?php echo $concept['income'];?></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>