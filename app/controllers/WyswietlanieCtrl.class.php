<?php namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class WyswietlanieCtrl
{
    private $form;
    private $result;
    private $conn;
    
    public function __construct()
    {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->conn = new \mysqli("localhost", "root", "", "KALKULATOR");
    }
    
    public function wykonaj()
    {
        $this->pobierzDane();
        $this->generujWidok();
    }
    
    private function pobierzDane()
    {
        $query = "SELECT * FROM DANE_TANKOWAN ORDER BY ID";
        $this->result = $this->conn->query($query);
    }
    
    private function generujWidok()
    {
        getSmarty()->assign('page_title','Kalkulator spalania - wyświetlanie danych');
        getSmarty()->assign('form',$this->form);
        getSmarty()->assign('result',$this->result);
        
        getSmarty()->display('wyswietlanie.tpl');
    }
}