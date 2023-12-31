<h1>kallulator PHP</h1>
<p><pre>
    <h3>
    Jeśli formularz został przesłany (POST):
    Pobierz wartości z formularza (num1, num2, operator)
    
    Jeśli num1 lub num2 nie są liczbami:
    Wyświetl komunikat o konieczności podania liczb
    W przeciwnym wypadku:
    Konwertuj num1 i num2 na liczby zmiennoprzecinkowe
        
    Wykonaj poniższe operacje w zależności od wybranego operatora:
    Jeśli operator to dodawanie:
    Dodaj num1 do num2 i zapisz wynik jako result
    Jeśli operator to odejmowanie:
    Odejmij num2 od num1 i zapisz wynik jako result
    Jeśli operator to mnożenie:
    Pomnóż num1 przez num2 i zapisz wynik jako result
    Jeśli operator to dzielenie:
    Sprawdź, czy num2 nie jest równy 0
    Jeśli jest równy 0:
    Wyświetl komunikat "Nie dziel przez zero"
    W przeciwnym wypadku:
    Podziel num1 przez num2 i zapisz wynik jako result
        
    Wyświetl wynik obliczeń (result)
    </h3>
</pre></p>

<form action="calc.php" method="post">

<input type="text" name="num1" id="num1" placeholder="number 1" required>
<select name="operator" id="operator">
    <option value="+" selected>+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select>
<input type="text" name="num2" id="num2" placeholder="number 2" required>
<input type="submit" name="submit" value="=">
</form>

<?php
if ( $_POST['submit'] ) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    if( !is_numeric($num1) || !is_numeric($num2) ){
        echo "Musisz podac liczby";
    } else {
        
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        switch ($operator){
            case '+':
                $result = $num1 + $num2;
                echo "Wynik = ".$result;
                break;
            case '-':
                $result = $num1 - $num2;
                echo "Wynik = ".$result;
                break;
            case '*':
                $result = $num1 * $num2;
                echo "Wynik = ".$result;
                break;
            case '/':
                if ($num2 == 0){
                    echo "Nie dziel przez zero";
                    break;
                };

                $result = $num1 / $num2;
                echo "Wynik = ".$result;
                break;
        }
    }
}

?>


<hr>
<h1>
    Kalkulator wynagrodzenia za prace
</h1>
<hr>
<p><pre><h3>
Pobierz od użytkownika ilość przepracowanych godzin
Pobierz stawkę godzinową

Jeśli ilość przepracowanych godzin i stawka godzinowa są liczbami:
    Oblicz wynagrodzenie pracownika jako ilość_godzin * stawka_godzinowa

    Wyświetl obliczone wynagrodzenie pracownika
W przeciwnym wypadku:
    Wyświetl komunikat o błędnie wprowadzonych danych
</h3></pre></p>
<form action="payment.php" method="post">
    <label for="hoursWorked">Ilosc przepracowanych godzin</label><br>
    <input type="number" name="hoursWorked" id="hoursWorked" required> 
    <br>
    <label for="hourlyRate">Stawka godzinowa PLN</label><br>
    <input type="number" name="hourlyRate" id="hourlyRate" step="0.5" min="0" required><br>
    <input type="submit" name="submit" value="Oblicz">
</form>

<?php

if( isset($_POST['submit']) ){
    $hoursWorked = $_POST['hoursWorked'];
    $hourlyRate = $_POST['hourlyRate'];

    if(is_numeric($hoursWorked) && is_numeric($hourlyRate) ){
        $total = $hoursWorked * $hourlyRate;
        echo "Wynagrodzenie za przepracowane godziny" .$total. "PLN";
    } else {
        echo "Prosze podac poprawne dane ";
    }
}

?>



<h1>
    Pomiar Cisnienia

</h1>
<hr>
<h3>
    <p>
        <pre>
        Pobierz dane wejściowe od użytkownika (np. pomiar ciśnienia)

Sprawdź otrzymane dane ciśnienia tętniczego
    Jeśli ciśnienie jest w normalnym zakresie (120 - 130):
        Wyświetl komunikat - "Ciśnienie jest w normie."
    Jeśli ciśnienie jest nieco podwyższone (130 - 140):
        Wyświetl komunikat - "Ciśnienie jest lekko podwyższone. Monitoruj."
    Jeśli ciśnienie jest wysokie (powyżej 140):
        Wyświetl komunikat - "Ciśnienie jest wysokie. Skonsultuj się z lekarzem."
    Jeśli ciśnienie jest zbyt niskie (poniżej 90):
        Wyświetl komunikat - "Ciśnienie jest zbyt niskie. Skontaktuj się z lekarzem."
    Dla pozostałych przypadków:
        Wyświetl komunikat - "Nieprawidłowy odczyt ciśnienia. Spróbuj ponownie."

        </pre>
    </p>
</h3>



<form action="bloodpressure.php" method="post">

<input type="number" name="pressure" id="pressure" min="0" step=".5" required>
<input type="submit" name="submit" value="Wyslij">
</form>

<?php

if( $_SERVER["REQUEST_METHOD"] == "POST"){
    
    $pressure = $_POST['pressure'];
    $getDate = date('Y-m-d');
    
    echo "Cisnienie ".$pressure ." Dnia " .$getDate . "<br>";
    
    switch ( $pressure) {
        case ($pressure >= 100 && $pressure <=125):
            echo "Cisnienie jest w normie";
            break;
        case ($pressure >= 126 && $pressure <=135):
            echo "Ciśnienie jest lekko podwyższone. Monitoruj.";
            break;
        case ($pressure >= 136):
            echo "Ciśnienie jest wysokie. Skonsultuj się z lekarzem.";
            break;
        case ($pressure < 100):
            echo "Ciśnienie jest zbyt niskie. Skontaktuj się z lekarzem.";
            break;
        default:
            echo "Nieprawidłowy odczyt ciśnienia. Spróbuj ponownie.";
    };

}
?>
