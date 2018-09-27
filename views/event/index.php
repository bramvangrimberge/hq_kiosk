<?php require_once '../layout/header.php'; ?>

<?php

$service = new \Bram\DBConnection();
$events = $service->getActiveEvents();

?>

<div class="row">
    <h3>Overzicht evenementen</h3>
</div>
<div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Title</th>
            <th scope="col">Categorie</th>
            <th scope="col">Startdatum</th>
            <th scope="col">Aparte slide</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $key => $event): ?>
            <tr style="cursor:pointer" onclick="document.location = './../event/form.php?edit=<?php echo $event->getEventId() ?>';">
                <td scope="row"><?php echo $key+1 ?></td>
                <td><?php echo $event->getTitle(); ?></td>
                <td><?php echo $event->getCategory()->getDescription(); ?></td>
                <td><?php echo $event->getStartDate(); ?></td>
                <td><?php echo $event->getShowSeperate() ? 'Ja' : 'nee'; ?></td>
                <td>
                    <div class="btn-toolbar" role="toolbar">
                      <div class="btn-group mr-2" role="group">
                        <a type="button" href="./../event/form.php?edit=<?php echo $event->getEventId() ?>" title="Wijzigen" class="btn btn-secondary btn-block btn-sm"><i class="material-icons">edit</i></a>
                      </div>
                      <div class="btn-group" role="group">
                        <a type="button" href="./../event/form.php?delete=<?php echo $event->getEventId() ?>" title="Verwijderen" class="btn btn-danger btn-block btn-sm"><i class="material-icons">delete</i></a>
                      </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../layout/footer.php'; ?>




