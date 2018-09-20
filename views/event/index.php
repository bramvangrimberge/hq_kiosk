<?php require_once '../layout/header.php'; ?>

<?php

$service = new \Bram\DBConnection();
$events = $service->getActiveEvents();

var_dump($events);



?>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <h3>Overzicht evenementen</h3>
    </div>
    <div class="mdl-cell mdl-cell--12-col">
        <table class="mdl-data-table mdl-shadow--2dp fullwidth">
            <thead>
            <tr>
<!--                class="mdl-data-table__cell--non-numeric"-->
                <th>Id</th>
                <th>Title</th>
                <th>Categorie</th>
<!--                <th>Beschrijving</th>-->
                <th>Startdatum</th>
                <th>Aparte slide</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo $event->getEventId(); ?></td>
                    <td><?php echo $event->getTitle(); ?></td>
                    <td><?php echo $event->getCategoryId(); ?></td>
<!--                    <td>--><?php //echo $event->getLongDesc(); ?><!--</td>-->
                    <td><?php echo $event->getStartDate(); ?></td>
                    <td><?php echo $event->getShowSeperate(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php'; ?>




