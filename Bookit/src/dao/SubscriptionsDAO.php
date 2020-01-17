<?php

require_once( __DIR__ . '/DAO.php');

class SubscriptionDAO extends DAO {
  public function selectAllSubscriptions(){
    $sql = "SELECT * FROM `subscriptions`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectSubscriptionById($id){
    $sql = "SELECT * FROM `subscriptions` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
