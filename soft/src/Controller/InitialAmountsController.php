<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InitialAmounts Controller
 *
 * @property \App\Model\Table\InitialAmountsTable $InitialAmounts
 */
class InitialAmountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin_views');
        $this->paginate = [
            'contain' => ['Associations', 'Tracts']
        ];
        $initialAmounts = $this->paginate($this->InitialAmounts);

        $this->set(compact('initialAmounts'));
        $this->set('_serialize', ['initialAmounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Initial Amount id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $initialAmount = $this->InitialAmounts->get($id, [
            'contain' => ['Associations', 'Tracts']
        ]);

        $this->set('initialAmount', $initialAmount);
        $this->set('_serialize', ['initialAmount']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    /**
    public function add()
    {
        $this->viewBuilder()->layout('admin_views');
        $initialAmount = $this->InitialAmounts->newEntity();
        if ($this->request->is('post')) {
            $initialAmount = $this->InitialAmounts->patchEntity($initialAmount, $this->request->data);
            if ($this->InitialAmounts->save($initialAmount)) {
                $this->Flash->success(__('The initial amount has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The initial amount could not be saved. Please, try again.'));
            }
        }
        $associations = $this->InitialAmounts->Associations->find('list', ['limit' => 200]);
        $tracts = $this->InitialAmounts->Tracts->find('list', ['limit' => 200]);
        $this->set(compact('initialAmount', 'associations', 'tracts'));
        $this->set('_serialize', ['initialAmount']);
    }
**/
    /**
     * Edit method
     *
     * @param string|null $id Initial Amount id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $initialAmount = $this->InitialAmounts->get($id, [
            'contain' => []
        ]);



        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $initialAmount = $this->InitialAmounts->patchEntity($initialAmount, $this->request->data);
            if ($this->InitialAmounts->save($initialAmount)) {
                $this->Flash->success(__('The initial amount has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The initial amount could not be saved. Please, try again.'));
            }

        }

        $first = "";
        $second = "";
        $types = array(1 => 'Ingresos Generados', 0 => 'Tracto');

        if(!$initialAmount->type) //Cambiamos el contenido para hacer la interfaz más amena
        {
            $types = array(0 => 'Tracto', 1 => 'Ingresos Generados');
        }


        $initialAmount->type = $types;
        $associations = $this->InitialAmounts->Associations->find('list', ['limit' => 200]);
        $tracts = $this->InitialAmounts->Tracts->find('list', ['limit' => 200]);
        /**
                                                    ->hydrate(false)
                                                    ->select(['date'])
                                                    ->where(['YEAR(date)'=> date('Y')])
                                                    ->orWhere(['YEAR(date)'=>(date('Y') + 1)]);**/

        $this->set(compact('initialAmount', 'associations', 'tracts'));
        $this->set('_serialize', ['initialAmount']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Initial Amount id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $this->request->allowMethod(['post', 'delete']);
        $initialAmount = $this->InitialAmounts->get($id);
        if ($this->InitialAmounts->delete($initialAmount)) {
            $this->Flash->success(__('The initial amount has been deleted.'));
        } else {
            $this->Flash->error(__('The initial amount could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function add($association_name = null)
    {
        $this->viewBuilder()->layout('admin_views'); //Carga un layout personalizado para esta vista


        $headquarters = $this->getHeadquarters(); //Pide todas las sedes
        $tracts[0] = $this->getTracts(date('Y')-1);
        $tracts[1] = $this->getTracts(date('Y'));

        $amounts_type = array('Tracto'=> 0, 'Ingresos Generados' => 1);

        if($this->request->is("POST"))
        {
            if($association_name)
            {
                /**
                 * 1- Cargar los montos de las cajas del tracto del primer select al tracto del segundo select, esto tanto
                 * para tracto como para ingresos generados. Este monto se carga no solo al monto inicial de la asocia, si no
                 * tambien en las cajas de dicha asocia en los campos correspondientes, es decir los montos de caja chica van
                 * para los montos de la caja chica del siguiente tracto, lo mismo con las cajas fuertes.
                 *
                 * 2- Crear las cajas. Para poder mover los montos, se deben primero crear las cajas, esto tanto para Ingresos Generados
                 * como para Tracto.
                 */




                if($this->request->data['first_tract'] != $this->request->data['second_tract'])
                {
                    $association_id = $this->getAssociationId($association_name);
                    $first_tract_id = $this->getTractId($this->request->data['first_tract']);
                    $second_tract_id = $this->getTractId($this->request->data['second_tract']);

                    $oldBoxTract = $this->getBox($association_id, $first_tract_id, 0); //Queremos la caja vieja del tracto
                    $oldBoxGenerated = $this->getBox($association_id, $first_tract_id, 1); //Queremos la caja vieja de ingresos generados

                    $message = $this->transferBox($oldBoxTract, $association_id, $second_tract_id, 0); //Creamos Tractos

                    $message .= "<br>".$this->transferBox($oldBoxGenerated,$association_id, $second_tract_id, 1); //Creamos ingresos  generados

                    $message .= "<br>".$this->createInitialAmount($this->request->data, $oldBoxTract, $association_id, $second_tract_id, 0); //Creamos los montos iniciales de tracto
                    $message .= "<br>".$this->createInitialAmount($this->request->data, $oldBoxGenerated, $association_id, $second_tract_id, 1); //Creamos los montos iniciales de Ingresos Generados

                    die($message);

                }
                else
                {
                    die('Las fechas deben ser distintas');
                }

            }
        }
        else
        {

        }

        $this->set('head',$headquarters);
        $this->set('data', $tracts);
        $this->set('type', $amounts_type);

    }

    private function createInitialAmount($data, $oldBox, $association_id, $tract_id, $type)
    {
        $type_name = ($type == 0 ? "Tracto":"Ingresos Generados");


        $array['amount'] = ($oldBox[0]['little_amount'] + $oldBox[0]['big_amount']);
        $array['type'] = $type;
        $array['date'] = $data['date'];
        $array['association_id'] = $association_id;
        $array['tract_id'] = $tract_id;

        $message = "";

        try
        {
            $initial = $this->InitialAmounts->newEntity($array);

            if($this->InitialAmounts->save($initial))
            {
                $message = "Se guardó el monto inicial correspondiente a ".$type_name." con éxito";
            }

        }
        catch(Exception $e)
        {
            $message = "No se pudo guardar el monto inicial correspondiente a ".$type_name. " esto debido a un error interno";
        }



        return $message;
    }

    private function transferBox($oldBox,$association_id, $second_tract_id, $type)
    {



        $type_name = ($type == 0 ? "Tracto":"Ingresos Generados");
        $message = "Se creó la caja para ".$type_name;

        try
        {
            $this->loadModel('Boxes');

            $box = $this->Boxes->query();
            $box->update()
                ->set(['little_amount'=>$oldBox[0]['little_amount'], 'big_amount'=>$oldBox[0]['big_amount']])
                ->andwhere(['association_id'=>$association_id, 'tract_id'=>$second_tract_id, 'type'=>$type])
                ->execute();

        }
        catch(Exception $e)
        {
            $message = 'No se pudo crear la caja '.$type_name .' ya que se dio un error inesperado.';
        }





        return $message;
    }

    private function getBox($association_id, $tract_id, $type)
    {
        $this->loadModel('Boxes');

        $box = $this->Boxes->find()
            ->hydrate(false)
            ->andwhere(['association_id'=>$association_id, 'tract_id'=>$tract_id, 'type'=>$type]);

        $box = $box->toArray();

        return $box;
    }



    private function getAssociationId($association_name)
    {
        $association_id = $this->InitialAmounts->Associations->find() //Se busca primero el id de esa sede por medio del nombre
        ->hydrate(false)
            ->select(['id'])
            ->where(['name'=>$association_name]);

        $association_id = $association_id->toArray();

        return $association_id[0]['id'];
    }

    private function getTracts($year)
    {
        $this->loadModel('Tracts');

        $tracts = $this->Tracts->find()
            ->hydrate(false)
            ->where(['YEAR(date)'=>$year]); //Queremos los tractos del año actual
        $tracts = $tracts->toArray();

        return $tracts;
    }

    private function getHeadquarters()
    {
        $query = $this->InitialAmounts->Associations->Headquarters->find() //Se trae solo las sedes que tienen alguna asocicación asociada :p
        ->hydrate(false)
            ->select(['Headquarters.name'])
            ->join([
                'table'=>'associations',
                'alias'=>'a',
                'type' => 'RIGHT',
                'conditions'=>'Headquarters.id = a.headquarter_id',
            ])
            ->where(['a.enable'=>1])
            ->group(['Headquarters.name']); //Elimina repetidos


        $headquarters = $query->toArray();

        return $headquarters;
    }





    /**
     *  Esta funcion devuelve el id del presente tracto
     **/
    private function getTractId($actualDate)
    {
        $this->loadModel('Tracts');

        //$actualDate = date("Y-m-d");

        $id = $this->Tracts->find()
            ->hydrate(false)
            ->select(['id'])
            ->where(function ($exp) use($actualDate) {
                return $exp
                    ->lte('date',$actualDate)
                    ->gte('deadline',$actualDate);
            });

        $id = $id->toArray();

        return $id[0]['id'];
    }


}
