export default {
    state: {
        api_token:
            "0askdjfkds134lwekrj34234k324lkj234kljkjfsdk;dsdkfj343k2jsdf-089s34234",
        cart: [],
    },
    mutations: {
        set_cart(store, payload) {
            store.cart = payload;
        },
    },
    getters: {
        getToken(state) {
            return state.api_token;
        },
    },
};
