<?php
session_start();
if(!isset($_SESSION['trivial'])){
   $_SESSION['trivial'] = [   
      [
         'id' => 1,
         'question' => '¿Cuál es la capital de Francia?',
         'options' => ['París', 'Londres', 'Berlín'],
         'answer' => 'París'
      ],
      [
         'id' => 2,
         'question' => '¿Cuánto es 2 + 2?',
         'options' => ['3', '4', '5'],
         'answer' => '4'
      ],
      [
         'id' => 3,
         'question' => '¿Qué continente es el hogar del desierto del Sahara?',
         'options' => ['Asia', 'África', 'Australia'],
         'answer' => 'África'
      ],
      [
         'id' => 4,
         'question' => '¿En qué año llegó el hombre a la Luna?',
         'options' => ['1969', '1971', '1965'],
         'answer' => '1969'
      ],
      [
         'id' => 5,
         'question' => '¿Cuál es el río más largo del mundo?',
         'options' => ['Amazonas', 'Nilo', 'Misisipi'],
         'answer' => 'Amazonas'
      ],
      [
         'id' => 6,
         'question' => '¿Cuántos países conforman la Unión Europea?',
         'options' => ['27', '28', '25'],
         'answer' => '27'
      ],
      [
         'id' => 7,
         'question' => '¿Cuál es el animal terrestre más grande?',
         'options' => ['Elefante', 'Rinoceronte', 'Jirafa'],
         'answer' => 'Elefante'
      ],
      [
         'id' => 8,
         'question' => '¿En qué país se originó la pizza?',
         'options' => ['Italia', 'Francia', 'México'],
         'answer' => 'Italia'
      ],
      [
         'id' => 9,
         'question' => '¿Cuál es el símbolo químico del oro?',
         'options' => ['Au', 'Ag', 'O'],
         'answer' => 'Au'
      ],
      [
         'id' => 10,
         'question' => '¿Qué gas es necesario para la respiración humana?',
         'options' => ['Oxígeno', 'Nitrógeno', 'Dióxido de carbono'],
         'answer' => 'Oxígeno'
      ],
      [
         'id' => 11,
         'question' => '¿Quién pintó la Mona Lisa?',
         'options' => ["Leonardo da Vinci", 'Pablo Picasso', 'Vincent van Gogh'],
         'answer' => 'Leonardo da Vinci'
      ],
      [
         'id' => 12,
         'question' => '¿Cuánto es 5 x 6?',
         'options' => ['30', '25', '35'],
         'answer' => '30'
      ],
      [
         'id' => 13,
         'question' => '¿Qué instrumento se utiliza para medir la temperatura?',
         'options' => ['Termómetro', 'Barómetro', 'Higrómetro'],
         'answer' => 'Termómetro'
      ],
      [
         'id' => 14,
         'question' => '¿Cuál es la moneda oficial de Japón?',
         'options' => ['Yen', 'Won', 'Yuan'],
         'answer' => 'Yen'
      ],
      [
         'id' => 15,
         'question' => '¿En qué año terminó la Segunda Guerra Mundial?',
         'options' => ['1945', '1940', '1950'],
         'answer' => '1945'
      ],
      [
         'id' => 16,
         'question' => '¿Qué océano está al oeste de América?',
         'options' => ['Atlántico', 'Pacífico', 'Índico'],
         'answer' => 'Pacífico'
      ],
      [
         'id' => 17,
         'question' => '¿Qué instrumento musical tiene teclas blancas y negras?',
         'options' => ['Piano', 'Guitarra', 'Batería'],
         'answer' => 'Piano'
      ],
      [
         'id' => 18,
         'question' => '¿En qué ciudad se encuentra la Torre Eiffel?',
         'options' => ['Roma', 'Madrid', 'París'],
         'answer' => 'París'
      ],
      [
         'id' => 19,
         'question' => '¿Quién escribió "Don Quijote de la Mancha"?',
         'options' => ['Miguel de Cervantes', 'Federico García Lorca', 'Gabriel García Márquez'],
         'answer' => 'Miguel de Cervantes'
      ],
      [
         'id' => 20,
         'question' => '¿Qué día se celebra la independencia de los Estados Unidos?',
         'options' => ['4 de julio', '14 de julio', '15 de agosto'],
         'answer' => '4 de julio'
      ]
   ];
   
}
?>