<?php
defined('TYPO3_MODE') or die('Access denied.');

$GLOBALS['TCA']['tx_tea_domain_model_teabeverage'] = [
    'ctrl' => $GLOBALS['TCA']['tx_tea_domain_model_teabeverage']['ctrl'],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, size, type, additions, testimonials',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, size, type, additions, testimonials, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0],
                ],
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_tea_domain_model_teabeverage',
                'foreign_table_where' => 'AND tx_tea_domain_model_teabeverage.pid=###CURRENT_PID### AND tx_tea_domain_model_teabeverage.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                ],
            ],
        ],
        'size' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_teabeverage.size',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2',
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_teabeverage.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_tea_domain_model_teatype',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'additions' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_teabeverage.additions',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'foreign_table' => 'tx_tea_domain_model_addition',
                'MM' => 'tx_tea_teabeverage_addition_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
            ],
        ],
        'testimonials' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_teabeverage.testimonials',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_tea_domain_model_testimonial',
                'foreign_field' => 'teabeverage',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                ],
            ],
        ],
    ],
];
