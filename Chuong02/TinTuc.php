<?php
    class TinTuc {
        var $ma, $tieuDe, $noiDung, $hinh;
        function __construct($ma, $tieuDe, $noiDung, $hinh)
        {
            $this->ma = $ma;
            $this->tieuDe = $tieuDe;
            $this->noiDung = $noiDung;
            $this->hinh = $hinh;
        }
    }
?>