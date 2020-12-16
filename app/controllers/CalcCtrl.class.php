<?php namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl
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
        $this->pobierzParametry();
        if ($this->czyWpisaneWartosci())
        {
            if ($this->waliduj())
            {
                $this->wykonajZadanie();
            }
        }
        $this->generujWidok();
    }
    
    private function pobierzParametry()
    {
        $this->form->kwotaTankowania = isset($_REQUEST['kwotaTankowania']) ? $_REQUEST['kwotaTankowania'] : null;
        $this->form->cenaZaLitr = isset($_REQUEST['cenaZaLitr']) ? $_REQUEST['cenaZaLitr'] : null;
        $this->form->stanPoczatkowy = isset($_REQUEST['stanPoczatkowy']) ? $_REQUEST['stanPoczatkowy'] : null;
        $this->form->dataTankowania = isset($_REQUEST['dataTankowania']) ? $_REQUEST['dataTankowania'] : null;
    }

    private function czyWpisaneWartosci()
    {
        return (isset($this->form->kwotaTankowania) && isset($this->form->cenaZaLitr) && isset($this->form->stanPoczatkowy) && isset($this->form->dataTankowania));
    }

    private function waliduj()
    {
        $walidacja = true;

        if ($this->form->kwotaTankowania == "")
        {
            getMessages()->addError('Nie podano kwoty tankowania!');
            $walidacja = false;
        }
        if ($this->form->cenaZaLitr == "")
        {
            getMessages()->addError('Nie podano ceny za litr!');
            $walidacja = false;
        }
        if ($this->form->stanPoczatkowy == "")
        {
            getMessages()->addError('Nie podano stanu licznika!');
            $walidacja = false;
        }
        if ($this->form->dataTankowania == "")
        {
            getMessages()->addError('Nie podano daty tankowania!');
            $walidacja = false;
        }

        if ($walidacja == false)
        {
            return false;
        }

        $this->form->kwotaTankowania = floatval(str_replace(',', '.', $this->form->kwotaTankowania));
        $this->form->cenaZaLitr = floatval(str_replace(',', '.', $this->form->cenaZaLitr));
        if (!is_float($this->form->kwotaTankowania))
        {
            getMessages()->addError('Kwota tankowania powinna być liczbą!');
            $walidacja = false;
        }
        if (!is_float($this->form->cenaZaLitr))
        {
            getMessages()->addError('Cena za litr powinna być liczbą!');
            $walidacja = false;
        }	
        if (!is_numeric($this->form->stanPoczatkowy))
        {
            getMessages()->addError('Stan licznika powinna być liczbą!');
            $walidacja = false;
        }
        
        $query = "SELECT STAN_START, DATA FROM DANE_TANKOWAN ORDER BY ID DESC LIMIT 1";
        $wynik = $this->conn->query($query);
        if ($wynik->num_rows > 0)
        {
            while($dana = $wynik->fetch_assoc())
            {
                if ($this->form->stanPoczatkowy < $dana["STAN_START"])
                {
                    getMessages()->addError('Stan licznika musi być większy od poprzedniego!');
                    $walidacja = false;
                }
                if ($this->form->dataTankowania < $dana["DATA"])
                {
                    getMessages()->addError('Data tankowania nie może być wcześniejsza od poprzedniej!');
                    $walidacja = false;
                }
            }
        }
        return $walidacja;
    }
    
    
    private function wykonajZadanie(){
        $kwotaTankowania = floatval($this->form->kwotaTankowania);
        $cenaZaLitr = floatval($this->form->cenaZaLitr);
        $stanPoczatkowy = intval($this->form->stanPoczatkowy);
        $dataTankowania = date($this->form->dataTankowania);
       
        $query2 = "SELECT ID, STAN_START FROM DANE_TANKOWAN ORDER BY ID DESC LIMIT 1";
        $wynik = $this->conn->query($query2);
        if ($wynik->num_rows > 0)
        {
            while($dana = $wynik->fetch_assoc())
            {
                if ($stanPoczatkowy > $dana["STAN_START"])
                {
                    $query3 = "UPDATE DANE_TANKOWAN SET STAN_STOP = '{$stanPoczatkowy}' WHERE ID = '{$dana["ID"]}'";
                    $this->conn->query($query3);
                }
            }
        }
        
        $insert = "INSERT INTO DANE_TANKOWAN (KWOTA, CENA_LITR, STAN_START, DATA) VALUES ('{$kwotaTankowania}','{$cenaZaLitr}','{$stanPoczatkowy}','{$dataTankowania}')";

        if ($this->conn->query($insert) == TRUE)
        {
            $this->result = "dodane";
        }
        else
        {
           $this->result = "kisznik";
        }
    }

    public function generujWidok()
    {
        getSmarty()->assign('page_title','Kalkulator spalania - wprowadzanie danych');
        getSmarty()->assign('form',$this->form);

        if (!is_string($this->result))
        {
            $this->result = "wprowadz dane";
        }
            
        getSmarty()->assign('result',$this->result);
        
        getSmarty()->display('calc.tpl');
    }
}