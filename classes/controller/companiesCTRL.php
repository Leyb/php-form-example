<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\controller;

use classes\DAO\companiesDAO;
use classes\model\company;

/**
 * Description of companiesCTRL
 *
 * @author daniel
 */
class companiesCTRL extends companiesDAO {

    //put your code here

    public function createAction() {
        
    }

    public function deleteACtion() {
        
    }

    public function getAction($id) {
        
        try {
            $company = company::findOrFail($id);
        } catch (Exception $ex) {
            $company = [];
        }

        return $company;
    }

    public function editAction() {
        
    }

}
