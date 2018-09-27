<?php require_once '../layout/header.php'; ?>

<?php

$service = new \Bram\DBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = !empty($_POST['deleteEvent']) ? $_POST['deleteEvent'] : null;

    if ($eventId != null) {
        $service->deleteEvent($eventId);
    }
}

//after delete event post to update the table
$events = $service->getActiveEvents();
?>

<div class="row">
    <h3>Overzicht evenementen</h3>
</div>
<div class="row">

    <?php if (count($events) <= 0): ?>
        <div class="alert alert-info fullwidth text-center"> Geen evenementen gevonden</div>
    <?php else: ?>
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
            <tr>
                <td scope="row"><?php echo $key + 1 ?></td>
                <td><?php echo $event->getTitle(); ?></td>
                <td><?php echo $event->getCategory()->getDescription(); ?></td>
                <td><?php echo $event->getStartDate(); ?></td>
                <td><?php echo $event->getShowSeperate() ? 'Ja' : 'nee'; ?></td>
                <td>
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group mr-2" role="group">
                            <a type="button" href="./../event/form.php?edit=<?php echo $event->getEventId() ?>"
                               title="Wijzigen" class="btn btn-secondary btn-block btn-sm"><i
                                    class="material-icons">edit</i></a>
                        </div>
                        <div class="btn-group" role="group">
                            <a href=""
                               title="Verwijderen" class="btn btn-danger btn-block btn-sm delete-event"
                               data-toggle="modal"
                               data-target="#deleteModal" id="modal-call"
                               data-event-id="<?php echo $event->getEventId() ?>"><i
                                    class="material-icons">delete</i></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <?php endif; ?>

    </table>
</div>

<!-- Modal -->
<div class="modal" id="deleteModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        Wilt u dit evenement verwijderen?
                    </div>
                </div>
                <form method="post">
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Neen</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-danger btn-block">Ja, ik ben
                                zeker
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="deleteEvent" id="deleteEvent">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.delete-event').click(function () {
            var eventId = $(this).data('event-id');
            $('#deleteEvent').val(eventId);
        });
    });
</script>

<?php require_once '../layout/footer.php'; ?>




