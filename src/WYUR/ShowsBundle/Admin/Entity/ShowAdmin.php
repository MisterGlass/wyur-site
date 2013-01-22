<?php
namespace WYUR\ShowsBundle\Admin\Entity;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ShowAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('slug')
            ->add('hosts')
            ->add('image')
            ->add('description')
            ->add('soundCloudID')
            ->add('slot')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('hosts')
            ->add('description', null, array(), array('help' => 'This is the main show description block. <a href="http://www.bbcode.org/reference.php">BBCode</a> can be used to add rich content.'))
            ->add('soundCloudID', null, array(), array('name' => 'SoundCloud ID', 'help' => 'This is the ID number for the shows soundcloud account'))
            ->add('slot')
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