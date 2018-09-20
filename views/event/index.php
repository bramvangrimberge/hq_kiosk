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
                <th>Id</th>
                <th class="mdl-data-table__cell--non-numeric">Title</th>
                <th class="mdl-data-table__cell--non-numeric">Categorie</th>
                <th class="mdl-data-table__cell--non-numeric">Startdatum</th>
                <th class="mdl-data-table__cell--non-numeric">Aparte slide</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo $event->getEventId(); ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $event->getTitle(); ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $event->getCategory()->getDescription(); ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $event->getStartDate(); ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $event->getShowSeperate()?'Ja':'nee'; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php'; ?>




