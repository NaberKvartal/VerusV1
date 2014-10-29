<?php if(!$concept['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Концепції не існує</h1>
    </div>
<?php else: ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"><?php echo $concept['build'];?></h1>
    <h2 class="sub-header">Інформація про концепцію</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID Ідеї</th>
                <th><?php echo $concept['id_idea'];?></th>
            </tr>
            <tr>
                <th>ID Автора</th>
                <th><?php echo $concept['id_author'];?></th>
            </tr>
            </thead>
            <tr>
                <th>Посадка будинків</th>
                <th><?php echo $concept['build'];?></th>
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