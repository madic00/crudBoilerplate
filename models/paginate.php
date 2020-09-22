<?php 

    class Paginate {

        public $currPage;
        public $itemsPerPage;
        public $itemsTotal;

        public function __construct($currPage = 1, $itemsPerPage = 3, $itemsTotal = 0) {
            $this->currPage = $currPage;
            $this->itemsPerPage = $itemsPerPage;
            $this->itemsTotal = $itemsTotal;
            
        }

        public function next() {
            return $this->currPage + 1;
        }

        public function previous() {
            return $this->currPage - 1;
        }

        public function pageTotal() {
            return ceil($this->itemsTotal / $this->itemsPerPage);
        }

        public function hasPrev() {
            return $this->previous() >= 1 ? true : false;
        }

        public function hasNext() {
            return $this->next() <= $this->pageTotal() ? true : false;
        }

        public function offset() {
            return ($this->currPage - 1) * $this->itemsPerPage;
        }




    }


?>