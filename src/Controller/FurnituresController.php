<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $furnitures = $this->paginate($this->Furnitures->find('all')->contain(['Locations', 'Equipments']));

        $this->set(compact('furnitures', 'equipments', 'locations'));
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

        $l = TableRegistry::get('locations')->find('all');
        /**
         * Tableau créé pour passer les locaux de la table "locations" à la vue
         */
        foreach ($l as $value) {
            if($value->id == $furniture->id_locations)
            $location = $value->title;
        }

        $e = TableRegistry::get('equipments')->find('all');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $value) {
            if($value->id == $furniture->id_equipments)
                $equipment = $value->title;
        }

        $data['furniture'] = $furniture;
        $data['location'] = $location;
        $data['equipment'] = $equipment;

        $this->set($data);
        $this->set('_serialize', ['furniture']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipments = TableRegistry::get('equipments')->find('Equipments');
        $locations = TableRegistry::get('locations')->find('Locations');

        $furniture = $this->Furnitures->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $furniture->date_in = $data['date_in'];
            $furniture->date_out = $data['date_out'];
            $furniture->price = $furniture['price'];
            $furniture->state = $data['state'];
            $furniture->note = $data['note'];
            $furniture->id_equipments = $data['id_equipments'];
            $furniture->id_locations = $data['id_locations'];

            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('Le meuble a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le meuble n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('furniture', 'equipments', 'locations'));
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
            $data = $this->request->data();
            $furniture->date_in = $data['date_in'];
            $furniture->date_out = $data['date_out'];
            $furniture->price = $furniture['price'];
            $furniture->state = $data['state'];
            $furniture->note = $data['note'];
            $furniture->id_equipments = $data['id_equipments'];
            $furniture->id_locations = $data['id_locations'];

            if ($this->Furnitures->save($furniture)) {
                $this->Flash->success(__('Le meuble a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le meuble n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }

        $e = TableRegistry::get('equipments')->find('all');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $value) {
            $equipments[$value->id] = $value->title;
        }

        $l = TableRegistry::get('locations')->find('all');
        /**
         * Tableau créé pour passer les locaux de la table "locations" à la vue
         */
        foreach ($l as $value) {
            $locations[$value->id] = $value->title;
        }

        $this->set(compact('furniture', 'equipments', 'locations'));
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
