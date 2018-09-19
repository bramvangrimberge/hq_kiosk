<?php require_once '../layout/header.php'; ?>

<?php

$db = new \Bram\DBConnection();
$connection = $db->getConnection();

?>
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <h3>Overzicht evenementen</h3>
    </div>
    <div class="mdl-cell mdl-cell--12-col">
        <table class="mdl-data-table mdl-shadow--2dp fullwidth">
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric">Material</th>
              <th>Quantity</th>
              <th>Unit price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
              <td>25</td>
              <td>$2.90</td>
            </tr>
            <tr>
              <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
              <td>50</td>
              <td>$1.25</td>
            </tr>
            <tr>
              <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
              <td>10</td>
              <td>$2.35</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php'; ?>




