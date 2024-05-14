<?php

require 'classes/answer.php';

Class Question {
	private string $title;
    private array $answers;
    private array $rightAnswers;
    private array $selectedAnswers = [];

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

    public function getAnswers(): array {
        return $this->answers;
    }

    public function addAnswer(Answer $answer, bool $isCorrect = false): self {
        $this->answers[] = $answer;
        if($isCorrect) {
            $this->setRightAnswers($answer);
        }
        return $this;
    }

    public function getRightAnswers(): array {
        return $this->rightAnswers;
    }

    public function setRightAnswers(Answer $rightAnswers): self {
        $this->rightAnswers[] = $rightAnswers;
        return $this;
    }

    public function getSelectedAnswers(): array {
        return $this->selectedAnswers;
    }

    public function setSelectedAnswers(Answer $selectedAnswers): self {
        $this->selectedAnswers[] = $selectedAnswers;
        return $this;
    }
}