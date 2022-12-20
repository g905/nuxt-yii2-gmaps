export default defineNuxtRouteMiddleware(() => {
/*    console.log('always run middleware test');
    if(process.client) {
        let expires = localStorage.getItem("expires");
        if ((Math.floor(Date.now() / 1000)) >= expires) {
            localStorage.removeItem("expires");
            localStorage.removeItem("access_token");
            console.log("acces_token exired. Fuck you.");
            return "/login";
        }
    }
*/
})