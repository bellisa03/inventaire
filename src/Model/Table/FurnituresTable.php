<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Furnitures Model
 *
 * @method \App\Model\Entity\Furniture get($primaryKey, $options = [])
 * @method \App\Model\Entity\Furniture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Furniture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Furniture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Furniture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Furniture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Furniture findOrCreate($search, callable $callback = null)
 */
class FurnituresTable extends Table
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

        $this->table('furnitures');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasOne('Equipments', [
            'foreignKey' => 'id',
            'bindingKey' => 'id_equipments'
        ]);

        $this->hasOne('Locations', [
            'foreignKey' => 'id',
            'bindingKey' => 'id_locations'
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
            ->decimal('price')
            ->allowEmpty('price');

        $validator
            ->allowEmpty('state');

        $validator
            ->requirePresence('note', 'create')
            ->allowEmpty('note');

        $validator
            ->integer('id_equipments')
            //->requirePresence('id_equipments', 'create')
            ->notEmpty('id_equipments');

        $validator
            ->integer('id_locations')
            //->requirePresence('id_locations', 'create')
            ->notEmpty('id_locations');

        return $validator;
    }
}
