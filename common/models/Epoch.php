<?phpnamespace common\models;use omgdef\multilingual\MultilingualBehavior;use omgdef\multilingual\MultilingualQuery;use Yii;/** * This is the model class for table "epoch". * * @property int $id * @property string $name * @property string $name_ru * * @property Petroglyph[] $petroglyphs */class Epoch extends \yii\db\ActiveRecord{    /**     * {@inheritdoc}     */    public static function tableName()    {        return 'epoch';    }    /**     * {@inheritdoc}     */    public function rules()    {        return [            [['name', 'name_en'], 'required'],        ];    }    /**     * @return MultilingualQuery|\yii\db\ActiveQuery     */    public static function find()    {        return new MultilingualQuery(get_called_class());    }    /**     * {@inheritdoc}     */    public function behaviors()    {        return [            'ml' => [                'class' => MultilingualBehavior::className(),                'languages' => [                    'ru' => 'Russian',                    'en' => 'English',                ],                'languageField' => 'locale',                'defaultLanguage' => 'ru',                'langForeignKey' => 'epoch_id',                'tableName' => "{{%epoch_language}}",                'attributes' => [                    'name',                ]            ],        ];    }    /**     * {@inheritdoc}     */    public function attributeLabels()    {        return [            'name' => 'Название',            'name_en' => 'Название на английском',        ];    }    /**     * @return \yii\db\ActiveQuery     */    public function getPetroglyphs()    {        return $this->hasMany(Petroglyph::className(), ['epoch_id' => 'id']);    }}