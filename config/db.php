<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=cardio',
    'username' => 'root',
    'password' => '',
//    'dsn' => 'mysql:host=forsql.com;dbname=upbackup_iris_1',
//    'username' => 'upbackup_medgras',
//    'password' => 'H811FIhx.A#Z',
    'charset' => 'utf8',

    'enableSchemaCache' => false,
    // ����������������� ����������� �����.
    'schemaCacheDuration' => 3600,
    // �������� ���������� ����, ������������� ��� �������� ���������� � �����
    'schemaCache' => 'cache',


    'on afterOpen' => function($event) {
       $event->sender->createCommand("SET time_zone = '+00:00'")->execute();},
];
