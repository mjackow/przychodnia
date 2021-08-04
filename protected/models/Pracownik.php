<?php

/**
 * This is the model class for table "pracownik".
 *
 * The followings are the available columns in table 'pracownik':
 * @property integer $idPracownik
 * @property string $login
 * @property string $haslo
 * @property string $email
 * @property string $data_rejestracji
 * @property string $imie
 * @property string $imie_drugie
 * @property string $nazwisko
 * @property string $stanowisko
 *
 * The followings are the available model relations:
 * @property Przyjecia[] $przyjecias
 * @property Recepta[] $receptas
 * @property Skierowanie[] $skierowanies
 * @property Wizyta[] $wizytas
 */
class Pracownik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pracownik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, haslo, email, imie, nazwisko, stanowisko', 'required'),
			array('login', 'length', 'max'=>45),
			array('haslo', 'length', 'max'=>32),
			array('email', 'length', 'max'=>30),
			array('imie, imie_drugie, nazwisko', 'length', 'max'=>40),
			array('stanowisko', 'length', 'max'=>13),
			array('imie, imie_drugie, nazwisko', 'match', 'pattern'=>'/^([a-ząęśćńółżźA-ZĄĘŚĆŃÓŁŻŹ])+$/'),
			array('email', 'match', 'pattern'=>'/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPracownik, login, email, data_rejestracji, imie, imie_drugie, nazwisko, stanowisko', 'safe', 'on'=>'search'),
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
			'przyjecias' => array(self::HAS_MANY, 'Przyjecia', 'Pracownik_idPracownik'),
			'receptas' => array(self::HAS_MANY, 'Recepta', 'Pracownik_idPracownik'),
			'skierowanies' => array(self::HAS_MANY, 'Skierowanie', 'Pracownik_idPracownik'),
			'wizytas' => array(self::HAS_MANY, 'Wizyta', 'Pracownik_idPracownik'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPracownik' => 'Id Pracownik',
			'login' => 'Login',
			'haslo' => 'Haslo',
			'email' => 'Email',
			'data_rejestracji' => 'Data Rejestracji',
			'imie' => 'Imie',
			'imie_drugie' => 'Imie Drugie',
			'nazwisko' => 'Nazwisko',
			'stanowisko' => 'Stanowisko',
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

		$criteria->compare('idPracownik',$this->idPracownik);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('haslo',$this->haslo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('data_rejestracji',$this->data_rejestracji,true);
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('imie_drugie',$this->imie_drugie,true);
		$criteria->compare('nazwisko',$this->nazwisko,true);
		$criteria->compare('stanowisko',$this->stanowisko,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pracownik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

		public function getFullName()
{
        	return $this->imie . ' ' . $this->imie_drugie. ' ' .$this->nazwisko;

}

public function beforeSave(){
		$haslo= md5($this->haslo);
		$this->haslo = $haslo;
		$data=date('Y-m-d');
		$this->data_rejestracji = $data;
		return true;
	}

}
