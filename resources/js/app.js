import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";
import AppointmentNotifications from "./components/AppointmentNotifications.vue";
import timeago from "vue-timeago3";

// Root component
const app = createApp({
    components: {
        "appointment-notifications": AppointmentNotifications,
    },
});

// // Injecting plugins
app.use(timeago);

app.mount("#app");
