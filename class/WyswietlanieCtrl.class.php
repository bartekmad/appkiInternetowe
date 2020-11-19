<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/class/Messages.class.php';
require_once $conf->root_path.'/class/CalcForm.class.php';
require_once $conf->root_path.'/class/CalcResult.class.php';

class WyswietlanieCtrl
{
    private $form;
    private $result;
    private $messages;
    private $conn;
    
    public function __construct()
    {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = new Messages();
        $this->conn = new mysqli("localhost", "root", "", "KALKULATOR");
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
        global $conf;
        $smarty = new Smarty();

        $smarty->assign('conf',$conf);
        $smarty->assign('page_title','Kalkulator spalania - wyświetlanie danych');
        $smarty->assign('form',$this->form);
        $smarty->assign('result',$this->result);
        $smarty->assign('messages',$this->messages);
        
        $smarty->display($conf->root_path.'/templates/wyswietlanie.tpl');
    }
}