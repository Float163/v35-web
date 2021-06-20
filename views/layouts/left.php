<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Измерения', 'icon' => 'heart', 'url' => ['/measures']],
                    ['label' => 'Пациенты', 'icon' => 'user', 'url' => ['/patient']],
                    [
                        'label' => 'Монитор',
                        'icon' => 'desktop',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Выше нормы', 'icon' => 'file-code-o', 'url' => ['/patient/outnorma'],],
                            ['label' => 'Гипертензия 2+', 'icon' => 'file-code-o', 'url' => ['/patient/hyper2'],],
                        ],
                    ],
                    [
                        'label' => 'Отчеты',
                        'icon' => 'line-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => '', 'icon' => 'file-code-o', 'url' => ['/report'],],
                            ['label' => '', 'icon' => 'dashboard', 'url' => ['/call'],],
                            ['label' => '', 'icon' => 'dashboard', 'url' => ['/call/daycall'],],
                        ],
                    ],
                    [
                        'label' => 'Справочники',
                        'icon' => 'folder',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Доктора', 'icon' => 'money', 'url' => ['/inkass'],],
                            ['label' => 'Диагнозы', 'icon' => 'file-code-o', 'url' => ['/defect'],],
                            ['label' => 'Препараты', 'icon' => 'car', 'url' => ['/car'],],
                            ['label' => 'Тарифы', 'icon' => 'file-code-o', 'url' => ['/tariff'],],
                        ],
                    ],
                ],
            ]
        ) ?>
    </section>
</aside>
