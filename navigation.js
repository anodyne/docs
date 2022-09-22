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
                { title: 'Upgrade guide', href: `${urlPrefix}/upgrade-guide` },
                { title: 'Migration guide', href: `${urlPrefix}/upgrade-guide` },
            ],
        },
        {
            title: 'Features',
            links: [
                { title: 'Post types', href: `${urlPrefix}/features/post-types` },
            ],
        },
        {
            title: 'Core concepts',
            links: [
                { title: 'Directory structure', href: `${urlPrefix}/core-concepts/directory-structure` },
                { title: 'Configuration', href: `${urlPrefix}/core-concepts/configuration` },
            ],
        },
        {
            title: 'Themes',
            links: [
                { title: 'Overview', href: `${urlPrefix}/themes/overview` },
                { title: 'Installation', href: `${urlPrefix}/themes/installation` },
                { title: 'Tailwind CSS', href: `${urlPrefix}/themes/tailwind` },
            ],
        },
        {
            title: 'Extensions',
            links: [
                { title: 'Overview', href: `${urlPrefix}/extensions/overview` },
                { title: 'Installation', href: `${urlPrefix}/extensions/installation` },
            ],
        },
        {
            title: 'Resources',
            links: [
                { title: "What's new in Nova 3?", href: `${urlPrefix}/resources/whats-new` },
                { title: 'Where is it?', href: `${urlPrefix}/resources/where-is-it` },
                { title: 'Versioning', href: `${urlPrefix}/resources/versioning` },
                { title: 'License agreement', href: `${urlPrefix}/resources/license-agreement` },
                { title: 'Contributors', href: `${urlPrefix}/resources/contributors` },
            ],
        },
    ]
}
