<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/class/Messages.class.php';
require_once $conf->root_path.'/class/CalcForm.class.php';
require_once $conf->root_path.'/class/CalcResult.class.php';

class CalcCtrl{
    
    private $form;
    private $result;
    private $messages;
    
    public function __construct()
    {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = new Messages();
    }
    
    public function zwalidujIWykonaj()
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
            $this->messages->addError('Nie podano kwoty tankowania!');
            $walidacja = false;
        }
        if ($this->form->cenaZaLitr == "")
        {
            $this->messages->addError('Nie podano ceny za litr!');
            $walidacja = false;
        }
        if ($this->form->stanPoczatkowy == "")
        {
            $this->messages->addError('Nie podano stanu licznika!');
            $walidacja = false;
        }
        if ($this->form->dataTankowania == "")
        {
            $this->messages->addError('Nie podano daty tankowania!');
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
            $this->messages->addError('Kwota tankowania powinna być liczbą!');
            $walidacja = false;
        }
        if (!is_float($this->form->cenaZaLitr))
        {
            $this->messages->addError('Cena za litr powinna być liczbą!');
            $walidacja = false;
        }	
        if (!is_numeric($this->form->stanPoczatkowy))
        {
            $this->messages->addError('Stan licznika powinna być liczbą!');
            $walidacja = false;
        }

        return $walidacja;
    }

    private function wykonajZadanie(){
        $this->form->kwotaTankowania = floatval($this->form->kwotaTankowania);
        $this->form->cenaZaLitr = floatval($this->form->cenaZaLitr);
        $this->form->stanPoczatkowy = intval($this->form->stanPoczatkowy);
        $this->form->stanPoczatkowy = strval($this->form->stanPoczatkowy);

        $this->result = $this->form->kwotaTankowania / $this->form->cenaZaLitr;
    }

    private function generujWidok()
    {
        global $conf;
        $smarty = new Smarty();

        $smarty->assign('conf',$conf);
        $smarty->assign('page_title','Kalkulator spalania - wprowadzanie danych');
        $smarty->assign('form',$this->form);
        $smarty->assign('result',$this->result);
        $smarty->assign('messages',$this->messages);
        
        $smarty->display($conf->root_path.'/templates/calc.tpl');
    }
}