export default {
   verifyAuth() {
       return localStorage.getItem('user') != undefined && localStorage.getItem('accessToken') != undefined
   } 
}