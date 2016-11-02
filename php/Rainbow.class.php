<?php
//
//class Rainbow {
//
//    public $page_title;
//    public $page_description;
//    public $page_name;
//    public $configs;
//    public $isPartial = false;
//
//    public function __construct() {
//        $this->configs = parse_ini_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.ini", true);
//        $this->GET_CTRL(\filter_input_array(INPUT_GET));
//    }
//
//    private function GET_CTRL($param) {
//        $uri = explode('/', $param['page']);
//        $part = array_shift($uri);
//        $this->page_name = ($part == "") ? 'index' : $part;
//        $this->page_title = $this->configs['pageTitle'][(!$this->configs['pageTitle'][$this->page_name]) ? 'index' : $this->page_name];
//        $this->page_description = $this->configs['metaDescription'][(!$this->configs['metaDescription'][$this->page_name]) ? 'index' : $this->page_name];
//        if (method_exists($this, $this->page_name)) {
//            $this->$param['page']();
//        }
//    }
//
////    public function articles() {
////        $words = preg_replace('/\d+/', '', $this->page_name);
////        if ($words == "article") {
////            return true;
////        }
////    }
//
//    public function isMobile() {
//        if (preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT'])) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function is_old_android($version) {
//
//        if (strstr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
//
//            preg_match('/Android (\d+(?:\.\d+)+)[;)]/', $_SERVER['HTTP_USER_AGENT'], $matches);
//
//            return version_compare($matches[1], $version, '<=');
//        }
//    }
//
//    public function generateDropBox($id, $param, $placeholder = null, $selected = null) {
//        if (!$placeholder) {
//            $placeholder = $this->configs['dropdowns']['placeholder'];
//        }
//        $data = $this->configs['dropdowns'][$param];
//        $result = '<select name="' . $id . '" id="' . $id . '" class="form-control ">';
//        $result .='<option value="">' . $placeholder . '</option>';
//        foreach ($data as $key => $value) {
//            if ($key === $selected) {
//                $sel = ' selected';
//            } else {
//                $sel = '';
//            }
//            $result .= '<option value="' . $key . '" ' . $sel . '>' . $value . '</option>';
//        }
//        $result .= '</select>';
//
//        return $result;
//    }
//
//    private function removeCookies() {
//        if (isset($_COOKIE)) {
//            foreach ($_COOKIE as $name => $value) {
//                setcookie($name, '', 1, '/');
//            }
//        }
//    }
//
//    private function redirect($url = NULL) {
//        if (empty($_SERVER['HTTPS'])) {
//            $http = "http";
//        } else {
//            $http = "https";
//        }
//        header("Location: " . $http . "://" . $_SERVER['SERVER_NAME'] . substr($_SERVER['PHP_SELF'], 0, -9) . $url);
//        exit;
//    }
//
//    public function thank_you() {
//         if (!$_COOKIE['send_cookie']) {
//             $this->redirect();
//         }
//
//        $this->removeCookies();
//    }
//
//}
