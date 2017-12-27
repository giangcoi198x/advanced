<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oncology_post_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $parent
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    private $_cats = [];
    public static function tableName()
    {
        return 'oncology_post_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'parent'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'parent' => 'Parent',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getParent($parent=0,$level=''){
        $data = Category::find()->where(['parent'=>$parent])->all();
        $level .='-- ';
        if($data):
            foreach ($data as $item):
                if($item->parent == 0){
                    $level = '';
                }
                $this->_cats[$item->id] = $level.$item->name;
                $this->getParent($item->id,$level);
            endforeach;
        endif;
        return $this->_cats;
    }
}
