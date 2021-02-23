const plugin = require('tailwindcss/plugin');
const _ = require("lodash");
const thegithubblog = require('./thegithubblog.json');

module.exports = {
    thegithubblog,
    purge: {
        content: [
            './*.php',
            './*/*.php',
        ],
        options: {
            safelist: {
                standard: [/^has-/, /^align/, /^wp-/]
            }
        }
    },
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1260px',
        },
        extend: {
            colors: thegithubblog.colors,
            boxShadow: {
                'behind': '0 1px 15px rgba(27,31,35,.15)'
            },
            fontFamily: {
                'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
            },
        },
    },
    variants: {
        extend: {
            display: ["group-hover"]
        }
    },
    plugins: [
        plugin(function ({addUtilities, addComponents, e, prefix, config, theme}) {
            const colors = theme('colors');
            const margin = theme('margin');
            const screens = theme('screens');
            const fontSize = theme('fontSize');

            const editorColorText = _.map(config("thegithubblog.colors", {}), (value, key) => {
                return {
                    [`.has-${key}-text-color`]: {
                        color: value,
                    },
                };
            });

            const editorColorBackground = _.map(config("thegithubblog.colors", {}), (value, key) => {
                return {
                    [`.has-${key}-background-color`]: {
                        backgroundColor: value,
                    },
                };
            });

            const editorFontSizes = _.map(config("thegithubblog.fontSizes", {}), (value, key) => {
                return {
                    [`.has-${key}-font-size`]: {
                        fontSize: value[0],
                        fontWeight: `${value[1] || 'normal'}`
                    },
                };
            });

            const alignmentUtilities = {
                '.alignfull': {
                    margin: `${margin[2] || '0.5rem'} calc(50% - 50vw)`,
                    maxWidth: '100vw',
                    "@apply w-screen": {}
                },
                '.alignwide': {
                    "@apply -mx-16 my-2 max-w-screen-xl": {}
                },
                '.alignnone': {
                    "@apply h-auto max-w-full mx-0": {}
                },
                ".aligncenter": {
                    margin: `${margin[2] || '0.5rem'} auto`,
                    "@apply block": {}
                },
                [`@media (min-width: ${screens.sm || '640px'})`]: {
                    '.alignleft:not(.wp-block-button)': {
                        marginRight: margin[2] || '0.5rem',
                        "@apply float-left": {}
                    },
                    '.alignright:not(.wp-block-button)': {
                        marginLeft: margin[2] || '0.5rem',
                        "@apply float-right": {}
                    },
                    ".wp-block-button.alignleft a": {
                        "@apply float-left mr-4": {},
                    },
                    ".wp-block-button.alignright a": {
                        "@apply float-right ml-4": {},
                    },
                },
            };

            const imageCaptions = {
                '.wp-caption': {
                    "@apply inline-block": {},
                    '& img': {
                        marginBottom: margin[2] || '0.5rem',
                        "@apply leading-none": {}
                    },
                },
                '.wp-caption-text': {
                    fontSize: (fontSize.sm && fontSize.sm[0]) || '0.9rem',
                    color: (colors.gray && colors.gray[600]) || '#718096',
                },
            };

            addUtilities([editorColorText, editorColorBackground, alignmentUtilities, editorFontSizes, imageCaptions], {
                respectPrefix: false,
                respectImportant: false,
            });
        }),
    ]
};
