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
use WapplerSystems\Cleverreach\Domain\Model\Mailing;
use WapplerSystems\Cleverreach\Domain\Model\Receiver;

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

        /** @var ConfigurationService $configurationService */
        $configurationService = GeneralUtility::makeInstance(ObjectManager::class)->get(ConfigurationService::class);
        $this->configurationService = $configurationService;

        $groupId = $this->configurationService->getGroupId();
        $this->sendMailing("name", "html/text","subject","content here", "text", $groupId);
    }

}