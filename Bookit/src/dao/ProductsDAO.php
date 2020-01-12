<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAllProducts(){
    $sql = "SELECT `products`.*, AVG(`reviews`.`score`) AS `averagescore`, COUNT(`reviews`.`score`) AS `countscore` FROM `products` LEFT JOIN `reviews` ON `products`.`id` = `reviews`.`product_id` GROUP BY `products`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
