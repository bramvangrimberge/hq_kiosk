<?php
require_once '../layout/header.php';
$db = new \Bram\DBConnection();
$categories = $db->getCategories();
$minutes = \Bram\Utils\DateUtils::getMinutes();
$hours = \Bram\Utils\DateUtils::getHours();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valid = true;

    if(empty($_POST['eventTitle'])) {
        $valid = false;
    }

    if(!$valid) {
        echo 'Correct errors';
    }
}

?>


<div class="row">
    <h3>Evenement aanmaken</h3>
</div>
<div class="row">
    <div class="offset-lg-3 col-lg-6">
        <form method="post">
            <div class="form-group">
                <label for="eventTitle">Titel</label>
                <input type="text" class="form-control" id="eventTitle" name="eventTitle">
            </div>
            <div class="form-group">
                <label for="eventCategory">Categorie</label>
                <select class="form-control" id="eventCategory" name="eventCategory">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?php echo $category->getCategoryId() ?>"><?php echo $category->getDescription(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Startdatum</label>
                <input type="date" id="startDate" name="startDate" max="2100-12-31"
                       min="2000-01-01" class="form-control">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="eventHour">Startuur</label>
                        <select class="form-control" id="eventHour" name="eventHour">
                            <?php foreach ($hours as $hour): ?>
                                <option value="<?php echo $hour ?>"><?php echo $hour ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eventMinute">Minuten</label>
                        <select class="form-control" id="eventMinute" name="eventMinute">
                            <?php foreach ($minutes as $minute): ?>
                                <option value="<?php echo $minute ?>"><?php echo $minute ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="eventDescription">Beschrijving</label>
                <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="eventShowSeperate" name="eventShowSeperate">
                <label class="form-check-label" for="eventShowSeperate">
                    Toon in aparte slide
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Toevoegen</button>
        </form>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>
