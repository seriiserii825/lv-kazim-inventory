import Token from "./Token";
import AppStorage from "./AppStorage";
class User {
    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const user_name = res.data.user_name;

        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, user_name);
        }
    }
    hasToken() {
        const storeToken = AppStorage.getToken();
        // console.log(storeToken, "storeToken");

        if (storeToken) {
            return Token.isValid(storeToken);
        }
        return false;
    }
    loggedIn() {
        return this.hasToken();
    }
    name() {
        if (this.loggedIn()) {
            return localStorage.getItem("name");
        }
        return false;
    }
    id() {
        if (this.loggedIn()) {
            const payload = Token.payload(localStorage.getItem("token"));
            return payload.sub;
        }
        return false;
    }
}

export default User = new User();
