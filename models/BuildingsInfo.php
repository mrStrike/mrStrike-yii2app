<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buildings_info".
 *
 * @property int $id Код
 * @property int $id_building Код здания
 * @property string $date_r Дата ремонта
 * @property string $remont_info Содержание ремонта
 * @property string $remont_p Причина ремонта
 * @property string $fio_curator ФИО ответственного за ремонт
 * @property string $fio_loging ФИО внесшего запись
 */
class BuildingsInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buildings_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_building'], 'integer'],
            [['date_r'], 'safe'],
        	[['time_stamp'], 'safe'],
            [['remont_info', 'remont_p'], 'string'],
            [['fio_curator', 'fio_loging'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'id_building' => 'Код здания',
            'date_r' => 'Дата ремонта',
            'remont_info' => 'Содержание ремонта',
            'remont_p' => 'Причина ремонта',
            'fio_curator' => 'ФИО ответственного',
            'fio_loging' => 'ФИО внесшего запись',
        	'time_stamp' => 'Регистрация времени',
        ];
    }
}
