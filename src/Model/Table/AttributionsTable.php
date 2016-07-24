<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attributions Model
 *
 * @method \App\Model\Entity\Attribution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Attribution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Attribution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attribution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attribution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Attribution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attribution findOrCreate($search, callable $callback = null)
 */
class AttributionsTable extends Table
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

        $this->table('attributions');
        $this->displayField('id');
        $this->primaryKey(['id']);

        $this->hasOne('Users', [
            'foreignKey' => 'id',
            'bindingKey' => 'id_users'
        ]);
        $this->hasOne('ItDevices', [
            'foreignKey' => 'id',
            'bindingKey' => 'id_itdevices'
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
            ->date('date_start')
            ->allowEmpty('date_start');

        $validator
            ->date('date_end')
            ->allowEmpty('date_end');

        $validator
            ->date('date_depreciated')
            ->allowEmpty('date_depreciated');

        $validator
            ->integer('id_itdevices')
            ->notEmpty('id_itdevices');

        $validator
            ->integer('id_users')
            ->notEmpty('id_users');

        return $validator;
    }
}
