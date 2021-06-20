<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class CmdController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
//        echo $message . "\n";
    }

    public function actionCheckfine()
    {
     //   print_r(Yii::$aliases); die();
        \app\models\Fine::FindFine();
    }
}
