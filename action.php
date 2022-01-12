<?php
  require_once 'includes/conn.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT PackageName FROM tbltourpackages WHERE PackageName LIKE :country 
            UNION ALL
            SELECT hotelname FROM hotel WHERE hotelname LIKE :country
            UNION ALL
            SELECT resname FROM res WHERE resname LIKE :country
    ';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['PackageName'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>