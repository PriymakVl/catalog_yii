<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'required'],
            [['img'], 'required', 'on' => 'create'], 
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            ['price', 'double'],
            [['img'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'img' => 'Img',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // Product creation scenario
        $scenarios['create'] = ['name', 'description', 'img', 'price'];
        // Scenario for updating a product without changing the image
        $scenarios['update'] = ['name', 'description', 'price'];
        return $scenarios;
    }
}
