<?php

namespace classes\model;

/**
 * Description of companies
 *
 * @author daniel
 */
class companies {
    
    private $id = 0;
    private $name;
    
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
