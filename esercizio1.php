<?php
/* 
Traccia 1:
- Crea una classe Company che abbia i seguenti attributi pubblici:
    - name: nome dell’azienda;
    - location: stato in cui e' ubicata la sede dell’azienda;
    - tot_employees: numero di dipedenti assunti in quella sede (di default, 0);
- Crea 5 istanze di 5 aziende diverse
- Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; se la sede non ha dipendendi, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;
- Definisci un attributo statico
    - avg_wage, con valore 1500.
- Implementa un nuovo metodo che, per ogni oggetto Company istanziati, calcoli la spesa annuale e la stampi per ogni oggetto.
- Implementa un nuovo metodo che e' in grado di calcolare di volta in volta tutti i totali, in relazione alle varie aziende create.
- Implementa un metodo statico che permetta di stampare a terminale il totale assoluto di tutte le aziende messe insieme.
*/

class Company {
    public $name;
    public $location;
    public $tot_employees;
    
    public static $avg_wage = 1500;
    public static $totExpenseAll = 0;

    public function __construct($name, $location, $tot_employees = 0){
        $this->name = $name;
        $this->location = $location;
        $this->tot_employees = $tot_employees;

    }

    public function employeesNumber(){
        if ($this->tot_employees > 0) {
            echo "L'ufficio $this->name"," con sede in $this->location"," ha ben $this->tot_employees dipendenti.","\n";
        }else {
            echo "L'ufficio $this->name"," con sede in $this->location"," non ha dipendenti.","\n";
        }
    }

    public function totExpenseAnnual(){
        $expenseAnnual = $this->tot_employees * self::$avg_wage * 12;
        echo "La spesa annuale per l'azienda $this->name è ","di €"," $expenseAnnual.","\n"; 

        self::$totExpenseAll += $expenseAnnual;

    }

    public function monthExpance($month){
        return $this->tot_employees * self::$avg_wage * $month;
    }

    public static function getTotalExpenseAll() {
        return self::$totExpenseAll;
    }


        
}

$company1 = new Company("Aulab", "Italia", 50);
$company2 = new Company("Volkswagen", "Germania", 800);
$company3 = new Company("Edreams", "Spagna", 75);
$company4 = new Company("Renault", "Francia", 1200);
$company5 = new Company("Easi", "Belgio", 0);

$company1->employeesNumber();
$company2->employeesNumber();
$company3->employeesNumber();
$company4->employeesNumber();
$company5->employeesNumber();

$company1->totExpenseAnnual();
$company2->totExpenseAnnual();
$company3->totExpenseAnnual();
$company4->totExpenseAnnual();
$company5->totExpenseAnnual();

echo $company1->monthExpance((int)readline("Inserisci il numero di mesi"));
echo $company2->monthExpance((int)readline("Inserisci il numero di mesi"));
echo $company3->monthExpance((int)readline("Inserisci il numero di mesi"));
echo $company4->monthExpance((int)readline("Inserisci il numero di mesi"));
echo $company5->monthExpance((int)readline("Inserisci il numero di mesi"));

$totExpanse = Company::getTotalExpenseAll();
echo "Il totale di tutte le aziende è di €","$totExpanse","\n";

?>
