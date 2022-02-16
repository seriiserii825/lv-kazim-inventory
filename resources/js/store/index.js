export default {
    state: {
        api_token:
            "0askdjfkds134lwekrj34234k324lkj234kljkjfsdk;dsdkfj343k2jsdf-089s34234",
        cart: [],
    },
    mutations: {
        set_cart(state, payload) {
            state.cart.push(payload);
        },
        change_cart(state, payload) {
            state.cart = payload;
        },
    },
    actions: {
        add_to_cart({commit}, payload) {
            commit("set_cart", payload);
        },
        exists_in_cart({state}, payload) {
            return state.cart.some((item) => item.id === payload);
        },
        increase({state, commit}, payload) {
            const cart = state.cart.map((item) => {
                if (item.id === payload) {
                    if (item.current_count < item.product_quantity) {
                        item.current_count += 1;
                        item.sub_total = item.selling_price * item.current_count + 1;
                        return item;
                    }
                    return item;
                }
                return item;
            });
            commit("change_cart", cart);
        },
        decrease({state, commit}, payload) {
            const cart = state.cart.map((item) => {
                if (item.id === payload) {
                    if (item.current_count > 1) {
                        item.current_count -= 1;
                        item.sub_total = item.selling_price * item.current_count - 1;
                        return item;
                    }
                    return item;
                }
                return item;
            });
            commit("change_cart", cart);
        },
        count({state}, payload) {
            const cart_item = state.cart.find((item) => item.id === payload);
            return cart_item.current_count;
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
