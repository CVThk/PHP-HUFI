<?php
    class Pager {
        function __construct(){}

        function getStart($limit) {
            if(!isset($_GET["page"])) {
                $_GET["page"] = 1;
            }
            return ($_GET["page"] - 1) * $limit;
        }
        function getMaximumPage($countItem, $limit) {
            return ceil((float)$countItem / $limit);
        }
        function getButtonPage($curPage, $maximumPage) {
            $btnPage = '<div style="padding: 20px; display: flex; justify-content: center;">';
            if($curPage <= $maximumPage) {
                if($curPage == 1) {
                    $btnPage.='<a class="btn-pager disable">First</a><a class="btn-pager disable">Previous</a>';
                }
                else {
                    $btnPage.='<a class="btn-pager" href="'.$_SERVER['PHP_SELF'].'?page=1">First</a>
                    <a class="btn-pager" href="'.$_SERVER['PHP_SELF'].'?page='.($curPage - 1).'">Previous</a>';
                }
            }
            $posStart = max($curPage - 2, 1);
            $posEnd = min($maximumPage, $curPage + 2);
            for($i = $posStart; $i <= $posEnd; $i++) {
                if($i == $curPage) {
                    $btnPage.= '<a class="btn-pager current">'.$i.'</a>';
                }
                else {
                    $btnPage.='<a class="btn-pager" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a>';
                }
            }
            if($curPage + 1 <= $maximumPage) {
                $btnPage.='<a class="btn-pager" href="'.$_SERVER['PHP_SELF'].'?page='.($curPage + 1).'">Next</a>
                    <a class="btn-pager" href="'.$_SERVER['PHP_SELF'].'?page='.$maximumPage.'">Last</a>';
            }
            else {
                $btnPage.='<a class="btn-pager disable">Next</a><a class="btn-pager disable">Last</a>';
            }
            $btnPage.='</div>';
            return $btnPage;
        }
    }
?>