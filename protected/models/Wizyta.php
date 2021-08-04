<?php

/**
 * This is the model class for table "wizyta".
 *
 * The followings are the available columns in table 'wizyta':
 * @property integer $idWizyta
 * @property string $data_wizyty
 * @property string $godzina_wizyty
 * @property integer $Pacjent_idPacjent
 * @property string $gabinet
 * @property integer $Pracownik_idPracownik
 *
 * The followings are the available model relations:
 * @property Diagnoza $diagnoza
 * @property Pacjent $pacjentIdPacjent
 * @property Pracownik $pracownikIdPracownik
 */
class Wizyta extends CActiveRecord
{
	public $pracownik_imie;
	public $pracownik_imie_drugie;
	public $pracownik_nazwisko;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wizyta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_wizyty, godzina_wizyty, Pacjent_idPacjent, Pracownik_idPracownik', 'required'),
			array('Pacjent_idPacjent, Pracownik_idPracownik', 'numerical', 'integerOnly'=>true),
			array('godzina_wizyty', 'match', 'pattern'=>'/^([0-2]{1}[0-9]{1}[:]{1}[0-5]{1}[0-9]{1})+$/'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idWizyta, data_wizyty, godzina_wizyty, Pacjent_idPacjent, Pracownik_idPracownik, pracownik_imie, pracownik_imie_drugie, pracownik_nazwisko', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'diagnoza' => array(self::HAS_ONE, 'Diagnoza', 'idDiagnoza'),
			'recepta' => array(self::HAS_ONE, 'Recepta', 'idRecepta'),
			'skierowanie' => array(self::HAS_ONE, 'Skierowanie', 'idSkierowanie'),
			'pacjentIdPacjent' => array(self::BELONGS_TO, 'Pacjent', 'Pacjent_idPacjent'),
			'pracownikIdPracownik' => array(self::BELONGS_TO, 'Pracownik', 'Pracownik_idPracownik'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idWizyta' => 'Numer Wizyty',
			'data_wizyty' => 'Data Wizyty',
			'godzina_wizyty' => 'Godzina Wizyty',
			'Pacjent_idPacjent' => 'Numer Karty Pacjenta',
			'Pracownik_idPracownik' => 'Pracownik',
			'pracownik_imie' => 'Imie Lekarza',
			'pracownik_imie_drugie' => 'Imie Drugie Lekarza',
			'pracownik_nazwisko' => 'Nazwisko Lekarza',
		);
	}



	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'Pracownik_idPracownik =:Pracownik AND data_wizyty >=:data';
        $criteria->params = array(':Pracownik'=>Yii::app()->user->id, ':data'=>date('Y-m-d'));
		$criteria->compare('idWizyta',$this->idWizyta);
		$criteria->compare('data_wizyty',$this->data_wizyty,true);
		$criteria->compare('godzina_wizyty',$this->godzina_wizyty,true);
		$criteria->compare('Pacjent_idPacjent',$this->Pacjent_idPacjent);
		$criteria->compare('Pracownik_idPracownik',$this->Pracownik_idPracownik);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('pracownikIdPracownik');
		$criteria->condition = 'Pacjent_idPacjent =:Pacjent AND data_wizyty <:data';
		$criteria->params = array(':Pacjent'=>$_GET['id'], ':data'=>date('Y-m-d'));
		$criteria->compare('idWizyta',$this->idWizyta);
		$criteria->compare('data_wizyty',$this->data_wizyty,true);
		$criteria->compare('godzina_wizyty',$this->godzina_wizyty,true);
		$criteria->compare('Pacjent_idPacjent',$this->Pacjent_idPacjent);
		$criteria->compare('Pracownik_idPracownik',$this->Pracownik_idPracownik);
		$criteria->compare('pracownikIdPracownik.imie',$this->pracownik_imie, true);
		$criteria->compare('pracownikIdPracownik.imie_drugie',$this->pracownik_imie_drugie, true);
		$criteria->compare('pracownikIdPracownik.nazwisko',$this->pracownik_nazwisko, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'pracownik_imie'=>array(
						'asc'=>'pracownikIdPracownik.imie',
						'desc'=>'pracownikIdPracownik.imie DESC',
						),
					'pracownik_imie_drugie'=>array(
						'asc'=>'pracownikIdPracownik.imie_drugie',
						'desc'=>'pracownikIdPracownik.imie_drugie DESC',
						),
					'pracownik_nazwisko'=>array(
						'asc'=>'pracownikIdPracownik.nazwisko',
						'desc'=>'pracownikIdPracownik.nazwisko DESC',
						),
					'*',
					),
				),
		));
	}

	public function search3()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'Pracownik_idPracownik =:Pracownik AND data_wizyty <:data';
        $criteria->params = array(':Pracownik'=>Yii::app()->user->id, ':data'=>date('Y-m-d'));
		$criteria->compare('idWizyta',$this->idWizyta);
		$criteria->compare('data_wizyty',$this->data_wizyty,true);
		$criteria->compare('godzina_wizyty',$this->godzina_wizyty,true);
		$criteria->compare('Pacjent_idPacjent',$this->Pacjent_idPacjent);
		$criteria->compare('Pracownik_idPracownik',$this->Pracownik_idPracownik);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search4()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('pracownikIdPracownik');
        $criteria->condition = 'data_wizyty <:data';
        $criteria->params = array(':data'=>date('Y-m-d'));
		$criteria->compare('idWizyta',$this->idWizyta);
		$criteria->compare('data_wizyty',$this->data_wizyty,true);
		$criteria->compare('godzina_wizyty',$this->godzina_wizyty,true);
		$criteria->compare('Pacjent_idPacjent',$this->Pacjent_idPacjent);
		$criteria->compare('Pracownik_idPracownik',$this->Pracownik_idPracownik);

		$criteria->compare('pracownikIdPracownik.imie',$this->pracownik_imie, true);
		$criteria->compare('pracownikIdPracownik.imie_drugie',$this->pracownik_imie_drugie, true);
		$criteria->compare('pracownikIdPracownik.nazwisko',$this->pracownik_nazwisko, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'pracownik_imie'=>array(
						'asc'=>'pracownikIdPracownik.imie',
						'desc'=>'pracownikIdPracownik.imie DESC',
						),
					'pracownik_imie_drugie'=>array(
						'asc'=>'pracownikIdPracownik.imie_drugie',
						'desc'=>'pracownikIdPracownik.imie_drugie DESC',
						),
					'pracownik_nazwisko'=>array(
						'asc'=>'pracownikIdPracownik.nazwisko',
						'desc'=>'pracownikIdPracownik.nazwisko DESC',
						),
					'*',
					),
				),
		));
	}

	public function search5()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('pracownikIdPracownik');
        $criteria->condition = 'data_wizyty >=:data';
        $criteria->params = array(':data'=>date('Y-m-d'));
		$criteria->compare('idWizyta',$this->idWizyta);
		$criteria->compare('data_wizyty',$this->data_wizyty,true);
		$criteria->compare('godzina_wizyty',$this->godzina_wizyty,true);
		$criteria->compare('Pacjent_idPacjent',$this->Pacjent_idPacjent);
		$criteria->compare('Pracownik_idPracownik',$this->Pracownik_idPracownik);

		$criteria->compare('pracownikIdPracownik.imie',$this->pracownik_imie, true);
		$criteria->compare('pracownikIdPracownik.imie_drugie',$this->pracownik_imie_drugie, true);
		$criteria->compare('pracownikIdPracownik.nazwisko',$this->pracownik_nazwisko, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'pracownik_imie'=>array(
						'asc'=>'pracownikIdPracownik.imie',
						'desc'=>'pracownikIdPracownik.imie DESC',
						),
					'pracownik_imie_drugie'=>array(
						'asc'=>'pracownikIdPracownik.imie_drugie',
						'desc'=>'pracownikIdPracownik.imie_drugie DESC',
						),
					'pracownik_nazwisko'=>array(
						'asc'=>'pracownikIdPracownik.nazwisko',
						'desc'=>'pracownikIdPracownik.nazwisko DESC',
						),
					'*',
					),
				),
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Wizyta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
