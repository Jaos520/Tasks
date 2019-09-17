<!DOCTYPE html>
<html lang="ru">

<?php
  $connection = mysqli_connect('127.0.0.1','root','','Task')
  or die("Ошибка"); //подключение бд

  if (isset($_GET['SubmitName'])) { //При нажатии на кнопку
    $name = $_GET['InputName']; //считывание с поля ввода
    mysqli_query($connection, "INSERT INTO Countries (name) VALUES ('$name')"); //запрос добавления поля в таблицу бд
  }
  $result = mysqli_query($connection, "SELECT * FROM Countries"); //записываем все данные таблицы
  mysqli_close($connection); //отключаемся от бд
?>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Интерфейс добавления и просмотра данных</title>
</head>
<body>
  <dir id="countrieslist">
    <p>Страны:</p>
    <?php
      while (($r1 = mysqli_fetch_assoc($result))){  //вывод данных из таблицы
        echo $r1['name']."<br>";
      }
    ?>
  </dir>
  <form action="task5b.php" method="get" id="inputpanel">
    <input type="text" size=30 name="InputName"><br>
    <input type="submit" value="Добавить страну" name="SubmitName">
  </form>
</body>
</html>
