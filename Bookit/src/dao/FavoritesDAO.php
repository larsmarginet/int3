<?php

require_once( __DIR__ . '/DAO.php');

class FavoriteDAO extends DAO {

  public function selectAllProductsWIthId($ids) {
    $sql = "SELECT `products`.*, AVG(`reviews`.`score`) AS `averagescore`, COUNT(`reviews`.`score`) AS `countscore` FROM `products` LEFT JOIN `reviews` ON `products`.`id` = `reviews`.`product_id` WHERE 1";

    $bindValues = array();

    if (!empty($ids)) {
      $idsParams = "";
      foreach($ids as $index => $value){
          $idsParams .= ":product_id_".$index.",";
          $bindValues[":product_id_".$index] = $value;
      }
      $idsParams = rtrim($idsParams,",");
      $sql .= " AND `products`.`id` IN ($idsParams)";
    }

    $sql .= " GROUP BY `products`.`id`";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
