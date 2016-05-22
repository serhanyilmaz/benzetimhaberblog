<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $email
 * @property string $subject
 * @property string $content
 * @property string $datetime
 */
class MessageForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email', 'subject', 'content'], 'required'],
            [['id'], 'integer'],
            [['content'], 'string'],
            [['datetime'], 'safe'],
            [['email'], 'string', 'max' => 64],
            [['subject'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'datetime' => 'Datetime',
        ];
    }
}
