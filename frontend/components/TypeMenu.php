<?php/** * Created by PhpStorm. * User: Zhumadilov * Date: 19.11.2018 * Time: 14:14 */namespace frontend\components;use common\models\Type;use yii\base\Component;class TypeMenu extends Component{    public function run($params = [])    {        $types = Type::find()->all();        if (empty($types)) {            return null;        } else {            $menuItems = [];            foreach ($types as $type) {                $menuItems[] = [                    'label' => $type->name,                    'url' => ['type/view', 'id' => $type->id],                ];            }            return $menuItems;        }    }}