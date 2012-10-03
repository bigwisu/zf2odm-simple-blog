<?php
// module/Blog/src/Blog/Controller/BlogController.php:
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Document\BlogPost;
use Blog\Form\BlogForm;

class BlogController extends AbstractActionController
{
    public function indexAction()
    {
        $dm = $this->getServiceLocator()->get('doctrine.documentmanager.odm_default');  
        $posts = $dm->createQueryBuilder('Blog\Document\BlogPost')
                ->limit(20)
                ->getQuery();
        
        $posts->execute();
        
        return new ViewModel(array(
            'posts' => $posts,
        ));
    }

    public function addAction()
    {
        $form = new BlogForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $data = $request->getPost();
            
            $dm = $this->getServiceLocator()->get('doctrine.documentmanager.odm_default');  
            $post = new BlogPost();
            $post->setTitle($data['title']);
            $post->setBody($data['body']);
            $dm->persist($post);
            $dm->flush();
            
            return $this->redirect()->toRoute('blog');
        }
        return array('form' => $form);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}