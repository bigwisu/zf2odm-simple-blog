<?php

namespace Blog\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="blogpost") */
class BlogPost
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") */
    private $title;
    
    /** @ODM\Field(type="string") */
    private $body;
    
    public function __get($property) {
        return $this->$property;
    }
    
    /**
     * @return the $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return the $title
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * @return the $body
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param field_type $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param field_type $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
    
    /**
     * @param field_type $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

}