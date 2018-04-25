/**
 * Generate a SteemConnect Config instance.
 *
 * @return Config
 */
protected function generateConfig() : Config
{
    // get client id and secret from config.
    $clientId = config('steem.sc2.client_id');
    $clientSecret = config('steem.sc2.client_secret');

    // creates a new SteemConnect configuration instance.
    $config = new Config($clientId, $clientSecret);

    // get all scopes and explode into an array.
    $scopes = explode(',', config('steem.sc2.scopes'));
    // set the scopes on the configuration instance.
    $config->setScopes($scopes);

    // get the return URL from config.
    $returnUrl = config('steem.sc2.return_url');
    // set the return URL on the config instance.
    $config->setReturnUrl($returnUrl);

    // get the community name.
    $community = config('steem.app.community');

    // set the community if one was set.
    if ($community) {
        $config->setCommunity($community);
    }

    // build an application name / version string.
    $appName = config('steem.app.name')."/".config('steem.app.version');
    // set the application name on the config instance.
    $config->setApp($appName);

    // return the config.
    return $config;
}
