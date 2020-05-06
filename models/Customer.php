<?php
  class Customer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getCustomers() {
        $this->db->query('SELECT * FROM PIZZA_YOU_customers ORDER BY created_at DESC');

        $results = $this->db->resultSet();

        return $results;
    }
  }