<?php

require 'classes/mcq.php';

$mcq = new MCQ("La programmation orientée objet");

$question1 = new Question("Qu'est-ce qu'une classe ?");
$answer1A = new Answer("a) Un type de données permettant de regrouper des variables et des méthodes.");
$answer1B = new Answer("b) Une fonction spéciale pour initialiser les objets.");
$answer1C = new Answer("c) Un opérateur utilisé pour hériter d'une classe parente.");

$question1->addAnswer($answer1A, true);
$question1->addAnswer($answer1B, false);
$question1->addAnswer($answer1C, false);

$mcq->addQuestion($question1);

$question2 = new Question("Qu'est-ce que l'héritage ?");
$answer2A = new Answer("a) Une technique permettant de cacher les méthodes d'une classe.");
$answer2B = new Answer("b) Le processus par lequel une classe peut hériter des propriétés et des comportements d'une autre classe.");
$answer2C = new Answer("c) Une méthode pour encapsuler des objets.");

$question2->addAnswer($answer2A, false);
$question2->addAnswer($answer2B, true);
$question2->addAnswer($answer2C, false);

$mcq->addQuestion($question2);

$question3 = new Question("Quelle est la différence entre une classe et un objet ?");
$answer3A = new Answer("a) Une classe est une instance spécifique d'un objet.");
$answer3B = new Answer("b) Un objet est une représentation d'une classe.");
$answer3C = new Answer("c) Une classe définit un type, tandis qu'un objet est une instance particulière de ce type.");

$question3->addAnswer($answer3A, false);
$question3->addAnswer($answer3B, false);
$question3->addAnswer($answer3C, true);

$mcq->addQuestion($question3);

$question4 = new Question("Quelles sont les caractéristiques de l'encapsulation en programmation orientée objet ?");
$answer4A = new Answer("a) L'encapsulation permet de regrouper les données et les méthodes qui agissent sur ces données au sein d'une même entité.");
$answer4B = new Answer("b) L'encapsulation facilite la réutilisation du code en permettant l'héritage.");
$answer4C = new Answer("c) L'encapsulation assure la sécurité des données en limitant l'accès direct aux variables internes d'un objet.");
$answer4D = new Answer("d) L'encapsulation simplifie la syntaxe des programmes en introduisant de nouveaux types de données.");

$question4->addAnswer($answer4A, true);
$question4->addAnswer($answer4B, false);
$question4->addAnswer($answer4C, true);
$question4->addAnswer($answer4D, false);

$mcq->addQuestion($question4);


$mcq->check();
$mcq->render();