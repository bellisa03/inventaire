<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItDevices Controller
 *
 * @property \App\Model\Table\ItDevicesTable $ItDevices
 */
class ItDevicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $itDevices = $this->paginate($this->ItDevices);

        $this->set(compact('itDevices'));
        $this->set('_serialize', ['itDevices']);
    }

    /**
     * View method
     *
     * @param string|null $id It Device id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itDevice = $this->ItDevices->get($id, [
            'contain' => []
        ]);

        $this->set('itDevice', $itDevice);
        $this->set('_serialize', ['itDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itDevice = $this->ItDevices->newEntity();
        if ($this->request->is('post')) {
            $itDevice = $this->ItDevices->patchEntity($itDevice, $this->request->data);
            if ($this->ItDevices->save($itDevice)) {
                $this->Flash->success(__('Le matériel IT a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('itDevice'));
        $this->set('_serialize', ['itDevice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id It Device id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itDevice = $this->ItDevices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itDevice = $this->ItDevices->patchEntity($itDevice, $this->request->data);
            if ($this->ItDevices->save($itDevice)) {
                $this->Flash->success(__('Le matériel IT a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('itDevice'));
        $this->set('_serialize', ['itDevice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id It Device id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itDevice = $this->ItDevices->get($id);
        if ($this->ItDevices->delete($itDevice)) {
            $this->Flash->success(__('Le matériel IT a été supprimé.'));
        } else {
            $this->Flash->error(__('Le matériel IT n\'a pu être supprimé. Veuillez essayer à nouveau.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
