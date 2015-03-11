<?php
/**
 * Wrapper för Swedbanks stänga API för mobilappar
 *
 * @package SwedbankJSON
 * @author  Eric Wallmander
 *          Date: 2014-02-25
 *          Time: 21:36
 */

namespace SwedbankJson\Auth;

use SwedbankJson\AppData;
use Exception;

class NoLogin extends AbstractAuth
{
    /**
     * Grundläggande upgifter
     *
     * @param string|array      $bankApp    ID för vilken bank som ska anropas, eller array med appdata uppgifter.
     * @param bool              $debug      Sätt true för att göra felsökning, annars false eller null
     * @param string            $ckfile     Sökväg till mapp där cookiejar kan sparas temporärt
     *
     *
     * @throws \Exception
     * @throws \SwedbankJson\UserException
     */
    public function __construct($bankApp, $debug = false, $ckfile = './temp/')
    {
        $this->setAppData((!is_array($bankApp)) ? AppData::bankAppId($bankApp) : $bankApp);
        $this->_debug       = (bool)$debug;
        $this->_ckfile      = tempnam($ckfile, 'CURLCOOKIE');
        $this->setAuthorizationKey();
    }

    /**
     * Inlogging
     * Loggar in utan personummer och personig kod för att få reda på bankID och den tillfälliga profil-id:t
     *
     * @return bool         True om inloggingen lyckades
     * @throws Exception    Fel vid inloggen
     */
    public function login()
    {
        return true;
    }
}
