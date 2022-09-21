const urlPrefix = '/docs/3.0'

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
                { title: 'Migration guide', href: `${urlPrefix}/upgrade-guide` },
            ],
        },
        {
            title: 'Core concepts',
            links: [
                { title: 'Directory structure', href: `${urlPrefix}/directory-structure` },
            ],
        },
        {
            title: 'Themes',
            links: [
                { title: 'Overview', href: `${urlPrefix}/skins/overview` },
                { title: 'Anatomy of a skin', href: `${urlPrefix}/skins/anatomy` },
            ],
        },
        {
            title: 'Extensions',
            links: [
                { title: 'Overview', href: `${urlPrefix}/skins/overview` },
                { title: 'Anatomy of a skin', href: `${urlPrefix}/skins/anatomy` },
            ],
        },
        {
            title: 'Resources',
            links: [
                { title: 'Where is it?', href: `${urlPrefix}/resources/helpful-links` },
                { title: 'Versioning', href: `${urlPrefix}/resources/versioning` },
                { title: 'License agreement', href: `${urlPrefix}/resources/license-agreement` },
                { title: 'Contributors', href: `${urlPrefix}/resources/contributors` },
            ],
        },
    ]
}
