<?php
    # launch url: http://localhost/PHP-Learning/part_9.php

    ### each class should have their own files but this is just a quick mock

    class Purse {

        private
            $paperMoney = 0,
            $metalMoney = 0;

        function __construct() {
            //
        }

        function add(
            float $amount = 0 
        ) {
            if ($amount < 2) $this->metalMoney += $amount;
            else $this->paperMoney += $amount;
            return $this;
        }

        function getPaperMoney() {
            return $this->paperMoney;
        }

        function getMetalMoney() {
            return $this->metalMoney;
        }

        function measure() {
            echo 'Total paper money: ' . $this->getPaperMoney() . '<br>';
            echo 'Total metal money ' . $this->getMetalMoney() . '<br>';
        }
       
        function sum() {
            echo 'Total: ' . ($this->paperMoney + $this->metalMoney) . '<br>';
            return $this;
        }

    }

    class Glass {

        private
            $volume = 0,
            $amount = 0;

        function __construct(int $volume = 0) {
            $this->volume = $volume;
        }

        function add(
            float $amount = 0 
        ) {
            $this->amount += $amount;
            if ($this->amount > $this->volume) $this->amount = $this->volume;
        }
       
        function measure() {
            echo 'Total: ' . $this->amount . ' of ' . $this->volume . '<br>';
        }

        function remove() {
            return $this->amount;
        }

    }

    class Mushroom {

        private
            $edible = false,
            $wormed = false,
            $weight = 0;

        function __construct() {
            $this->edible = (bool) rand(0, 1);
            $this->wormed = (bool) rand(0, 1);
            $this->weight = rand(5, 45);
        }

        function getEdible() {
            return $this->edible;
        }

        function getWormed() {
            return $this->wormed;
        }

        function getWeight() {
            return $this->weight;
        }

    }

    class Basket {

        private
            $amount = 0;

        function __construct() {
            //
        }

        function add(
            float $amount = 0 
        ) {
            $this->amount += $amount;
        }

        function measure() {
            return $this->amount;
        }

    }

    class SessionNine {

        function __construct() {
            $purse = new Purse;
            $purse->add(1.5)->add(4.5)->sum();
            $purse->measure();

            $glass1 = new Glass(200);
            $glass2 = new Glass(150);
            $glass3 = new Glass(100);
            $glass1->add(200);
            $glass2->add($glass1->remove());
            $glass3->add($glass2->remove());
            $glass1->measure();
            $glass2->measure();
            $glass3->measure();

            $basket = new Basket;
            do {
                $mushroom = new Mushroom;
                if ($mushroom->getEdible() && !$mushroom->getWormed()) {
                    $basket->add($mushroom->getWeight());
                }
            } while ($basket->measure() < 500);
            echo 'Mushrooms collected: ' . $basket->measure();
        }

    }
  
    $session = new SessionNine;
