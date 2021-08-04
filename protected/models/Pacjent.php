<?php

/**
 * This is the model class for table "pacjent".
 *
 * The followings are the available columns in table 'pacjent':
 * @property integer $idPacjent
 * @property string $imie
 * @property string $imie_drugie
 * @property string $nazwisko
 * @property string $pesel
 * @property string $ulica
 * @property string $nr_domu
 * @property string $nr_mieszkania
 * @property string $miejscowosc
 * @property string $kod_pocztowy
 * @property string $Poczta
 *
 * The followings are the available model relations:
 * @property Kartoteka[] $kartotekas
 * @property Recepta[] $receptas
 * @property Skierowanie[] $skierowanies
 * @property Wizyta[] $wizytas
 */
class Pacjent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pacjent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imie, nazwisko, pesel, nr_domu, miejscowosc, kod_pocztowy, Poczta', 'required'),
			array('imie, imie_drugie, nazwisko, ulica, miejscowosc, Poczta', 'length', 'max'=>45),
			array('pesel', 'length', 'min'=>11, 'max'=>11),
			array('nr_domu, nr_mieszkania', 'length', 'max'=>4),
			array('kod_pocztowy', 'length', 'max'=>6),
			array('imie, imie_drugie, nazwisko, ulica, miejscowosc, Poczta', 'match', 'pattern'=>'/^([a-ząęśćńółżźA-ZĄĘŚĆŃÓŁŻŹ])+$/'),
			array('pesel', 'match', 'pattern'=>'/^([0-9])+$/'),
			array('kod_pocztowy', 'match', 'pattern'=>'/^([0-9]{2}[-]{1}[0-9]{3})+$/'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPacjent, imie, imie_drugie, nazwisko, pesel, ulica, nr_domu, nr_mieszkania, miejscowosc, kod_pocztowy, Poczta', 'safe', 'on'=>'search'),
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
			'receptas' => array(self::HAS_MANY, 'Recepta', 'Pacjent_idPacjent'),
			'skierowanies' => array(self::HAS_MANY, 'Skierowanie', 'Pacjent_idPacjent'),
			'wizytas' => array(self::HAS_MANY, 'Wizyta', 'Pacjent_idPacjent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPacjent' => 'Numer Karty Pacjenta',
			'imie' => 'Imie',
			'imie_drugie' => 'Imie Drugie',
			'nazwisko' => 'Nazwisko',
			'pesel' => 'Pesel',
			'ulica' => 'Ulica',
			'nr_domu' => 'Nr Domu',
			'nr_mieszkania' => 'Nr Mieszkania',
			'miejscowosc' => 'Miejscowosc',
			'kod_pocztowy' => 'Kod Pocztowy',
			'Poczta' => 'Poczta',
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

		$criteria->compare('idPacjent',$this->idPacjent);
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('imie_drugie',$this->imie_drugie,true);
		$criteria->compare('nazwisko',$this->nazwisko,true);
		$criteria->compare('pesel',$this->pesel,true);
		$criteria->compare('ulica',$this->ulica,true);
		$criteria->compare('nr_domu',$this->nr_domu,true);
		$criteria->compare('nr_mieszkania',$this->nr_mieszkania,true);
		$criteria->compare('miejscowosc',$this->miejscowosc,true);
		$criteria->compare('kod_pocztowy',$this->kod_pocztowy,true);
		$criteria->compare('Poczta',$this->Poczta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFullName()
{
        return $this->imie . ' ' . $this->imie_drugie. ' ' .$this->nazwisko. ' PESEL: ' .$this->pesel;
}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pacjent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
