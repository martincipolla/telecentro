const Home = () => import("./components/Home.vue");

const Crear = () => import("./components/Servidor/Crear.vue");

const Editar = () => import("./components/Servidor/Editar.vue");

const Mostrar = () => import("./components/Servidor/Mostrar.vue");

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "mostrarServidores",
        path: "/servidores",
        component: Mostrar,
    },
    {
        name: "crearServidor",
        path: "/nuevoservidor",
        component: Crear,
    },
    {
        name: "editarServidor",
        path: "/editarservidor/:id",
        component: Editar,
    },
];
