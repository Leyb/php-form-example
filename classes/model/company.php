<?php

namespace classes\model;
use classes\model\BaseModel;
/**
 * Description of companies
 *
 * @author daniel
 */
class company extends BaseModel{
    
    private $id = 0;
    private $name;
    
    function __construct($name, $id = null) {
        $this->name = $name;
        $this->id = ($id)? $id : rand();
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }


    
}
