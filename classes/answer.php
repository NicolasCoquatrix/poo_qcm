<?php

Class Answer {
	private string $title;

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
}