<?php
namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property mixed $books
 */
class Author extends ActiveRecord
{
    private const TABLE = 'author';

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
            [['name', 'surname', 'patronymic'], 'string']
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['author_id' => 'id']);
    }

    public static function getArrayAuthors()
    {
        $authors = self::find()->all();

        $arrayAuthor = [];

        foreach ($authors as $author) {
            $arrayAuthor[$author->id] = $author->name
                . ' ' . $author->surname;
        }

        return $arrayAuthor;
    }
}