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

        $furnituresDates = TableRegistry::get('furnitures')->find('Dates');

        foreach ($furnituresDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
            if($key != 'date_out'){
                $active[] = $id;
            }
        }
        foreach ($furnitures as $value) {
            foreach ($active as $v){
                if ($value->id == $v) {
                    $activeFurnitures[] = $value;
                }
            }

        }
        if($activeFurnitures){
            $data['activeFurnitures'] = $activeFurnitures;
        }

        $this->set(compact('activeFurnitures', 'equipments', 'locations', 'formattedDates'));
        $this->set('_serialize', ['activeFurnitures']);
    }

    public function indexComplet()
    {
        $furnitures = $this->paginate($this->Furnitures->find('all')->contain(['Locations', 'Equipments']));

        $furnituresDates = TableRegistry::get('furnitures')->find('Dates');

        foreach ($furnituresDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
        }
        $this->set(compact('furnitures', 'equipments', 'locations', 'formattedDates'));
        $this->set('_serialize', ['furnitures']);
    }


    /*
     * Detail method:
     * Permet d'afficher les détails d'un type de matériel.
     * un equipment_id lui est passé en paramètre à partir d'un clic sur la quantité d'un type de matériel sur la page index
     *
     */

    public function detail($id = null)
    {
       $furnitures = $this->paginate($this->Furnitures->find('all')->contain(['Locations', 'Equipments']));
       foreach ($furnitures as $value) {
            if ($value->id_equipments == $id) {
                $details[] = $value;
            }
       }
       if ($details) {
           $data['details'] = $details;

           $furnituresDates = TableRegistry::get('furnitures')->find('Dates');

           foreach ($furnituresDates as $i=>$dates){
               foreach ($dates as $key=>$value){
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
       $this->set(compact('details', 'equipments', 'locations', 'formattedDates'));
       $this->set('_serialize', ['details']);
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

        $e = TableRegistry::get('equipments')->find('Equipments');
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         */
        foreach ($e as $key=>$value) {
            if($key == $furniture->id_equipments)
                $equipment = $value;
        }

        $furnituresDates = TableRegistry::get('furnitures')->find('Dates');
        /*
         * Formattage des dates:
         */
        foreach ($furnituresDates as $i=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$i] = $newTemp;
            }
        }

        $data['formattedDates'] = $formattedDates;
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
        /**
         * Tableau créé pour passer les types de matériels stockés dans la table "equipments" à la vue
         * On vérifie d'abord qu'il y a bien des équipements de définis.
         */
        $equipments = TableRegistry::get('equipments')->find('Equipments');
        if($equipments) {
            /*
             * Permet d'afficher uniquement les éléments de la table Equipments qui sont du mobilier
             * cf: TableRegistry + les 2 foreach
             */
            $itboolean = TableRegistry::get('equipments')->find('ItBoolean');
            foreach ($equipments as $key => $value) {
                foreach ($itboolean as $k => $v) {
                    if ($key == $k) {
                        if (!$v) $dropdown[$k] = $value;
                    }
                }
            }
            if ($dropdown) {
                $data['dropdown'] = $dropdown;
            }
            $locations = TableRegistry::get('locations')->find('Locations');

            $furniture = $this->Furnitures->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->data();
                if($data['date_in']){
                    $date_in = $data['date_in']['year']. '-' . $data['date_in']['month']. '-' . $data['date_in']['day'];
                }
                if($data['date_out']){
                    $date_out = $data['date_out']['year']. '-' . $data['date_out']['month']. '-' . $data['date_out']['day'];
                }
                $furniture->date_in = $date_in;
                $furniture->date_out = $date_out;
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
            $this->set(compact('furniture', 'dropdown', 'locations'));
            $this->set('_serialize', ['furniture']);
        }else {
            $this->Flash->error(__('Veuillez créer un type de matériel, avant de pouvoir créer un meuble.'));
            return $this->redirect(['controller'=>'equipments','action' => 'index']);
        }
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
            if($data['date_in']){
                $date_in = $data['date_in']['year']. '-' . $data['date_in']['month']. '-' . $data['date_in']['day'];
            }
            if($data['date_out']){
                $date_out = $data['date_out']['year']. '-' . $data['date_out']['month']. '-' . $data['date_out']['day'];
            }
            $furniture->date_in = $date_in;
            $furniture->date_out = $date_out;
            $furniture->price = $data['price'];
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

        $e = TableRegistry::get('equipments')->find('Equipments');
        /**
         * Tableau des equipements contenant l'info qui permet de savoir s'il s'agit d'un matériel IT ou d'un meuble
         * Boucle imbriquée foreach pour n'afficher que le mobilier dans la vue
         */
        $i = TableRegistry::get('equipments')->find('ItBoolean');

        foreach ($e as $key=>$value) {
            foreach($i as $k => $v)
            {
                if($key == $k){
                    if (!$v) $dropdown[$k] = $value;
                }
            }
        }
        if($dropdown){
            $data['dropdown'] = $dropdown;
        }
        $l = TableRegistry::get('locations')->find('all');
        /**
         * Tableau créé pour passer les locaux de la table "locations" à la vue
         */
        foreach ($l as $value) {
            $locations[$value->id] = $value->title;
        }

        $this->set(compact('furniture', 'dropdown', 'locations'));
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
