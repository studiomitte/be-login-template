<?php

declare(strict_types=1);

namespace StudioMitte\BackendLogin\Listener;

use TYPO3\CMS\Backend\LoginProvider\Event\ModifyPageLayoutOnLoginProviderSelectionEvent;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class ModifyPageLayoutOnLoginProviderSelectionListener
{
    public function __invoke(ModifyPageLayoutOnLoginProviderSelectionEvent $event): void
    {
        $this->addTemplate($event->getView());
    }

    protected function addTemplate(StandaloneView $view): void
    {
        $path = $this->getPath();
        if ($path) {
            foreach (['Layout', 'Partial', 'Template'] as $part) {
                $setter = 'set' . $part . 'RootPaths';
                $getter = 'get' . $part . 'RootPaths';
                $items = $view->$getter();
                $items[] = rtrim($path, '/') . '/' . $part . 's/';
                $view->$setter($items);
            }
        }
    }

    protected function getPath(): ?string
    {
        try {
            $path = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('be_login_template', 'path');
            return GeneralUtility::getFileAbsFileName($path);
        } catch (\Exception $e) {
            // do nothing
        }
        return null;
    }
}
