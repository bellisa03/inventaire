<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Spacebellisa\Date as d;

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
        $itDevices = $this->paginate($this->ItDevices->find('all')->contain(['Equipments']));

        $this->set(compact('itDevices', 'equipments'));
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

        $e = TableRegistry::get('equipments')->find('all');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $value) {
            if($value->id == $itDevice->id_equipments)
                $equipment = $value->title;
        }

        $data['itDevice'] = $itDevice;
        $data['equipment'] = $equipment;

        $this->set($data);
        $this->set('_serialize', ['itDevice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipments = TableRegistry::get('equipments')->find('Equipments');
        //$equipments = TableRegistry::get('equipments')->find('Equipments', ['conditions' => ['Equipments.itdevice'=> true]]);
        $itDevice = $this->ItDevices->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data();

            $itDevice->date_in = $data['date_in'];
            $itDevice->date_out = $data['date_out'];
            $itDevice->date_depreciated = $data['date_depreciated'];
            $itDevice->price = $data['price'];
            $itDevice->note = $data['note'];

            if ($this->ItDevices->save($itDevice)) {
                $this->Flash->success(__('Le matériel IT a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('itDevice', 'equipments'));
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
            $data = $this->request->data();
            $itDevice->date_in = $data['date_in'];
            $itDevice->date_out = $data['date_out'];
            $itDevice->date_depreciated = $data['date_depreciated'];
            $itDevice->price = $data['price'];
            $itDevice->note = $data['note'];
            $itDevice->id_equipments = $data['id_equipments'];

            if ($this->ItDevices->save($itDevice)) {
                $this->Flash->success(__('Le matériel IT a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }

        $e = TableRegistry::get('equipments')->find('all');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $value) {
            $equipments[$value->id] = $value->title;
        }

        $this->set(compact('itDevice', 'equipments'));
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
