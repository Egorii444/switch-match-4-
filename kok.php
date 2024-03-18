<!DOCTYPE html>
<html>
<head>
    <title>Конвертер валют</title>
</head>
<body>
<h2>Конвертер валют</h2>
<form method="post">
    <label>Введите сумму для конвертации:</label><br>
    <input type="text" name="amount"><br><br>
    <label>Выберите валюту для конвертации:</label><br>
    <select name="currency">
        <option value="USD">Доллар США (USD)</option>
        <option value="EUR">Евро (EUR)</option>
        <option value="GBP">Фунт стерлингов (GBP)</option>
    </select><br><br>
    <input type="submit" value="Конвертировать">
</form>

<?php
// Функция для конвертации валют
function convertCurrency($amount, $currency) {
    switch ($currency) {
        case 'USD':
            return $amount * 0.84; // Курс доллара к евро
        case 'EUR':
            return $amount * 1.18; // Курс евро к доллару
        case 'GBP':
            return $amount * 1.37; // Курс фунта к доллару
        default:
            return "Ошибка: некорректная валюта";
    }
}

// Проверяем, была ли отправлена сумма и выбрана валюта из формы
if(isset($_POST['amount']) && isset($_POST['currency'])) {
    // Получаем сумму и выбранную валюту из формы
    $amount = floatval($_POST['amount']);
    $currency = $_POST['currency'];

    // Конвертируем сумму в выбранную валюту
    $convertedAmount = convertCurrency($amount, $currency);

    // Выводим результат конвертации
    echo "<p>Конвертированная сумма: $convertedAmount $currency</p>";
}
?>
</body>
</html>