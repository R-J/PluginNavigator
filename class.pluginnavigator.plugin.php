<?php defined('APPLICATION') or die;

$PluginInfo['PluginNavigator'] = array(
    'Name' => 'Plugin Navigator',
    'Description' => 'Adds shortcuts to the plugins/all overview. Only useful if you have a lot of plugins.',
    'Version' => '0.3',
    'RequiredApplications' => array('Vanilla' => '2.1'),
    'Author' => 'Robin Jurinka',
    'License' => 'MIT'
);

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
    public function settingsController_render_before ($Sender) {
        if ($Sender->RequestMethod != 'plugins') {
            return;
        }
        $Sender->View = $this->GetView('plugins.php');
    }
}
