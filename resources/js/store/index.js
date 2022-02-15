export default {
    state: {
        api_token:
            "0askdjfkds134lwekrj34234k324lkj234kljkjfsdk;dsdkfj343k2jsdf-089s34234",
        cart: [],
    },
    mutations: {
        set_cart(store, payload) {
            store.cart.push(payload);
        },
    },
    actions: {
        add_to_cart({ commit }, payload) {
            commit("set_cart", payload);
        },
        exists_in_cart({ state }, payload) {
            return state.cart.some((item) => item.id === payload);
        },
        current_count({ state }, payload) {
            const cart_item = state.cart.filter((item) => item.id === payload);
            return cart_item;
        },
    },
    getters: {
        getToken(state) {
            return state.api_token;
        },
        cart(state) {
            return state.cart;
        },
    },
};
