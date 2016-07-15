<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItDevices Model
 *
 * @method \App\Model\Entity\ItDevice get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItDevice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItDevice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItDevice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItDevice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItDevice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItDevice findOrCreate($search, callable $callback = null)
 */
class ItDevicesTable extends Table
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

        $this->table('it_devices');
        $this->displayField('id');
        $this->primaryKey('id');
        /*
         * Un itDevice doit avoir un identifiant matériel (1.1), j'ajoute donc la configuration suivante:
         * */

        $this->hasOne('Equipments', [
            'foreignKey' => 'id',
            'bindingKey' => 'id_equipments'
        ]);
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
            ->date('date_in')
            ->allowEmpty('date_in');

        $validator
            ->date('date_out')
            ->allowEmpty('date_out');

        $validator
            ->date('date_depreciated')
            ->allowEmpty('date_depreciated');

        $validator
            ->decimal('price')
            ->allowEmpty('price');

        $validator
            ->allowEmpty('note');

        $validator
            ->integer('id_equipments')
            //->requirePresence('id_equipments', 'create')
            ->notEmpty('id_equipments');

        return $validator;
    }
}
