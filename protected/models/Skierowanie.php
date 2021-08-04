<?php

/**
 * This is the model class for table "skierowanie".
 *
 * The followings are the available columns in table 'skierowanie':
 * @property integer $idSkierowanie
 * @property string $do
 * @property string $cel_porady
 * @property string $Badania
 * @property string $data_wystawienia
 * @property integer $Pacjent_idPacjent
 * @property integer $Pracownik_idPracownik
 *
 * The followings are the available model relations:
 * @property Pacjent $pacjentIdPacjent
 * @property Pracownik $pracownikIdPracownik
 */
class Skierowanie extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skierowanie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('do, cel_porady', 'required'),
			array('do', 'length', 'max'=>80),
			array('cel_porady', 'length', 'max'=>100),
			array('Badania', 'length', 'max'=>350),
			array('data_wystawienia', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSkierowanie, do, cel_porady, Badania, data_wystawienia', 'safe', 'on'=>'search'),
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
			'idSkierowanie0' => array(self::HAS_ONE, 'Wizyta', 'idWizyta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSkierowanie' => 'Id Skierowanie',
			'do' => 'Do',
			'cel_porady' => 'Cel Porady',
			'Badania' => 'Badania',
			'data_wystawienia' => 'Data Wystawienia',
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
		
		
		$criteria->compare('idSkierowanie',$this->idSkierowanie);
		$criteria->compare('do',$this->do,true);
		$criteria->compare('cel_porady',$this->cel_porady,true);
		$criteria->compare('Badania',$this->Badania,true);
		$criteria->compare('data_wystawienia',$this->data_wystawienia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function beforeSave(){
		$data=date('Y-m-d');
		$this->data_wystawienia = $data;
		$id= $_GET['id'];
		$this->idSkierowanie = $id;
		return true;
	}

	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skierowanie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
