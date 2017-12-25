<?php

$PluginInfo['PluginNavigator'] = [
    'Name' => 'Plugin Navigator',
    'Description' => 'Adds shortcuts to the plugins/all overview. Only useful if you have a lot of plugins.',
    'Version' => '0.4.0',
    'MobileFriendly' => true,
    'RequiredApplications' => ['Vanilla' => '2.5'],
    'Author' => 'Robin Jurinka',
    'AuthorUrl' => 'https://open.vanillaforums.com/profile/r_j',
    'License' => 'MIT'
];

class PluginNavigatorPlugin extends Gdn_Plugin {
    /**
     * Replace original plugin view with our custom one.
     *
     * Checks each call to the settings controller and if request ist plugin view,
     * the custom view is loaded and rendered.
     *
     * @param object $Sender SettingsController.
     * @return void
     */
    public function settingsController_beforeAddonList_handler($sender, $args) {
decho($args('AvailableAddons'));
    }
}
