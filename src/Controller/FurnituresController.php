<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Furnitures Controller
 *
 * @property \App\Model\Table\FurnituresTable $Furnitures
 */
class FurnituresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $furnitures = $this->paginate($this->Furnitures);

        $this->set(compact('furnitures'));
        $this->set('_serialize', ['furnitures']);
    }

    /**
     * View method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $furniture = $this->Furnitures->get($id, [
            'contain' => []
        ]);

        $this->set('furniture', $furniture);
        $this->set('_serialize', ['furniture']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $furniture = $this->Furnitures->newEntity();
        if ($this->request->is('post')) {
            $furniture = $this->Furnitures->patchEntity($furniture, $this->request->data);
            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('Le meuble a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le meuble n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('furniture'));
        $this->set('_serialize', ['furniture']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $furniture = $this->Furnitures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $furniture = $this->Furnitures->patchEntity($furniture, $this->request->data);
            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('Le meuble a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le meuble n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('furniture'));
        $this->set('_serialize', ['furniture']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Furniture id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $furniture = $this->Furnitures->get($id);
        if ($this->Furnitures->delete($furniture)) {
            $this->Flash->success(__('Le meuble a été supprimé.'));
        } else {
            $this->Flash->error(__('Le meuble n\'a pu être supprimé. Veuillez essayer à nouveau.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
