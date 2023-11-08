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
