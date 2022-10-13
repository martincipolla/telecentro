<template>
    <div>
        <nav class="myNav navbar navbar-expand-md navbar-dark fixed-top">
            <div class="container-fluid">
                <router-link class="nav-brand" to="/" exact
                    ><img src="/site_img/logo-imagotipo.png" alt="Telecentro"
                /></router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                to="/"
                                active-class="active"
                                exact
                                >Inicio</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                to="/servidores"
                                active-class="active"
                                exact
                                >Servidores</router-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="flex-shrink-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer mt-auto py-4 text-center">
            <div class="container">
                Los servicios que presta Telecentro S.A. están sujetos a
                disponibilidad técnica y geográfica dentro del territorio
                Argentino. 2022 Telecentro S.A. Todos los derechos reservados.
            </div>
        </footer>
    </div>
</template>
