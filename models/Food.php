<?php
  class Food {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getFoods() {
        $this->db->query('SELECT * FROM PIZZA_YOU_food_item');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPizzas() {
        $this->db->query('SELECT * FROM PIZZA_YOU_food_item WHERE category = 1');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDrinks() {
        $this->db->query('SELECT * FROM PIZZA_YOU_food_item WHERE category = 2');

        $results = $this->db->resultSet();

        return $results;
    }
  }