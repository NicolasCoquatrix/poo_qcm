<?php

require 'classes/question.php';

Class MCQ {
	private string $title;
    private array $questions;
	private int $grade = 0;

	public function __construct(string $title){
		$this->setTitle($title);
	}
	
	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): self {
		$this->title = $title;
        return $this;
	}

    public function getQuestions(): array {
        return $this->questions;
    }

    public function addQuestion(Question $question): self {
        $this->questions[] = $question;
        return $this;
    }

	public function getGrade(): int {
		return $this->grade;
	}

	public function setGrade(int $grade): self {
		$this->grade = $grade;
		return $this;
	}

	public function incrementGrade(): self {
		$this->grade++;
		return $this;
	}

    public function render(){
		if(empty($_POST)){
			require 'templates/mcq.html.php';
		} else {
			require 'templates/result.html.php';
		}
	}

	public function check(){
		if(!empty($_POST)){
			// var_dump($_POST);
			foreach ($_POST as $indexQuestion => $Answers){
				$question = $this->getQuestions()[$indexQuestion];
				foreach ($Answers as $indexAnswer){
					$question->setSelectedAnswers($question->getAnswers()[$indexAnswer]);
				}
				
				if($question->getSelectedAnswers() === $question->getRightAnswers()){
					$this->incrementGrade();
				}
			}
		}
	}
}