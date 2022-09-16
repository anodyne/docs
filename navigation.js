const urlPrefix = '/docs/2.6'

module.exports = {
    navigation: [
        {
            title: 'Introduction',
            links: [
                { title: 'Meet Nova', href: `${urlPrefix}/introduction` },
                { title: 'Getting started', href: `${urlPrefix}/getting-started` },
                { title: 'Compatibility', href: `${urlPrefix}/compatibility` },
                { title: 'Installation', href: `${urlPrefix}/installation` },
                { title: 'Configuration', href: `${urlPrefix}/configuration` },
                { title: 'Upgrade guide', href: `${urlPrefix}/upgrade-guide` },
            ],
        },
        {
            title: 'Guides',
            links: [
                { title: 'Characters', href: `${urlPrefix}/guides/characters` },
                { title: 'Dashboard', href: `${urlPrefix}/guides/dashboard` },
                { title: 'Forms', href: `${urlPrefix}/guides/forms` },
                { title: 'Manifests', href: `${urlPrefix}/guides/manifests` },
                { title: 'Menus', href: `${urlPrefix}/guides/menus` },
                { title: 'Permissions', href: `${urlPrefix}/guides/permissions` },
                { title: 'Ranks', href: `${urlPrefix}/guides/ranks` },
                { title: 'Site Settings', href: `${urlPrefix}/guides/site-settings` },
                { title: 'Wiki', href: `${urlPrefix}/guides/wiki` },
            ],
        },
        {
            title: 'Core concepts',
            links: [
                { title: 'Directory structure', href: `${urlPrefix}/directory-structure` },
                { title: 'Seamless substitution', href: `${urlPrefix}/seamless-substitution` },
                { title: 'Controllers', href: `${urlPrefix}/controllers` },
                { title: 'Models', href: `${urlPrefix}/models` },
                { title: 'Libraries', href: `${urlPrefix}/libraries` },
                { title: 'Emails', href: `${urlPrefix}/emails` },
                { title: 'Genres', href: `${urlPrefix}/genres` },
            ],
        },
        {
            title: 'Skins',
            links: [
                { title: 'Overview', href: `${urlPrefix}/skins/overview` },
                { title: 'Installation', href: `${urlPrefix}/skins/installation` },
                { title: 'Anatomy of a skin', href: `${urlPrefix}/skins/anatomy` },
                { title: 'Templates', href: `${urlPrefix}/skins/templates` },
                { title: 'CSS', href: `${urlPrefix}/skins/css` },
                { title: 'Tips and tricks', href: `${urlPrefix}/skins/tips` },
            ],
        },
        {
            title: 'MODs',
            links: [
                { title: 'Creating a page', href: `${urlPrefix}/mods/creating-pages` },
                { title: 'Language items', href: `${urlPrefix}/mods/changing-language-items` },
                { title: 'Extensions', href: `${urlPrefix}/mods/extensions` },
                { title: 'Events', href: `${urlPrefix}/mods/events` },
                { title: 'Pretty URLs', href: `${urlPrefix}/mods/pretty-urls` },
            ],
        },
        {
            title: 'Resources',
            links: [
                { title: 'Helpful links', href: `${urlPrefix}/resources/helpful-links` },
                { title: 'Backing up Nova', href: `${urlPrefix}/resources/backing-up-nova` },
                { title: 'Moving your site', href: `${urlPrefix}/resources/moving-site` },
                { title: 'Versioning', href: `${urlPrefix}/resources/versioning` },
                { title: 'License agreement', href: `${urlPrefix}/resources/license-agreement` },
                { title: 'Contributors', href: `${urlPrefix}/resources/contributors` },
            ],
        },
    ]
}
