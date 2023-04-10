<?php
    include('Utilities.php');
    class PhanSo {
        public $tuSo, $mauSo;
        public function __construct()
        {
            
        }
        function rutGon(PhanSo $ps) {
            $uc = Utilities::ucln($ps->tuSo, $ps->mauSo);
            $ps->tuSo /= $uc;
            $ps->mauSo /= $uc;
            return $ps;
        }
        function cong(PhanSo $b) {
            $ps = new PhanSo();
            $ps->tuSo = $this->tuSo * $b->mauSo + $b->tuSo * $this->mauSo;
            $ps->mauSo = $this->mauSo * $b->mauSo;
            return $this->rutGon($ps);
        }
        function tru(PhanSo $b) {
            $ps = new PhanSo();
            $ps->tuSo = $this->tuSo * $b->mauSo - $b->tuSo * $this->mauSo;
            $ps->mauSo = $this->mauSo * $b->mauSo;
            return $this->rutGon($ps);
        }
        function nhan(PhanSo $b) {
            $ps = new PhanSo();
            $ps->tuSo = $this->tuSo * $b->tuSo;
            $ps->mauSo = $this->mauSo * $b->mauSo;
            return $this->rutGon($ps);
        }
        function chia(PhanSo $b) {
            $ps = new PhanSo();
            $ps->tuSo = $this->tuSo * $b->mauSo;
            $ps->mauSo = $this->mauSo * $b->tuSo;
            return $this->rutGon($ps);
        }
    }
    
?>