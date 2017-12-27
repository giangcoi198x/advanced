<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oncology_post".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category
 * @property string $slug
 * @property string $image
 * @property string $desc
 * @property string $content
 * @property string $author
 * @property integer $status
 * @property integer $publish_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'oncology_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'status', 'publish_at', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'content', 'author', 'publish_at', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['name', 'slug', 'image', 'desc', 'author'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['file'],'file','extensions'=>'jpg,png,gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category' => Yii::t('app', 'Category'),
            'slug' => Yii::t('app', 'Slug'),
            'image' => Yii::t('app', 'Image'),
            'desc' => Yii::t('app', 'Desc'),
            'content' => Yii::t('app', 'Content'),
            'author' => Yii::t('app', 'Author'),
            'status' => Yii::t('app', 'Status'),
            'publish_at' => Yii::t('app', 'Publish At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
