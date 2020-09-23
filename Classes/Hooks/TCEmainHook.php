<?php
namespace WapplerSystems\Cleverreach\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use WapplerSystems\Cleverreach\Service\ConfigurationService;
use WapplerSystems\Cleverreach\Tools\Rest;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility as debug;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class TCEmainHook extends \WapplerSystems\Cleverreach\CleverReach\Api{

    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$reference) {
        /** @var ConfigurationService $configurationService */
        $configurationService = GeneralUtility::makeInstance(ObjectManager::class)->get(ConfigurationService::class);
        $this->configurationService = $configurationService;

        $pid = $this->configurationService->getPageid();
        $tabledata = $this->configurationService->getTableName();

        if ($table === $tabledata) {
            $record = BackendUtility::getRecord($table, $id);
            
            if($status == 'update' && $record['pid'] == $pid){
                $this->callCleverReach();
            } 

            if($status == 'new'){
                $this->callCleverReach();
            }               
        }
    }

    public function callCleverReach() {

        /** @var ConfigurationService $configurationService */
        $configurationService = GeneralUtility::makeInstance(ObjectManager::class)->get(ConfigurationService::class);
        $this->configurationService = $configurationService;

        $this->connect();

        $result = $this->sendMailing("name", "subject", "hello world");
        debug::var_dump($result);
    }


}