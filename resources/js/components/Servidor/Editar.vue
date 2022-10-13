<template>
    <div class="card">
        <div class="card-header pb-0 mb-2">
            <h2 class="mb-0 mt-2">
                <font-awesome-icon
                    style="font-size: 1.67rem !important"
                    icon="fa-solid fa-pen-to-square"
                />
                EDITAR SERVIDOR
            </h2>
        </div>
        <div class="card-body">
            <form @submit.prevent="actualizar">
                <div class="mb-4 text-center">
                    <div id="img" ref="img"></div>
                    <button
                        v-on:click="eliminarImagen"
                        type="button"
                        class="btn btn-danger myBtn mt-2"
                        v-if="tieneImg"
                    >
                        Eliminar Imágen
                    </button>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="imagen" class="form-label"
                            >Imágen <small>(300x300px)</small></label
                        >
                        <input
                            type="file"
                            class="form-control"
                            v-bind:class="{ 'is-invalid': errors.imagen }"
                            id="imagen"
                            name="imagen"
                            accept="image/gif, image/jpeg, image/png"
                            v-on:change="onChange"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors && errors.imagen"
                        >
                            {{ errors.imagen[0] }}
                        </div>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="host" class="form-label"
                            >Host <small>(*)</small></label
                        >
                        <input
                            type="text"
                            class="form-control"
                            v-bind:class="{ 'is-invalid': errors.host }"
                            id="host"
                            name="host"
                            v-model="servidor.host"
                            maxlength="45"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors && errors.host"
                        >
                            {{ errors.host[0] }}
                        </div>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="ip" class="form-label"
                            >IP <small>(*)</small></label
                        >
                        <input
                            type="text"
                            class="form-control"
                            v-bind:class="{ 'is-invalid': errors.ip }"
                            id="ip"
                            name="ip"
                            v-model="servidor.ip"
                            maxlength="45"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors && errors.ip"
                        >
                            {{ errors.ip[0] }}
                        </div>
                    </div>

                    <div class="mb-3 col">
                        <label for="descripcion" class="form-label"
                            >Descripción <small>(*)</small></label
                        >
                        <textarea
                            class="form-control"
                            v-bind:class="{ 'is-invalid': errors.descripcion }"
                            id="descripcion"
                            name="descripcion"
                            v-model="servidor.descripcion"
                            maxlength="200"
                            cols="30"
                            rows="3"
                        ></textarea>
                        <div
                            class="invalid-feedback"
                            v-if="errors && errors.descripcion"
                        >
                            {{ errors.descripcion[0] }}
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary myBtn">
                        Editar
                    </button>
                    <router-link
                        class="btn btn-secondary myBtn"
                        to="/servidores"
                        exact
                        >Cancelar</router-link
                    >
                    <p class="mt-2"><small>(*) Campos Obligatorios</small></p>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    name: "editar-servidor",
    data() {
        return {
            servidor: {
                imagen: "",
                host: "",
                ip: "",
                descripcion: "",
            },
            tieneImg: false,
            errors: {},
            loading: true,
        };
    },
    mounted() {
        this.mostrarServidor();
    },
    methods: {
        onChange(e) {
            this.servidor.imagen = e.target.files[0];
        },
        async mostrarServidor() {
            await this.axios
                .get(`/api/servidores/${this.$route.params.id}`)
                .then((response) => {
                    const { imagen, host, ip, descripcion } = response.data;
                    this.servidor.imagen = imagen;
                    this.servidor.host = host;
                    this.servidor.ip = ip;
                    this.servidor.descripcion = descripcion;
                    if (imagen != "" && imagen != null) {
                        this.tieneImg = true;
                        this.$refs["img"].innerHTML = `
                            <img src="/images/${imagen}" alt="Servidor" height="300"> `;
                    }
                    this.loading = false;
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        async actualizar() {
            let fd = new FormData();
            fd.append("id", this.$route.params.id);
            fd.append("imagen", this.servidor.imagen);
            fd.append("host", this.servidor.host);
            fd.append("ip", this.servidor.ip);
            fd.append("descripcion", this.servidor.descripcion);

            await this.axios
                .post("/api/servidores", fd)
                .then((response) => {
                    this.$router.push({ name: "mostrarServidores" });
                })
                .catch((e) => {
                    if (e.response.status === 422) {
                        this.errors = e.response.data.errors;
                    }
                    console.log(e);
                });
        },
        async eliminarImagen() {
            await this.axios
                .put(`/api/servidores/${this.$route.params.id}`)
                .then((response) => {
                    this.tieneImg = false;
                    this.$refs["img"].innerHTML = "";
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
};
</script>
