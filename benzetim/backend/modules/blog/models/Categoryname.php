<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "categoryname".
 *
 * @property integer $category_id
 * @property string $category
 */
class Categoryname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoryname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category' => 'Category',
        ];
    }
}
