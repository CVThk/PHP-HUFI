<?php

    class DienThoai {
        var $id, $hinh, $ten;
    }

    class Menu {
        var $title, $link;
        function __construct($title, $link)
        {
            $this->title = $title;
            $this->link = $link;   
        }
    }

    class TaiKhoan {
        var $name, $email, $username, $password, $link;
        // function __construct($name, $email, $username, $password, $link)
        // {
        //     $this->name = $name;
        //     $this->email = $email;
        //     $this->username = $username;
        //     $this->password = $password;
        //     $this->link = $link;
        // }
        function __construct()
        {
            
        }
    }
?>