<template>
    <div class="card">
        <div class="card-header pb-0">
            <h2 class="mb-0 mt-2">
                <font-awesome-icon
                    style="font-size: 1.67rem !important"
                    icon="fa-solid fa-server"
                />
                SERVIDORES
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3 text-end">
                    <router-link
                        class="btn btn-sm btn-primary"
                        :to="{ name: 'crearServidor' }"
                    >
                        <font-awesome-icon
                            style=""
                            icon="fa-solid fa-circle-plus"
                        />
                        Nuevo Servidor
                    </router-link>
                </div>
                <div class="col-12 text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <th width="60"></th>
                                <th>Host</th>
                                <th>IP</th>
                                <th>Descripción</th>
                                <th width="100">Acciones</th>
                                <th width="60"></th>
                            </thead>
                            <tbody
                                class="text-center"
                                is="draggable"
                                tag="tbody"
                                v-bind="dragOptions"
                                handle=".handle"
                                @update="onUpdate"
                                :list="servidores"
                            >
                                <tr
                                    v-for="servidor in servidores"
                                    :key="servidor.id"
                                    v-if="servidores.length > 0"
                                >
                                    <td class="align-middle">
                                        <img
                                            class="img-fluid"
                                            :src="`/images/${servidor.imagen}`"
                                            @error="replaceByDefault"
                                            width="50"
                                            :alt="`${servidor.imagen}`"
                                            v-img
                                        />
                                    </td>
                                    <td class="align-middle">
                                        {{ servidor.host }}
                                    </td>
                                    <td class="align-middle">
                                        {{ servidor.ip }}
                                    </td>
                                    <td class="align-middle">
                                        {{ servidor.descripcion }}
                                    </td>
                                    <td class="align-middle">
                                        <router-link
                                            :to="{
                                                name: 'editarServidor',
                                                params: {
                                                    id: servidor.id,
                                                },
                                            }"
                                            class="btn btn-sm btn-secondary"
                                            title="Editar"
                                            ><font-awesome-icon
                                                icon="fa-solid fa-pen-to-square"
                                            />
                                        </router-link>
                                        <a
                                            type="button"
                                            @click="
                                                sweetAlert(
                                                    servidor.id,
                                                    servidor.host,
                                                    servidor.ip
                                                )
                                            "
                                            class="btn btn-sm btn-danger"
                                            title="Eliminar"
                                            ><font-awesome-icon
                                                icon="fa-solid fa-trash"
                                        /></a>
                                    </td>
                                    <td class="align-middle">
                                        <div class="handle">
                                            <font-awesome-icon
                                                title="Drag & Drop"
                                                icon="fa-solid fa-up-down-left-right"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="servidores.length === 0 && !loading">
                                    <td colspan="6">
                                        <p class="text-center m-0">
                                            No se encontraron servidores
                                            cargados
                                        </p>
                                    </td>
                                </tr>
                                <tr v-if="loading">
                                    <td colspan="6" class="text-center m-5 p-5">
                                        <div class="lds-facebook">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <span class="badge rounded-pill bg-secondary"
                        >Servidores disponibles: {{ cantidad }}</span
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
export default {
    name: "servidores",
    data() {
        return {
            servidores: [],
            loading: true,
            cantidad: 0,
        };
    },
    mounted() {
        this.mostrarServidores();
    },
    computed: {
        dragOptions() {
            return {
                animation: 200,
                group: "table",
                disabled: false,
                ghostClass: "ghost",
            };
        },
    },
    methods: {
        async mostrarServidores() {
            this.loading = true;
            await this.axios
                .get("/api/servidores")
                .then((response) => {
                    this.servidores = response.data;
                    this.cantidad = this.servidores.length;
                    this.loading = false;
                })
                .catch((e) => {
                    this.servidor = [];
                    console.log(e);
                });
        },
        async borrarServidor(id) {
            await this.axios
                .delete(`/api/servidores/${id}`)
                .then((response) => {
                    this.mostrarServidores();
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        replaceByDefault(e) {
            e.target.src = "/images/default.png";
        },
        sweetAlert(id, host, ip) {
            let myThis = this;
            this.$swal({
                title: `Al confirmar se eliminara el siguiente SERVIDOR<div class='mySwal'>HOST: ${host} <br>IP: ${ip}</div>`,
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.value) {
                    myThis.borrarServidor(id);
                }
            });
        },
        async onUpdate() {
            this.$emit("updated", this.servidores);

            let fd = new FormData();
            fd.append("indice", JSON.stringify(this.servidores));

            await this.axios.post("/api/servidores", fd).catch((e) => {
                console.log(e);
            });

            /*
            let fd = new FormData();
            fd.append("newIndex", e.newIndex);
            fd.append("oldIndex", e.oldIndex);

            await this.axios.post("/api/servidores", fd).catch((e) => {
                console.log(e);
            });*/
        },
    },
};
</script>
