<?php
    class HinhChuNhat {
        public $cd;
        public $cr;
        function __construct($chieudai, $chieurong) {
            $this->cd = $chieudai;
            $this->cr = $chieurong;
        }
        public function tinhChuVi() {
            return ($this->cd + $this->cr) * 2;
        }
        public function tinhDienTich() { return $this->cd * $this->cr; }
    }

?>