<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Schema\Table;
use Cake\ORM\TableRegistry;

/**
 * Attributions Controller
 *
 * @property \App\Model\Table\AttributionsTable $Attributions
 */
class AttributionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $attributions = $this->paginate($this->Attributions->find('all')->contain('Users'));

        /*
         * L'utilisation des 2 variables suivantes va permettre de pouvoir afficher le title de la table equipments en regard des id de la table itDevices
         */

        $equipments = TableRegistry::get('equipments')->find('Equipments');
        $itdevices = TableRegistry::get('itDevices')->find('ItDevices');

        foreach($itdevices as $key => $value){
            foreach($equipments as $k => $v)
            {
                if($value == $k){
                    $itTitle[$key] = $v;
                }
            }
        }
        /*
         * Formattage des dates de la table attribution
         */
        $attributionDates = TableRegistry::get('attributions')->find('Dates');

        foreach ($attributionDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
                if($key != 'date_end'){
                    $active[] = $id;
                }
        }
        /*
         * Boucle imbriquée Foreach qui permet de cibler uniquement les attributions encore en cours
         */
        foreach ($attributions as $value) {
            foreach ($active as $v){
                if ($value->id == $v) {
                    $activeAttributions[] = $value;
                }
            }

        }
        if($activeAttributions){
            $data['activeAttributions'] = $activeAttributions;
        }
        /*
         * L'utilisation de la variable suivante + la variable equipments définie ci-dessus, va permettre de pouvoir afficher la date d'amortissement en regard des id de la table itDevices
         */
        $date = TableRegistry::get('itDevices')->find('DateDepreciated');
        foreach($date as $key => $value){
            $temp = new \DateTime($value);
            $newTemp = $temp->format('d-m-Y');
            $depreciation[$key] = $newTemp;
        }
        $this->set(compact('activeAttributions','itTitle','depreciation', 'formattedDates'));
        $this->set('_serialize', ['attributions']);
    }

    /*
     * La fonction indexComplet renvoie un tableau contenant toutes les attributions (active et inactive)
     */

    public function indexComplet()
    {
        $attributions = $this->paginate($this->Attributions->find('all')->contain('Users'));

        /*
         * L'utilisation des 2 variables suivantes va permettre de pouvoir afficher le title de la table equipments en regard des id de la table itDevices
         */

        $equipments = TableRegistry::get('equipments')->find('Equipments');
        $itdevice = TableRegistry::get('itDevices')->find('ItDevices');

        foreach($itdevice as $key => $value){
            foreach($equipments as $k => $v)
            {
                if($value == $k){
                    $itTitle[$key] = $v;
                }
            }
        }
        /*
         * Formattage des dates de la table attribution
         */
        $attributionDates = TableRegistry::get('attributions')->find('Dates');

        foreach ($attributionDates as $id=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$id] = $newTemp;
            }
        }

        /*
         * L'utilisation de la variable suivante + la variable equipments définie ci-dessus, va permettre de pouvoir afficher la date d'amortissement en regard des id de la table itDevices
         */
        $date = TableRegistry::get('itDevices')->find('DateDepreciated');
        foreach($date as $key => $value){
            $temp = new \DateTime($value);
            $newTemp = $temp->format('d-m-Y');
            $depreciation[$key] = $newTemp;
        }
        $this->set(compact('attributions','itTitle','depreciation', 'formattedDates'));
        $this->set('_serialize', ['attributions']);
    }

    /*
         * Detail method:
         * Permet d'afficher les détails d'un type de matériel.
         * un equipment_id lui est passé en paramètre à partir d'un clic sur la quantité d'un type de matériel sur la page index
         *
         */

    public function detail($id = null)
    {
        $attributions = $this->paginate($this->Attributions->find('all')->contain(['ItDevices', 'Users']));
        foreach ($attributions as $value) {
            if($value->id_users == $id) {
                $details[] = $value;

            }
        }
        if ($details) {
            $data['details'] = $details;

            /*
            * Les foreach imbriqués suivants vont permettre de pouvoir afficher le title de la table equipments avec l'id de la table itDevices
            */
            $e = TableRegistry::get('equipments')->find('Equipments');
            foreach($details as $value){
                foreach($e as $k => $v){
                    if($value->it_device->id_equipments == $k){
                        $itTitle[$value->it_device->id] = $v;
                    }
                }
            }
            /*
            * Formattage des dates de la table attribution
            */
            $attributionDates = TableRegistry::get('attributions')->find('Dates');

            foreach ($attributionDates as $i=>$dates){
                foreach ($dates as $key=>$value){
                    $temp = new \DateTime($value);
                    $newTemp = $temp->format('d-m-Y');
                    $formattedDates[$key][$i] = $newTemp;
                }
            }
            /*
             * L'utilisation de la variable suivante + la variable details (qui contient les attributions de l'utilisateur)
             *  va permettre de pouvoir afficher la date d'amortissement grâce à l'id de la table itDevices
             */
            $date = TableRegistry::get('itDevices')->find('DateDepreciated');
            foreach($date as $key => $value){
                foreach($details as $k){
                    if($key == $k->id_itdevices){
                        $temp = new \DateTime($value);
                        $newTemp = $temp->format('d-m-Y');
                        $depreciation[$key] = $newTemp;
                    }
                }
            }

            $data['itTitle'] = $itTitle;
            $data['depreciation'] = $depreciation;
            $data['formattedDates'] = $formattedDates;
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a encore aucune attribution de matériel.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }

        $this->set($data);
        $this->set('_serialize', ['details']);
    }
    /**
     * View method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attribution = $this->Attributions->get($id, [
            'contain' => []
        ]);

        $u = TableRegistry::get('users')->find('all');
        /**
         * Tableau créé pour passer les utilisateurs de la table "users" à la vue
         */
        foreach ($u as $value) {
            if($value->id == $attribution->id_users)
                $user = $value->login;
        }
        /*
         * L'utilisation des 2 variables suivantes va permettre de pouvoir afficher le title de la table equipments avec l'id de la table itDevices
         */
        $e = TableRegistry::get('equipments')->find('Equipments');
        $i = TableRegistry::get('itDevices')->find('ItDevices');

        foreach($i as $key => $value){
            if($attribution->id_itdevices == $key){
                foreach($e as $k => $v){
                    if($value == $k){
                        $itTitle[$key] = $v;
                    }
                }
            }
        }
        /*
         * Formattage des dates de la table attribution
         */
        $attributionDates = TableRegistry::get('attributions')->find('Dates');

        foreach ($attributionDates as $i=>$dates){
            foreach ($dates as $key=>$value){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $formattedDates[$key][$i] = $newTemp;
            }
        }
        /*
         * L'utilisation de la variable suivante + la variable equipments définie ci-dessus, va permettre de pouvoir afficher la date d'amortissement grâce à l'id de la table itDevices
         */

        $date = TableRegistry::get('itDevices')->find('DateDepreciated');
        foreach($date as $key => $value){
            if($key == $attribution->id_itdevices){
                $temp = new \DateTime($value);
                $newTemp = $temp->format('d-m-Y');
                $depreciation[$key] = $newTemp;
            }
        }

        $data['attribution'] = $attribution;
        $data['formattedDates'] = $formattedDates;
        $data['user'] = $user;
        $data['itTitle'] = $itTitle;
        $data['depreciation'] = $depreciation;

        $this->set($data);
        $this->set('_serialize', ['attribution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /**
         * Tableau créé pour passer les matériels it dans la table "itDevice" à la vue
         * Pour les afficher, il faut aussi aller chercher le descriptif du matériel dans la table "equipments"
         * On vérifie d'abord qu'il y a bien des itDevices de définis.
         */
        $itDevices = TableRegistry::get('itDevices')->find('ItDevices');
        if($itDevices){
            $equipments = TableRegistry::get('equipments')->find('Equipments');
            foreach ($equipments as $key => $value){
                foreach($itDevices as $k => $v)
                {
                    if($key == $v){
                        $dropdown[$k] = 'ID: ' . $k . ' - ' . $value;
                    }
                }
            }
            $users = TableRegistry::get('users')->find('Users');

            $attribution = $this->Attributions->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->data();
                if($data['date_start']){
                    $date_start = $data['date_start']['year']. '-' . $data['date_start']['month']. '-' . $data['date_start']['day'];
                }
                if($data['date_end']){
                    $date_end = $data['date_end']['year']. '-' . $data['date_end']['month']. '-' . $data['date_end']['day'];
                }
                $attribution->date_start = $date_start;
                $attribution->date_end = $date_end;
                $attribution->id_users = $data['id_users'];
                $attribution->id_itdevices = $data['id_itdevices'];

                if ($this->Attributions->save($attribution)) {
                    $this->Flash->success(__('L\'attribution a bien été sauvegardée.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('L\'attribution n\'a pu être sauvegardée. Veuillez essayer à nouveau.'));
                }
            }
            $this->set(compact('attribution', 'dropdown', 'users'));
            $this->set('_serialize', ['attribution']);
        }else {
            $this->Flash->error(__('Veuillez avant tout créer un matériel IT.'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attribution = $this->Attributions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data();
            if($data['date_start']){
                $date_start = $data['date_start']['year']. '-' . $data['date_start']['month']. '-' . $data['date_start']['day'];
            }
            if($data['date_end']){
                $date_end = $data['date_end']['year']. '-' . $data['date_end']['month']. '-' . $data['date_end']['day'];
            }
            $attribution->date_start = $date_start;
            $attribution->date_end = $date_end;
            $attribution->id_users = $data['id_users'];
            $attribution->id_itdevices = $data['id_itdevices'];

            if ($this->Attributions->save($attribution)) {
                $this->Flash->success(__('L\'attribution a bien été sauvegardée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'attribution n\'a pu être sauvegardée. Veuillez essayer à nouveau.'));
            }
        }
        /*
         * Tableau créé pour passer les matériels it dans la table "itDevice" à la vue
         * Pour les afficher, il faut aussi aller chercher le descriptif du matériel dans la table "equipments"
         */
        $itDevices = TableRegistry::get('itDevices')->find('ItDevices');
        $equipments = TableRegistry::get('equipments')->find('Equipments');
        foreach ($equipments as $key => $value){
            foreach($itDevices as $k => $v)
            {
                if($key == $v){
                    $dropdown[$k] = 'ID: ' . $k . ' - ' . $value;
                }
            }
        }
        $users = TableRegistry::get('users')->find('Users');

        $this->set(compact('attribution', 'dropdown', 'users'));
        $this->set('_serialize', ['attribution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attribution = $this->Attributions->get($id);
        if ($this->Attributions->delete($attribution)) {
            $this->Flash->success(__('L\'attribution a été supprimée.'));
        } else {
            $this->Flash->error(__('L\'attribution n\'a pu être supprimée. Veuillez essayer à nouveau.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
