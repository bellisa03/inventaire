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

        $itDates = TableRegistry::get('itDevices')->find('Dates');

        foreach ($itDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
            if($key != 'date_out'){
                $active[] = $id;

            }
        }
        foreach ($itDevices as $value) {
            foreach ($active as $v){
                if ($value->id == $v) {
                    $activeItDevices[] = $value;
                }
            }

        }
        if($activeItDevices){
            $data['activeItDevices'] = $activeItDevices;
        }

        $this->set(compact('activeItDevices', 'equipments', 'formattedDates'));
        $this->set('_serialize', ['activeItDevices']);
    }

    /*
     * Méthode indexComplet:
     * permet d'avoir une vue sur le matériel, même si celui-ci a une date de sortie, et ne fait donc plus partie de l'inventaire de façon active
     */

    public function indexComplet()
    {
        $itDevices = $this->paginate($this->ItDevices->find('all')->contain(['Equipments']));

        $itDates = TableRegistry::get('itDevices')->find('Dates');

        foreach ($itDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
        }

        $this->set(compact('itDevices', 'equipments', 'formattedDates'));
        $this->set('_serialize', ['itDevices']);
    }

    /*
     * Detail method:
     * Permet d'afficher les détails d'un type de matériel.
     * un equipment_id lui est passé en paramètre à partir d'un clic sur la quantité d'un type de matériel sur la page index
     *
     */

    public function detail($id = null)
    {
        $itDevices = $this->paginate($this->ItDevices->find('all')->contain(['Equipments']));
        foreach ($itDevices as $value) {
            if($value->id_equipments == $id) {
                $details[] = $value;
                }
        }
        if ($details) {
            $data['details'] = $details;

            $itDates = TableRegistry::get('itDevices')->find('Dates');

            foreach ($itDates as $i=>$dates) {
                foreach ($dates as $key => $value) {
                    $temp = new \DateTime($value);
                    $newTemp = $temp->format('d-m-Y');
                    $formattedDates[$key][$i] = $newTemp;
                }
            }
        }
        else {
            $this->Flash->error(__('Le type de matériel n\'a encore aucune unité de créée.'));
            return $this->redirect(['controller' => 'Equipments', 'action' => 'index']);
        }

        $this->set(compact('details', 'equipments', 'formattedDates'));
        $this->set('_serialize', ['details']);
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

        $e = TableRegistry::get('equipments')->find('Equipments');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $key=>$value) {
            if($key == $itDevice->id_equipments)
                $equipment = $value;
        }

        $itDates = TableRegistry::get('itDevices')->find('Dates');

        foreach ($itDates as $i=>$dates) {
            foreach ($dates as $key => $value) {
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$i] = $newTemp;
            }
        }

        $data['formattedDates'] = $formattedDates;
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
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         * On vérifie d'abord qu'il y a bien des équipements de définis.
         */
        $equipments = TableRegistry::get('equipments')->find('Equipments');
        if($equipments){
            /**
            * Permet d'afficher uniquement les éléments de la table Equipments qui sont du matériel IT
            * cf: TableRegistry + les 2 foreach
            */
            $itboolean = TableRegistry::get('equipments')->find('ItBoolean');
            if($itboolean){
                foreach ($equipments as $key => $value){
                    foreach($itboolean as $k => $v)
                    {
                        if($key == $k){
                            if ($v) $dropdown[$k] = $value;
                        }
                    }
                }
                $data['dropdown'] = $dropdown;
            }


            $itDevice = $this->ItDevices->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->data();

                if($data['date_in']){
                    $date_in = $data['date_in']['year']. '-' . $data['date_in']['month']. '-' . $data['date_in']['day'];
                }
                if($data['date_out']){
                    $date_out = $data['date_out']['year']. '-' . $data['date_out']['month']. '-' . $data['date_out']['day'];
                }
                if($data['date_depreciated']){
                    $date_depreciated = $data['date_depreciated']['year']. '-' . $data['date_depreciated']['month']. '-' . $data['date_depreciated']['day'];
                }
                $itDevice->date_in = $date_in;
                $itDevice->date_out = $date_out;
                $itDevice->date_depreciated = $date_depreciated;
                $itDevice->price = $data['price'];
                $itDevice->note = $data['note'];
                $itDevice->id_equipments = $data['id_equipments'];

                if ($this->ItDevices->save($itDevice)) {
                    $this->Flash->success(__('Le matériel IT a été sauvegardé. Veuillez créer une attribution pour ce matériel'));
                    return $this->redirect(['controller'=>'Attributions','action' => 'addUserAttribution', $itDevice->id]);
                } else {
                    $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
                }
            }
            $this->set(compact('itDevice', 'dropdown'));
            $this->set('_serialize', ['itDevice']);
        }else {
            $this->Flash->error(__('Veuillez créer un type de matériel, avant de pouvoir créer une unité de matériel IT.'));
            return $this->redirect(['controller'=>'equipments','action' => 'index']);
        }
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

            if($data['date_in']){
                $date_in = $data['date_in']['year']. '-' . $data['date_in']['month']. '-' . $data['date_in']['day'];
            }
            if($data['date_out']){
                $date_out = $data['date_out']['year']. '-' . $data['date_out']['month']. '-' . $data['date_out']['day'];
            }
            if($data['date_depreciated']){
                $date_depreciated = $data['date_depreciated']['year']. '-' . $data['date_depreciated']['month']. '-' . $data['date_depreciated']['day'];
            }
            $itDevice->date_in = $date_in;
            $itDevice->date_out = $date_out;
            $itDevice->date_depreciated = $date_depreciated;
            $itDevice->price = $data['price'];
            $itDevice->note = $data['note'];
            $itDevice->id_equipments = $data['id_equipments'];

            if ($this->ItDevices->save($itDevice)) {
                $this->Flash->success(__('Le matériel IT a été sauvegardé. Veuillez éventuellement adapter l\'attribution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le matériel IT n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
            }
        }

        $e = TableRegistry::get('equipments')->find('Equipments');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         * Puis 2 foreach pour n'afficher que le matériel IT
         */
        $i = TableRegistry::get('equipments')->find('ItBoolean');

        foreach ($e as $key=>$value) {
            foreach($i as $k => $v)
            {
                if($key == $k){
                    if ($v) $dropdown[$k] = $value;
                }
            }
        }
        $data['dropdown'] = $dropdown;

        $this->set(compact('itDevice', 'dropdown'));
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
