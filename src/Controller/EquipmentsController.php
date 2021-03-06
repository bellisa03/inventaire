<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equipments Controller
 *
 * @property \App\Model\Table\EquipmentsTable $Equipments
 */
class EquipmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $equipments = $this->paginate($this->Equipments);

        $this->set(compact('equipments'));
        $this->set('_serialize', ['equipments']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipment = $this->Equipments->get($id, [
            'contain' => []
        ]);

        $this->set('equipment', $equipment);
        $this->set('_serialize', ['equipment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipment = $this->Equipments->newEntity();
        if ($this->request->is('post')) {
            $equipment = $this->Equipments->patchEntity($equipment, $this->request->data);
            if ($this->Equipments->save($equipment)) {
                $this->Flash->success(__('Type de matériel sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le type de matériel n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('equipment'));
        $this->set('_serialize', ['equipment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipment = $this->Equipments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipment = $this->Equipments->patchEntity($equipment, $this->request->data);
            if ($this->Equipments->save($equipment)) {
                $this->Flash->success(__('Type de matériel sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le type de matériel n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('equipment'));
        $this->set('_serialize', ['equipment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipment = $this->Equipments->get($id, [
            'contain' => []
        ]);
        if ($equipment->quantity != 0) {
            $this->Flash->error(__('Le type de matériel est encore référencé et n\'a pu être supprimé.'));
            return $this->redirect(['action' => 'index']);
        }
        else {
            if ($this->Equipments->delete($equipment)) {
                $this->Flash->success(__('Type de matériel supprimé.'));
            } else {
                $this->Flash->error(__('Le type de matériel n\'a pu être supprimé. Veuillez essayer à nouveau.'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }
}
