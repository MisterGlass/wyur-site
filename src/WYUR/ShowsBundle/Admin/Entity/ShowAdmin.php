<?php
namespace WYUR\ShowsBundle\Admin\Entity;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ShowAdmin extends Admin
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $security_context;

    public function setSecurityContext($security_context)
    {
        $this->security_context = $security_context;
    }


    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('slug')
            ->add('hosts')
            ->add('image')
            ->add('soundCloudID')
            ->add('slot')
            ->add('site')
            ->add('podcast')
            ->add('twitter')
            ->add('facebook')
            ->add('description')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('hosts')
            ->add('description', null, array(), array('help' => 'This is the main show description block. <a href="http://www.bbcode.org/reference.php">BBCode</a> can be used to add rich content.'))
            ->add('soundCloudID', null, array(), array('name' => 'SoundCloud Username', 'help' => 'This is the username for the shows soundcloud account'))
        ;

        /** @var $user \Application\Sonata\UserBundle\Entity\User */
        $user = $this->security_context->getToken()->getUser();
        if ($user->hasRole('ROLE_WYUR_SHOW_ADMIN_CREATE')) {
			$formMapper->add('slot');
		}
		
		$formMapper
            ->add('site')
            ->add('podcast')
            ->add('twitter')
            ->add('facebook')
			->add('imageFile', 'file', array('required' => false, 'help' => 'Images must be png, jpg, or gif & less than 1MB.<br />Images are forced to be square, 105px on the grid page and 260px on the show page.'))
		;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('hosts')
            ->add('slot')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('hosts')
        ;
    }
}