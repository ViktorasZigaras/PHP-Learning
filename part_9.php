<?php
    # launch url: http://localhost/PHP-Learning/part_9.php

    ### each class should have their own files but this is just a quick mock

    class Purse {

        private
            $paperMoney = [],
            $metalMoney = [];

        public function add(
            float $amount = 0 
        ) : Purse {
            if ($amount < 2) $this->metalMoney[] = $amount;
            else $this->paperMoney[] = $amount;
            return $this;
        }

        public function measurePaperMoney() : void {
            echo 'Total paper money: ' . array_sum($this->paperMoney) . ' (x' . count($this->paperMoney) . ')<br>';
        }

        public function measureMetalMoney() : void {
            echo 'Total metal money ' . array_sum($this->metalMoney) . ' (x' . count($this->metalMoney) . ')<br>';
        }

        public function measure() : void {
            $this->measurePaperMoney();
            $this->measureMetalMoney();
        }
       
        public function sum() : Purse {
            echo 'Total: ' . (array_sum($this->paperMoney) + array_sum($this->metalMoney)) . '<br>';
            return $this;
        }

    }

    class Glass {

        private
            $volume = 0,
            $amount = 0;

            public function __construct(int $volume = 0) {
            $this->volume = $volume;
        }

        public function add(
            float $amount = 0 
        ) : Glass {
            $this->amount += $amount;
            if ($this->amount > $this->volume) $this->amount = $this->volume;
            return $this;
        }
       
        public function measure() : void {
            echo 'Total: ' . $this->amount . ' of ' . $this->volume . '<br>';
        }

        public function remove() : float {
            $temp = $this->amount;
            $this->amount = 0;
            return $temp;
        }

    }

    class Mushroom {

        private
            $edible = false,
            $wormed = false,
            $weight = 0;

        public function __construct() {
            $this->edible = (bool) rand(0, 1);
            $this->wormed = (bool) rand(0, 1);
            $this->weight = rand(5, 45);
        }

        public function __get($prop) {
            if (in_array($prop, ['edible', 'wormed', 'weight'])) {
                return $this->$prop;
            }
        }

    }

    class Basket {

        const VOLUME = 500;
        private
            $amount = 0;

        public function add(
            Mushroom $mushroom
        ) : bool {
            if ($mushroom != null && $mushroom->edible && !$mushroom->wormed) { 
                $this->amount += $mushroom->weight;
            }
            return $this->amount < self::VOLUME;
        }

        public function __get($prop) {
            if (in_array($prop, ['amount'])) {
                return $this->$prop;
            }
        }

    }

    class SessionNine {

        public function __construct() {
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
            while ($basket->add(new Mushroom)) {}
            echo 'Mushrooms collected: ' . $basket->amount;
        }

    }
  
    $session = new SessionNine;
