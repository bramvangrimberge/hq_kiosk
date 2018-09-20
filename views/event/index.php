<?php require_once '../layout/header.php'; ?>

<?php

$service = new \Bram\DBConnection();
$events = $service->getActiveEvents();

?>

<div class="row">
    <h3>Overzicht evenementen</h3>
</div>
<div class="row">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Title</th>
            <th scope="col">Categorie</th>
            <th scope="col">Startdatum</th>
            <th scope="col">Aparte slide</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $event): ?>
            <tr>
                <td scope="row"><?php echo $event->getEventId(); ?></td>
                <td><?php echo $event->getTitle(); ?></td>
                <td><?php echo $event->getCategory()->getDescription(); ?></td>
                <td><?php echo $event->getStartDate(); ?></td>
                <td><?php echo $event->getShowSeperate() ? 'Ja' : 'nee'; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../layout/footer.php'; ?>




