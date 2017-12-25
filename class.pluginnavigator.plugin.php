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
        $keys = [];
        foreach ($args['AvailableAddons'] as $addon) {
            $keys[] = $addon['Key'];
        }
        sort($keys);

        $lastLetter = '';
        /*
        echo '<style>.PluginNavigatorList .Button{display:inline;list-style-type:none;margin:0 0.1em;padding:0.5em 0.9em;min-width:0}.PluginNavigatorList{padding:0;margin-top:1em}</style>';
        echo '<ul class="PluginNavigatorList">';
        foreach ($keys as $addonKey) {
            $linkLetter = substr($addonKey, 0, 1);
            if ($linkLetter !== $lastLetter) {
                echo sprintf(
                    '<li class="Button"><a href="#%s-addon">%s</a></li>',
                    $addonKey,
                    $linkLetter
                );
            }
            $lastLetter = $linkLetter;
        }
        echo '</ul>';
        */
        echo '<style>.PluginNavigatorList{text-transform:uppercase;padding:0;margin-top:1em}.PluginNavigatorList .btn{margin:0 0.1em;padding:0.5em 0.9em;min-width:0}</style>';
        echo '<div class="toolbar PluginNavigatorList"><div class="btn-group">';
        foreach ($keys as $addonKey) {
            $linkLetter = substr($addonKey, 0, 1);
            if ($linkLetter !== $lastLetter) {
                echo sprintf(
                    '<a href="#%1$s-addon" class="btn btn-secondary" accesskey="%2$s">%2$s</a>',
                    $addonKey,
                    $linkLetter
                );
            }
            $lastLetter = $linkLetter;
        }
        echo '</div></div>';
    }
}
