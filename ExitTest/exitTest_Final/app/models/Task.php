<?php

class Task {
    private $id;
    private $title;
    private $description;
    private $completedBy;
    private $completedOn;
    private $status;

    public function __construct($title, $description, $completedBy, $completedOn, $status) {
        $this->title = $title;
        $this->description = $description;
        $this->completedBy = $completedBy;
        $this->completedOn = $completedOn;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCompletedBy()
    {
        return $this->completedBy;
    }
    public function getCompletedOn()
    {
        return $this->completedOn;
    }
    public function getStatus()
    {
        return $this->status;
    }
    
}
?>
