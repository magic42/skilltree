<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Talents Model
 *
 * @property \Cake\ORM\Association\HasMany $Skills
 *
 * @method \App\Model\Entity\Talent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Talent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Talent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Talent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Talent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Talent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Talent findOrCreate($search, callable $callback = null)
 */
class TalentsTable extends Table
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

        $this->table('talents');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Skills', [
            'foreignKey' => 'talent_id'
        ]);

        // Add the behaviour and configure any options you want
        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 128, // Width
                        'h' => 128, // Height
                        'jpeg_quality'  => 100
                    ],
                ],
                'thumbnailMethod' => 'gd',   // Options are Imagick or Gd
                'crop' => true
            ]
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->requirePresence('photo', 'create')
            ->notEmpty('name');


        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');

        // Set the thumbnail resize dimensions
        $validator->add('photo', 'proffer', [
            'rule' => ['dimensions', [
                'min' => ['w' => 50, 'h' => 50],
                'max' => ['w' => 3000, 'h' => 3000],
            ]],
            'message' => 'Image is not correct dimensions.',
            'provider' => 'proffer',

        ]);

        $validator->requirePresence('photo', 'create')
            ->allowEmpty('photo', 'update');
        
        return $validator;
    }
}
