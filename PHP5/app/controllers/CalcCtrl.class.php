<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
        private $hide_intro; //zmienna informująca o tym czy schować intro
	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
                $this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->liczbaMiesiecy = getFromRequest('liczbaMiesiecy');
		$this->form->oprocentowanie = getFromRequest('oprocentowanie');
                $this->form->op = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->x ) && isset ( $this->form->liczbaMiesiecy ) && isset ( $this->form->oprocentowanie ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
                } else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano wartości kredytu!');
		}
		if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano oprocentowania!');
		}
                if ($this->form->liczbaMiesiecy == "") {
			getMessages()->addError('Nie podano ilosci miesiecy!');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if ((! is_numeric ( $this->form->x ))||($this->form->x <= 0)) {
				getMessages()->addError('Wprowadzono niepoprawną wartość kredytu!');
			}
                        
                        if ((! is_numeric ( $this->form->oprocentowanie ))||($this->form->oprocentowanie < 0)) {
				getMessages()->addError('Wprowadzono niepoprawne oprocentowanie!');
			}
                        
			if ((! is_numeric ( $this->form->liczbaMiesiecy ))||($this->form->liczbaMiesiecy <= 0)) {
				getMessages()->addError('Wprowadzono niepoprawną ilość miesięcy!');
                        }	
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
                        $this->form->oprocentowanie = floatval($this->form->oprocentowanie);
			$this->form->LiczbaMiesiecy = intval($this->form->liczbaMiesiecy);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			switch ($this->form->x) {
				case ($this->form->x>99999):
                            if ($role == 'admin') {
                                $poprocentowanie = ($this->form->oprocentowanie)/100;
                                $px = (($this->form->x) * $poprocentowanie) + ($this->form->x);
                                $this->result->result = $px/($this->form->liczbaMiesiecy);
                            }else{
                                getMessages()->addInfo('Tylko administrator może wykonać operacje na tak wysokiej kwocie !');
                                 }
                        break;
                        default :
                                $poprocentowanie = ($this->form->oprocentowanie)/100;
                                $px = (($this->form->x) * $poprocentowanie) + ($this->form->x);
                                $this->result->result = $px/($this->form->liczbaMiesiecy);
                        break;
			}
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		//nie trzeba już tworzyć Smarty i przekazywać mu konfiguracji i messages
		// - wszystko załatwia funkcja getSmarty()
		
		getSmarty()->assign('page_title','Aplikacja');
		getSmarty()->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
				
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		getSmarty()->display('CalcView.tpl');
	}
}