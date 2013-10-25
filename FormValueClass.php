<?php

class Value {

    public function __construct() {
        
    }

    public function minlength($data, $argument) {
        if (strlen($data) < $argument) {
            return "Та багадаа $argument тэмдэгт оруулна уу<br>";
        }
    }

    public function maxlength($data, $argument) {
        if (strlen($data) > $argument) {
            return "Та ихдээ $argument тэмдэгт оруулна уу<br>";
        }
    }

    public function digit($data) {
        if (ctype_digit($data) == false) {
            return "Та зөвхөн тоо оруулна уу <br>";
        }
    }

    public function __call($name, $argument) {
        throw new Exception("$name ийм нэртэй класс: " . __CLASS__);
    }

}
