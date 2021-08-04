<?php

/**
 * This is the model class for table "diagnoza".
 *
 * The followings are the available columns in table 'diagnoza':
 * @property integer $idDiagnoza
 * @property string $Diagnoza
 * @property string $Zalecenia
 * @property integer $Pracownik_idPracownik
 *
 * The followings are the available model relations:
 * @property Wizyta $idDiagnoza0
 * @property Pracownik $pracownikIdPracownik
 */
class Diagnoza extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'diagnoza';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Diagnoza, Zalecenia', 'required'),
			array('idDiagnoza', 'numerical', 'integerOnly'=>true),
			array('Diagnoza', 'length', 'max'=>90),
			array('Zalecenia', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDiagnoza, Diagnoza, Zalecenia', 'safe', 'on'=>'search'),
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
			'idDiagnoza0' => array(self::HAS_ONE, 'Wizyta', 'idWizyta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDiagnoza' => 'Numer Wizyty',
			'Diagnoza' => 'Diagnoza',
			'Zalecenia' => 'Zalecenia',
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

		$criteria->compare('idDiagnoza',$this->idDiagnoza);
		$criteria->compare('Diagnoza',$this->Diagnoza,true);
		$criteria->compare('Zalecenia',$this->Zalecenia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave(){
		$id= $_GET['id'];
		$this->idDiagnoza = $id;
		return true;
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diagnoza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
