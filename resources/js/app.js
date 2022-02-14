require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import Element from "element-ui";
import routes from "./routes";
import User from "./helpers/User";

window.User = User;
window.Reload = new Vue();
//support vuex
import Vuex from "vuex";

Vue.use(Vuex);
import storeData from "./store/index";

Vue.use(VueRouter);
Vue.use(Element);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component("app-component", require("./layouts/App.vue").default);
const store = new Vuex.Store(storeData);

const router = new VueRouter(routes);

const app = new Vue({
    el: "#app",
    router,
    store,
});
