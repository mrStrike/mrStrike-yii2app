<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "j_tp".
 *
 * @property int $id Код
 * @property int $id_ps Код подстанции
 * @property string $date_pr Дата проведения ремонта
 * @property string $date_tr Текущий ремонт
 * @property string $date_kr Капитальный ремонт
 * @property string $date_ivv в/в испытания
 * @property string $tr_t1 Т-1
 * @property string $tr_t2 Т-2
 * @property string $kr_t1 Т-1
 * @property string $kr_t2 Т-2
 * @property string $ivv в/в испытания
 * @property string $ru04_tr Текущий ремонт
 * @property string $ru04_kr Капитальный ремонт
 * @property string $ru04_ivv в/в испытания
 * @property string $av_tr Текущий ремонт
 * @property string $av_kr Капитальный ремонт
 * @property string $av_ivv в/в испытания
 * @property string $p_iz Проверка сопротивления изоляции освещения
 * @property string $ha_tm Хим. анализ трансформаторного масла
 * @property string $date_stamp Штамп времени
 * @property string $author Автор данных
 */
class JTp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'j_tp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ps'], 'integer'],
            [['date_pr', 'date_tr', 'date_kr', 'date_ivv', 'date_stamp'], 'safe'],
            [['tr_t1', 'tr_t2', 'kr_t1', 'kr_t2', 'ivv', 'ru04_tr', 'ru04_kr', 'ru04_ivv', 'av_tr', 'av_kr', 'av_ivv', 'p_iz', 'ha_tm', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'id_ps' => 'Код подстанции',
            'date_pr' => 'Дата пр-я ремонта',
            'date_tr' => 'Тек. ремонт',
            'date_kr' => 'Кап. ремонт',
            'date_ivv' => 'в/в испытания',
            'tr_t1' => 'Т-1',
            'tr_t2' => 'Т-2',
            'kr_t1' => 'Т-1',
            'kr_t2' => 'Т-2',
            'ivv' => 'в/в испытания',
            'ru04_tr' => 'Тек. ремонт',
            'ru04_kr' => 'Кап. ремонт',
            'ru04_ivv' => 'в/в испытания',
            'av_tr' => 'Тек. ремонт',
            'av_kr' => 'Кап. ремонт',
            'av_ivv' => 'в/в испытания',
            'p_iz' => 'Проверка сопротивления изоляции освещения',
            'ha_tm' => 'Хим. анализ тр-ого масла',
            'date_stamp' => 'Штамп времени',
            'author' => 'Автор данных',
        ];
    }
}
