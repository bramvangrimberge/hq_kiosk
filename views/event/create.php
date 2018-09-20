<?php
require_once '../layout/header.php';
$db = new \Bram\DBConnection();
$categories = $db->getCategories();

?>


<div class="row">
    <h3>Evenement aanmaken</h3>
</div>
<div class="row">
    <form>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="title">
                <label class="mdl-textfield__label" for="title">Titel</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="category" name="category">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?php echo $category->getCategoryId() ?>"><?php echo $category->getDescription(); ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="mdl-textfield__label" for="category">Categorie</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder">
                <input class="mdl-textfield__input" type="date" id="startDate">
                <label class="mdl-textfield__label" for="startDate">Startdatum</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder">
                <select class="mdl-textfield__input" id="category" name="category">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?php echo $category->getCategoryId() ?>"><?php echo $category->getDescription(); ?></option>
                    <?php endforeach; ?>
                </select>
                <label class="mdl-textfield__label" for="category">Categorie</label>
            </div>
        </div>
    </form>
</div>

<?php require_once '../layout/footer.php'; ?>
