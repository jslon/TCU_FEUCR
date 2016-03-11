<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AssociationsController extends AppController
{



	public function index()
	{
		$this->viewBuilder()->layout('admin_views'); //Carga un layout personalizado para esta vista

	}
	
	public function showAssociations($id = null)
	{
		$this->viewBuilder()->layout('admin_views');

		$query = $this->Associations->find()
				->select(['name','id']);
		$query->hydrate(false); //Quita elementos innecesarios de la consulta

		$data = $query->toArray();	

		$this->set('data',$data);
		
	}

	public function add()
	{
		$this->viewBuilder()->layout('admin_views'); //Carga un layout personalizado para esta vista

		$association = $this->Associations->newEntity($this->request->data); //El parámetro es para validar los datos


		if($this->request->is('post'))
		{

			if($this->Associations->save($association)) //Guarda los datos
			{
				$this->Flash->success(__('La Asociación ha sido guardada exitosamente'));
                return $this->redirect(['action' => 'add']); //Redirecciona a la vista del index cuando guarda los datos. 
			}

			$this->Flash->error(__('No es posible guardar la asociación en este momento'));
		}

		$this->set('association',$association); // set() Pasa la variable association a la vista.
	}

	public function modify()
	{
		$this->viewBuilder()->layout('admin_views'); //Carga un layout personalizado para esta vista



		if($this->request->is('ajax'))
		{
			$query = $this->Associations->find('all', 
				['conditions' => ['Associations.name LIKE'=> '%'.$this->request->data['name'].'%']
				]);

			$data = $query->toArray();





			die($data);
		}


	}

	
}
