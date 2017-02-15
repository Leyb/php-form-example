<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\model;

/**
 * Description of BaseModel
 *
 * @author danielw
 */
class BaseModel {

    //put your code here


    static public function findOrFail($id) {
        $className = get_called_class();
        
        //$entityData = DAO::find($className, $id);
        $entityData = ['asd', 12];
        
        if(!$entityData || sizeof($entityData) === 0)
            throw new Exception ('Fuck me');
        
        return new $className(...$entityData);
    }

}
