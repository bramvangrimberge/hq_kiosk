<?php
require_once '../layout/header.php';
$db = new \Bram\DBConnection();
$categories = $db->getCategories();
$minutes = \Bram\Utils\DateUtils::getMinutes();
$hours = \Bram\Utils\DateUtils::getHours();
$event = new \Bram\Model\Event();
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $event = $db->getEventById($id);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = true;
    $startHour = '00:00';
    if (isset($_POST['eventHour']) && isset($_POST['eventMinute'])) {
        $startHour = $_POST['eventHour'] . ':' . $_POST['eventMinute'];
    }

    $params = array(
        'event_id' => !empty($_POST['eventId']) ? $_POST['eventId'] : null,
        'long_desc' => !empty($_POST['eventDescription']) ? $_POST['eventDescription'] : "",
        'category_id' => !empty($_POST['categoryId']) ? $_POST['categoryId'] : null,
        'show_seperate' => !empty($_POST['eventShowSeperate']) ? $_POST['eventShowSeperate'] : false,
        'start_date' => !empty($_POST['startDate']) ? $_POST['startDate'] : null,
        'start_hour' => $startHour,
        'title' => !empty($_POST['title']) ? $_POST['title'] : null,
    );


    //fill
    $event = new \Bram\Model\Event($params);

    if (empty($_POST['title'])) {
        array_push($errors, 'title');
        $valid = false;
    }

    if (empty($_POST['categoryId'])) {
        array_push($errors, 'categoryId');
        $valid = false;
    }

    if (empty($_POST['startDate'])) {
        array_push($errors, 'startDate');
        $valid = false;
    }

    if ($valid) {
        $db->saveOrUpdate($event);
        header('Location: index.php');
    }
}

$mode = empty($event->getEventId()) ? 'create' : 'edit';

?>


<div class="row">
    <h3>Evenement <?php echo $mode == 'edit' ? 'wijzigen' : 'aanmaken' ?></h3>
</div>
<div class="row">
    <div class="offset-lg-3 col-lg-6">
        <form method="post">

            <input type="hidden" name="eventId" value="<?php echo $event->getEventId() ?>">
            <div class="form-group">
                <label for="title">Titel *</label>
                <input type="text" class="form-control <?php echo in_array('title', $errors) ? 'is-invalid' : '' ?>"
                       id="title" name="title"
                       value="<?php echo $event->getTitle() ?>">
                <div class="invalid-feedback">Verplicht veld</div>
            </div>
            <div class="form-group">
                <label for="categoryId">Categorie *</label>
                <select class="form-control <?php echo in_array('categoryId', $errors) ? 'is-invalid' : '' ?>"
                        id="categoryId" name="categoryId">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?php echo $category->getCategoryId() ?>" <?php echo $event->getCategoryId() === $category->getCategoryId() ? 'selected' : '' ?>><?php echo $category->getDescription(); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">Verplicht veld</div>
            </div>
            <div class="form-group">
                <label for="startDate">Startdatum *</label>
                <input type="date" id="startDate" name="startDate" max="2100-12-31"
                       min="<?php echo date("Y") ?>-01-01"
                       class="form-control <?php echo in_array('startDate', $errors) ? 'is-invalid' : '' ?>"
                       value="<?php echo $event->getStartDate() ?>">
                <div class="invalid-feedback">Verplicht veld</div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="eventHour">Startuur</label>
                        <select class="form-control" id="" name="eventHour">
                            <?php foreach ($hours as $hour): ?>
                                <option
                                    value="<?php echo $hour ?>" <?php echo $event->getHour() === $hour ? 'selected' : '' ?> ><?php echo $hour ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eventMinute">Minuten</label>
                        <select class="form-control" id="eventMinute" name="eventMinute">
                            <?php foreach ($minutes as $minute): ?>
                                <option
                                    value="<?php echo $minute ?>" <?php echo $event->getMinute() === $minute ? 'selected' : '' ?> ><?php echo $minute ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="eventDescription">Beschrijving</label>
                <textarea class="form-control" id="eventDescription" name="eventDescription"
                          rows="3" maxlength="500"><?php echo $event->getLongDesc() ?></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="eventShowSeperate"
                       name="eventShowSeperate" <?php echo $event->getShowSeperate() ? 'checked = "checked"' : '' ?>>
                <label class="form-check-label" for="eventShowSeperate">
                    Toon in aparte slide
                </label>
            </div>
            <button type="submit"
                    class="btn btn-primary btn-lg btn-block mt-3"><?php echo $mode == 'edit' ? 'Opslaan' : 'Toevoegen' ?></button>
        </form>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>
