<?php
namespace app\models;


class AddAlbumForm extends Model{
    function execute($action, $parameters)
    {
        parent::execute($action, $parameters);
        //$this->data = 'Данные страницы Authorization';
    }
    


    public function getData()
    {
        return $this->data;
    }
}

