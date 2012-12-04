<?php
// module/Blog/src/Blog/Form/BlogForm.php:
namespace Blog\Form;

use Zend\Form\Form;

class BlogForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('blog');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));

        $this->add(array(
            'name' => 'body',
            'attributes' => array(
                'type'  => 'textarea',
                'class' => 'textarea',
                'style' => "width: 810px; height: 200px",
            ),
            'options' => array(
                'label' => 'Body',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
