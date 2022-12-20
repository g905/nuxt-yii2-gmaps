export default defineNuxtPlugin(() => {
    addRouteMiddleware('auth', () => {
        if(process.client) {
            let expires = localStorage.getItem("expires");
            if ((Math.floor(Date.now() / 1000)) >= expires) {
                localStorage.clear();
                console.log("acces_token exired. Log in again.");
                return "/login";
            }
        }
    })

    /*addRouteMiddleware('named-test', () => {
        console.log('this named middleware was added in a plugin')
    })*/
})