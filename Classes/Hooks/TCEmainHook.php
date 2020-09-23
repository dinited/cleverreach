<?php
namespace WapplerSystems\Cleverreach\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use WapplerSystems\Cleverreach\Tools\Rest;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility as debug;

class TCEmainHook extends \WapplerSystems\Cleverreach\CleverReach\Api{

    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$reference) {
        if ($table === 'tx_news_domain_model_news') {
            
            $pid = 61;
            $record = BackendUtility::getRecord('tx_news_domain_model_news', $id);
            
            if($status == 'update' && $record['pid'] == $pid){
                $this->callCleverReach();
            } 

            if($status == 'new'){
                $this->callCleverReach();
            }               
        }
    }

    public function callCleverReach() {
        $this->connect();
        debug::var_dump("inside callCleverReach function");
    }

    public function connect()
    {
        $apiUrl = 'https://rest.cleverreach.com/v2';
        $clientid = '265754'; 
        $login = 'info@kh-itzehoe.de';
        $password = 'NewsAerzte2020#';

        if ($this->rest !== null) {
            return;
        }

        $this->rest = new Rest($apiUrl);

        try {
            //skip this part if you have an OAuth access token
            $token = $this->rest->post('/login',
                [
                    'client_id' => $clientid,
                    'login' => $login,
                    'password' => $password
                ]
            );
            $this->rest->setAuthMode('bearer', $token);
            debug::var_dump("connected");
        } catch (\Exception $ex) {
            $error = "Fehler beim Verbinden der API";
            debug::var_dump($error);
        }
    }
}