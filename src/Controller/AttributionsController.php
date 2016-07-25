<?php
namespace App\Controller;

use App\Controller\AppController;
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
         * L'utilisation de la variable suivante + la variable equipments définie ci-dessus, va permettre de pouvoir afficher la date d'amortissement en regard des id de la table itDevices
         */

        $date = TableRegistry::get('itDevices')->find('DateDepreciated');
        foreach($date as $key => $value){
            $temp = new \DateTime($value);
            $newTemp = $temp->format('d-m-Y');
            $depreciation[$key] = $newTemp;
        }
        $this->set(compact('attributions','itTitle','depreciation'));
        $this->set('_serialize', ['attributions']);
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
        $attribution = $this->Attributions->newEntity();
        if ($this->request->is('post')) {
            $attribution = $this->Attributions->patchEntity($attribution, $this->request->data);
            if ($this->Attributions->save($attribution)) {
                $this->Flash->success(__('L\'attribution a bien été sauvegardée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'attribution n\'a pu être sauvegardée. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('attribution'));
        $this->set('_serialize', ['attribution']);
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
            $attribution = $this->Attributions->patchEntity($attribution, $this->request->data);
            if ($this->Attributions->save($attribution)) {
                $this->Flash->success(__('L\'attribution a bien été sauvegardée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'attribution n\'a pu être sauvegardée. Veuillez essayer à nouveau.'));
            }
        }
        $this->set(compact('attribution'));
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
