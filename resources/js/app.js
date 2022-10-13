require("./bootstrap");
import vue from "vue";
window.Vue = vue;

import App from "./components/App.vue";
import VueAxios from "vue-axios";
import axios from "axios";
import VueRouter from "vue-router";
import { routes } from "./routes";
import Vue from "vue";
import VueImg from "v-img";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faCirclePlus,
    faPenToSquare,
    faServer,
    faTrash,
    faUpDownLeftRight,
} from "@fortawesome/free-solid-svg-icons";

library.add(faCirclePlus);
library.add(faPenToSquare);
library.add(faServer);
library.add(faTrash);
library.add(faUpDownLeftRight);
Vue.component("font-awesome-icon", FontAwesomeIcon);

Vue.config.productionTip = false;

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueImg);
Vue.use(VueSweetalert2);

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

const app = new Vue({
    el: "#app",
    router: router,
    render: (h) => h(App),
});
