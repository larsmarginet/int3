<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAllProducts($category = false){
    $sql = "SELECT `products`.*, AVG(`reviews`.`score`) AS `averagescore`, COUNT(`reviews`.`score`) AS `countscore` FROM `products` LEFT JOIN `reviews` ON `products`.`id` = `reviews`.`product_id` WHERE 1";

    $bindValues = array();

    if (!empty($category)) {
      $categoryParams = "";
      foreach($category as $index => $value){
          $categoryParams .= ":category_id_".$index.",";
          $bindValues[":category_id_".$index] = $value;
      }
      $categoryParams = rtrim($categoryParams,",");
      $sql .= " AND `products`.`product_category` IN ($categoryParams)";
    }

    $sql .= " GROUP BY `products`.`id`";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
