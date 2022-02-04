import Token from "./Token";
import AppStorage from "./AppStorage";
class User {
    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const user_name = res.data.user_name;

        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, username);
        }
    }
    hasToken() {
        const storeToken = AppStorage.get("token");
        if (storeToken) {
            return AppStorage.isValid();
        }
    }
    loggedIn() {
        return this.hasToken();
    }
    name() {
        if (this.loggedIn()) {
            return localStorage.getItem("user");
        }
    }
}

export default User = new User();
