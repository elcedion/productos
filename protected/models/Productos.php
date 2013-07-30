<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $id
 * @property integer $categorias_id
 * @property string $nombre
 * @property string $marca
 *
 * The followings are the available model relations:
 * @property Categorias $categorias
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categorias_id', 'required'),
			array('categorias_id', 'numerical', 'integerOnly'=>true),
			array('nombre, marca', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categorias_id, nombre, marca', 'safe', 'on'=>'search'),
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
			'categorias' => array(self::BELONGS_TO, 'Categorias', 'categorias_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categorias_id' => 'Categorias',
			'nombre' => 'Nombre',
			'marca' => 'Marca',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('categorias_id',$this->categorias_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('marca',$this->marca,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
