<?php
/**
 * Inställningar för olika app-varianter från Swedbank.
 *
 * @package Projectnamn
 * @author walle
 * Date: 2014-05-13
 * Time: 21:40
 */
namespace SwedbankJson;

use SwedbankJson\Exception\UserException;

/**
 * Class appdata
 */
class AppData
{
    private static $appData = [
        'swedbank'              => [ 'appID' => 'tKiUJOc0fAdy9itb', 'useragent' => 'SwedbankMOBPrivateIOS/4.5.0_(iOS;_9.2.1)_Apple/iPhone7,2'     ],
        'sparbanken'            => [ 'appID' => 'ApXJOPzxuClYQ09o', 'useragent' => 'SavingbankMOBPrivateIOS/4.5.0_(iOS;_9.2.1)_Apple/iPhone7,2'   ],
        'swedbank_ung'          => [ 'appID' => 'SjH7oIgOqkGmqxUz', 'useragent' => 'SwedbankMOBYouthIOS/2.0.0_(iOS;_9.2.1)_Apple/iPhone7,2'       ],
        'sparbanken_ung'        => [ 'appID' => 'L9SJJQiYav1CvTtK', 'useragent' => 'SavingbankMOBYouthIOS/2.0.0_(iOS;_9.2.1)_Apple/iPhone7,2'     ],
        'swedbank_foretag'      => [ 'appID' => 'FXdVTYdzOGBvqe5l', 'useragent' => 'SwedbankMOBCorporateIOS/2.2.0_(iOS;_9.2.1)_Apple/iPhone7,2'   ],
        'sparbanken_foretag'    => [ 'appID' => 'SeUNIvpcNHnNPwvK', 'useragent' => 'SavingbankMOBCorporateIOS/2.2.0_(iOS;_9.2.1)_Apple/iPhone7,2' ],
    ];

    public static function bankAppId($bankApp)
    {
        if ($bankApp == 'swedbank_företag')
            throw new UserException('BankApp "swedbank_företag" är inte längre giltigt. Använd "swedbank_foretag"',1);

        elseif (!isset(self::$appData[ $bankApp ]))
            throw new UserException('BankApp existerar inte, använd något av följande: '.implode(', ', array_keys(self::$appData)),2);

        return self::$appData[ $bankApp ];
    }
}