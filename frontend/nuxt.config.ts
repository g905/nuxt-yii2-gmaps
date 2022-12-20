// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    //ssr: false,
    runtimeConfig: {
        public: {
            apiBase: process.env.NUXT_PUBLIC_API_BASE || '/api',
            apiKey: "TFV6Rklqc2JzX0QyczFWV243WFpDQkJBMmlZTG11ZUg6",
            gmapsApiKey: "AIzaSyBXNyRQZ_nINH9Zhxunu4BkyY6oJ1Tixpo",
        }
    },
    app: {
        head: {
            title: "KARMA",
            meta: [
                // <meta name="viewport" content="width=device-width, initial-scale=1">
                { name: 'viewport', content: 'width=device-width, initial-scale=1' }
            ],
            script: [
                // <script src="https://myawesome-lib.js"></script>
                // { src: 'https://awesome-lib.js' }
            ],
            link: [
                // <link rel="stylesheet" href="https://myawesome-lib.css">
                // { rel: 'stylesheet', href: 'https://awesome-lib.css' }
            ],
            // please note that this is an area that is likely to change
            noscript: [
                // <noscript>Javascript is required</noscript>
                { children: 'Javascript is required' }
            ]
        }
    },
    css: ['~/assets/style.sass']
});
