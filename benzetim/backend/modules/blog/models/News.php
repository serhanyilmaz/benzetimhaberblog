<?php

namespace backend\modules\blog\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $new_title
 * @property string $category
 * @property string $content
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $file; // Define
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_title', 'category', 'content'], 'required'],
            [['category'], 'string'],
            [['new_title'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 500],
			[['file'], 'safe'], //public function rules()
[['file'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_title' => 'New Title',
            'category' => 'Kategori',
            'content' => 'Content',
			'file' => 'Logo', 
        ];
    }
	public function getImageurl()
{
return \Yii::$app->request->BaseUrl.'//'.$this->logo;
}
}
