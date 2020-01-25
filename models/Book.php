<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 *
 * @property mixed $author
 */
class Book extends ActiveRecord
{
   public $file;

    private const TABLE = 'book';

    public static function tableName()
    {
        return self::TABLE;
    }



    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description', 'author_id'], 'required'],
            [['name', 'description'], 'string'],
            [['author_id', 'created_at', 'updated_at', 'average_mark'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}