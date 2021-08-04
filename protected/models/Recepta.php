<?php

/**
 * This is the model class for table "recepta".
 *
 * The followings are the available columns in table 'recepta':
 * @property integer $idRecepta
 * @property integer $oddzial_NFZ
 * @property string $uprawnienia
 * @property string $data_wystawienia
 * @property string $data_realizacji
 * @property integer $Pacjent_idPacjent
 * @property integer $Pracownik_idPracownik
 *
 * The followings are the available model relations:
 * @property PozycjaRecepta[] $pozycjaReceptas
 * @property Pacjent $pacjentIdPacjent
 * @property Pracownik $pracownikIdPracownik
 */
class Recepta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recepta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('oddzial_NFZ, uprawnienia, data_realizacji', 'required'),
			array('oddzial_NFZ', 'numerical', 'integerOnly'=>true),
			array('uprawnienia', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idRecepta, oddzial_NFZ, uprawnienia, data_wystawienia, data_realizacji', 'safe', 'on'=>'search'),
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
			'idRecepta0' => array(self::HAS_ONE, 'Wizyta', 'idWizyta'),
			'pozycjaReceptas' => array(self::HAS_MANY, 'PozycjaRecepta', 'Recepta_idRecepta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRecepta' => 'Id Recepta',
			'oddzial_NFZ' => 'Oddzial Nfz',
			'uprawnienia' => 'Uprawnienia',
			'data_wystawienia' => 'Data Wystawienia',
			'data_realizacji' => 'Data Realizacji',
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

		$criteria->compare('idRecepta',$this->idRecepta);
		$criteria->compare('oddzial_NFZ',$this->oddzial_NFZ);
		$criteria->compare('uprawnienia',$this->uprawnienia,true);
		$criteria->compare('data_wystawienia',$this->data_wystawienia,true);
		$criteria->compare('data_realizacji',$this->data_realizacji,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recepta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		$data=date('Y-m-d');
		$this->data_wystawienia = $data;
		$id= $_GET['id'];
		$this->idRecepta = $id;
		return true;
	}

	public function getPozycja($id)
        {
           $criteria=new CDbCriteria;
           $criteria->addCondition("Recepta_idRecepta = $id"); //Tutaj zamiast z palca, żeby generowało poprawne id
           //$criteria->addCondition("enquiry_date > strtotime('now')");
           $model = PozycjaRecepta::model()->findAll($criteria);
            
            
            
           //$model=Member::model()->findAll(array('order'=>'id'));
           $out=CHtml::listData($model,'nazwa', 'odplatnosc');
           $wynik = '<ul>';
           foreach($out as $key=>$value) { 
                $wynik .= sprintf('<li> <b>' .$key. '</b> odplatnosc:<b></li>' .$value);
                
           }
           $wynik .= '</ul>';
           return $wynik;
        }

        public function getPozycja2($id)
        {
           $criteria=new CDbCriteria;
           $criteria->addCondition("Recepta_idRecepta = $id"); //Tutaj zamiast z palca, żeby generowało poprawne id
           //$criteria->addCondition("enquiry_date > strtotime('now')");
           $model = PozycjaRecepta::model()->findAll($criteria);
            
            
            
           //$model=Member::model()->findAll(array('order'=>'id'));
           $out=CHtml::listData($model,'nazwa', 'odplatnosc');
           
           foreach($out as $key=>$value) { 
                $wynik .= sprintf('<p style="  font-size: 15pt; margin: 0 0 0 0; text-align:left;">' .$key. '<p style="  font-size: 15pt; margin: 0 0 0 0; text-align:right;">' .$value. '&#37;<hr><br><br>' );
                
           }
          
           return $wynik;
        }

}
