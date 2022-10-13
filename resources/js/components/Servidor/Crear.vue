<template>
    <div class="card">
        <div class="card-header pb-0 mb-4">
            <h2 class="mb-0 mt-2">
                <font-awesome-icon
                    style="font-size: 1.67rem !important"
                    icon="fa-solid fa-circle-plus"
                />
                NUEVO SERVIDOR
            </h2>
        </div>
        <div class="card-body mt-2">
            <form @submit.prevent="crear">
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
                            pattern="[0-9.]{1,45}"
                            @keypress="esNumerico($event)"
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
                        Agregar
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
    name: "crear-servidor",
    data() {
        return {
            servidor: {
                imagen: "",
                host: "",
                ip: "",
                descripcion: "",
            },
            errors: {},
        };
    },
    methods: {
        onChange(e) {
            this.servidor.imagen = e.target.files[0];
        },
        async crear() {
            let fd = new FormData();
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
        esNumerico: function (evt) {
            evt = evt ? evt : window.event;
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (
                charCode > 31 &&
                (charCode < 48 || charCode > 57) &&
                charCode !== 46
            ) {
                evt.preventDefault();
            } else {
                return true;
            }
        },
    },
};
</script>
