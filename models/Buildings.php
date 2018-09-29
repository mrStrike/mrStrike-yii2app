<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buildings".
 *
 * @property int $id Код здания
 * @property int $id_ps Код подстанции
 * @property string $name Наименование здания
 * @property string $fundament Фундамент
 * @property string $stena Стены
 * @property string $perekritie Перекрытия
 * @property string $krovli Кровля
 * @property string $dor_iron Двери железные
 * @property string $dor_tree Двери деревянные
 * @property string $build_h Высота здания от уровня земли до корниза
 * @property string $other Прочие данные
 */
class Buildings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buildings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ps'], 'integer'],
            [['fundament', 'stena', 'perekritie', 'krovli', 'dor_iron', 'dor_tree', 'build_h', 'other'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код здания',
            'id_ps' => 'Код подстанции',
            'name' => 'Наименование здания',
            'fundament' => 'Фундамент',
            'stena' => 'Стены',
            'perekritie' => 'Перекрытия',
            'krovli' => 'Кровля',
            'dor_iron' => 'Двери железные',
            'dor_tree' => 'Двери деревянные',
            'build_h' => 'Высота здания от уровня земли до корниза',
            'other' => 'Прочие данные',
        ];
    }
}
