<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ps".
 *
 * @property int $id
 * @property int $year_build Год сооружения
 * @property int $year_expl Год ввода в эксплуатацию
 * @property int $section_count Количество ячеек
 * @property int $trans_count Количество камер трансформатора
 * @property int $pris_count Количество присоединений
 * @property string $name Наименование подстанции
 * @property string $pos_build Место установки
 * @property string $build_org Наименование строительной организации
 * @property string $project_org Наименование проектной организации
 * @property string $inn Инвентарный номер
 * @property string $power_point Источник питания
 * @property string $dop_data Дополнительные данные
 */
class Ps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year_build', 'year_expl', 'section_count', 'trans_count', 'pris_count'], 'integer'],
            [['dop_data'], 'string'],
            [['name', 'pos_build', 'build_org', 'project_org', 'power_point'], 'string', 'max' => 255],
            [['inn'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'year_build' => 'Год постройки',
            'year_expl' => 'Год ввода в эксплуатацию',
            'section_count' => 'Кол-во секций',
            'trans_count' => 'Кол-во трансформаторов',
            'pris_count' => 'Кол-во присоединений',
            'name' => 'Наименование',
            'pos_build' => 'Место установки',
            'build_org' => 'Строительная компания',
            'project_org' => 'Проэктная компания',
            'inn' => 'Инвентарный',
            'power_point' => 'Источник питания',
            'dop_data' => 'Дополнительные данные',
        ];
    }
}
