<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/SubscriptionsDAO.php';

class SubscriptionsController extends Controller {

  private $subscriptionDAO;

  function __construct() {
      $this->subscriptionDAO = new SubscriptionDAO();
    }

  public function index() {
    $subscriptions = $this->subscriptionDAO->selectAllSubscriptions();
    $this->set('subscriptions', $subscriptions);
    $this->set('title', 'Abonnementen');
  }
}
