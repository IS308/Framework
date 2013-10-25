<?php

require 'FormValueClass.php';

class Form {

    private $_currentItem = null;

    private $_postData = array();

    private $_value = array();

    private $_error = array();


    public function __construct() {
        $this->_value = new Value();
    }


    public function post($field) {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;

        return $this;
    }

    public function value($typeOfValidator, $argument = null) {
        if ($argument == null)
            $error = $this->_value->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        else
            $error = $this->_value->{$typeOfValidator}($this->_postData[$this->_currentItem], $argument);

        if ($error)
            $this->_error[$this->_currentItem] = $error;

        return $this;
    }
	
    public function submit() {
        if (empty($this->_error)) {
            return true;
        } else {
            $str = '';
            foreach ($this->_error as $key => $value) {
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }
    }	
	
    public function fetch($fieldName = false) {
        if ($fieldName) {
            if (isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else
                return false;
        }
        else {
            return $this->_postData;
        }
    }

}
