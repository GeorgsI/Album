<?php

namespace app\models;

class AddIMGForm extends Model{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        
        
        $catNum = ['catNum'=> $parameters];
        $this->data = $catNum;
    }
    


    public function getData()
    {
        return $this->data;
    }
}
