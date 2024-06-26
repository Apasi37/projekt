<?php

    class Page{
        
        private $page_name;

        public function __construct($page_name){
            $this->page_name = $page_name;
        }

        function add_stylesheet() {
            $result = '
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
            ';
        
            switch($this->page_name){
                case 'home':
                    $result .= '<link rel="stylesheet" href="../assets/css/home.css">';
                    break;
                case 'posts':
                    $result .= '<link rel="stylesheet" href="../assets/css/posts.css">';
                    break;
                case 'image':
                    $result .= '<link rel="stylesheet" href="../assets/css/image.css">';
                    break;
                case 'admin':
                    $result .= '<link rel="stylesheet" href="../assets/css/admin.css">';
                    break;
            }
            return $result;
        }

        function add_scripts(){
            $result = '<script src="../assets/js/header.js"></script>';
            switch($this->page_name){
            case 'home':
                $result .= '<script src="../assets/js/indexFadeIn.js"></script>';
                break;
            case 'posts':
                $result .= '<script src="../assets/js/posts.js"></script>';
                break;
            case 'admin':
                $result .= '<script src="../assets/js/admin.js"></script>';
                break;
            }
            return $result;
        }
    }

?>