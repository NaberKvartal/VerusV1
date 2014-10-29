<?php if(!$idea['id']): ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Ідеї не існує</h1>
    </div>
<?php else: ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="/concepts/?action=create&idea_id=<?php echo $idea['id']; ?>" class="btn btn-primary">Додати концепцію</a>
        <a href="/ideas/?action=edit&id=<?php echo $idea['id']; ?>" class="btn btn-warning">Редагувати ідею</a>
        <div onclick="deleteIdea('<?php echo $idea['id'];?>');" class="btn btn-lg btn-danger">Видалити ідею</div>

        <h1 class="page-header"><?php echo $idea['city'];?></h1>
        <h2 class="sub-header">Інформація про ідею</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Автор</th>
                    <th><?php echo $array_people[$idea['id_author']]['0'];?></th>
                </tr>
                <tr>
                    <th>Адреса</th>
                    <th><?php echo $idea['address'];?></th>
                </tr>
                </thead>
                <tr>
                    <th>Площа земельної ділянки</th>
                    <th><?php echo $idea['square'];?></th>
                </tr>
                <tr>
                    <th>Тип забудови</th>
                    <th><?php echo $idea['type'];?></th>
                </tr>
                <tr>
                    <th>По кадастру</th>
                    <th><?php echo $idea['to_kad'];?></th>
                </tr>
                <tr>
                    <th>По ген.плану</th>
                    <th><?php echo $idea['to_plan'];?></th>
                </tr>
                <tr>
                    <th>По ДПТ</th>
                    <th><?php echo $idea['to_dpt'];?></th>
                </tr>
               <tr>
                    <th>Характеристика</th>
                    <th><?php echo $idea['desc'];?></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>