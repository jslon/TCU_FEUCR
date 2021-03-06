<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Savings Controller
 *
 * @property \App\Model\Table\SavingsTable $Savings
 */
class SavingsController extends AppController
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
            'contain' => ['Associations']
        ];
        $savings = $this->paginate($this->Savings);

        $this->set(compact('savings'));
        $this->set('_serialize', ['savings']);
    }

    /**
     * View method
     *
     * @param string|null $id Saving id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $saving = $this->Savings->get($id, [
            'contain' => ['Associations']
        ]);

        $this->set('saving', $saving);
        $this->set('_serialize', ['saving']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin_views');

        $saving = $this->Savings->newEntity();
        if ($this->request->is('post')) {
            $saving = $this->Savings->patchEntity($saving, $this->request->data);
            if ($this->Savings->save($saving)) {
                $this->Flash->success(__('The saving has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The saving could not be saved. Please, try again.'));
            }
        }
        $associations = $this->Savings->Associations->find('list', ['limit' => 200]);
        $this->set(compact('saving', 'associations'));
        $this->set('_serialize', ['saving']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Saving id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $saving = $this->Savings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saving = $this->Savings->patchEntity($saving, $this->request->data);
            if ($this->Savings->save($saving)) {
                $this->Flash->success(__('The saving has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The saving could not be saved. Please, try again.'));
            }
        }
        $associations = $this->Savings->Associations->find('list', ['limit' => 200]);
        $this->set(compact('saving', 'associations'));
        $this->set('_serialize', ['saving']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Saving id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('admin_views');
        $this->request->allowMethod(['post', 'delete']);
        $saving = $this->Savings->get($id);
        if ($this->Savings->delete($saving)) {
            $this->Flash->success(__('The saving has been deleted.'));
        } else {
            $this->Flash->error(__('The saving could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
