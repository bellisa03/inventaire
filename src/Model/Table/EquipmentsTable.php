<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipments Model
 *
 * @method \App\Model\Entity\Equipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment findOrCreate($search, callable $callback = null)
 */
class EquipmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('equipments');
        $this->displayField('title');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('brand');

        $validator
            ->allowEmpty('version');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->integer('barcode')
            ->allowEmpty('barcode');

        $validator
            ->boolean('itdevice')
            ->allowEmpty('itdevice');

        return $validator;
    }

    public function findEquipments(){
        $e = $this->find('all')->select(['id','title', 'brand', 'version']);
        $t = null;
        if($e){
            foreach ($e as $value) {
                $t[$value->id] = $value->title . ' ' . $value->brand . ' ' . $value->version;
            }
        }
        return $t;
    }
    public function findItBoolean(){
        $e = $this->find('all')->select(['id', 'itdevice']);

        foreach ($e as $value) {
            $t[$value->id] = $value->itdevice;
        }
        return $t;
    }
    public function findBarcode(){
        $e = $this->find('all')->select(['id', 'barcode']);

        foreach ($e as $value) {
            $t[$value->id] = $value->barcode;
        }
        return $t;
    }
}
