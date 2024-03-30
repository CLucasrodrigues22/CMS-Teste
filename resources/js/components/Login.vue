<template>
  <div>
    <section class="vh-100 mt-5">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="task.png" class="img-fluid" alt="Sample image" />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
            <form method="POST" @submit.prevent="login($event)">
              <input type="hidden" name="_token" :value="csrf_token" />
              <div
                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start"
              >
                <h1 class="fw-normal mb-5 me-3">Laravel-Task</h1>
              </div>
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Formulário de Login</p>
              </div>

              <hr />

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="inputEmail">E-mail</label>
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control form-control-lg"
                  placeholder="Informe um endereço de e-mail válido"
                  name="email"
                  value=""
                  required
                  autocomplete="email"
                  autofocus
                  v-model="email"
                />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="inputPaddword">Senha</label>
                <input
                  type="password"
                  id="inputPaddword"
                  class="form-control form-control-lg"
                  placeholder="Digite a senha"
                  name="password"
                  required
                  autocomplete="current-password"
                  v-model="password"
                />
              </div>
              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                  type="submit"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                  Entrar
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">
                  Não tem uma conta?
                  <a href="http://127.0.0.1:8000/register" class="link-dark"
                    >Cadastre-se</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ["csrf_token"], // csrf token session
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login(e) {
      let url = "http://localhost:8000/api/login";
      let cfg = {
        method: "post",

        body: new URLSearchParams({
          email: this.email,
          password: this.password,
        }),
      };
      // requisições http
      fetch(url, cfg)
        .then((response) => response.json())
        .then((data) => {
          if (data.token) {
            Swal.fire({
              icon: "success",
              title: "Sessão iniciada",
              text: data.message,
            });
            document.cookie = "token=" + data.token + ";SameSite=Lax";

            setTimeout(() => {
              e.target.submit();
            }, 1000);
          } else {
            Swal.fire({
              icon: "error",
              title: "Erro ao entrar",
              text: data.message,
            });
          }
        });
    },
  },
  // methods: {
  //   login(e) {
  //     let url = "http://127.0.0.1:8000/api/login";

  //     let data = {
  //       email: this.email,
  //       password: this.password,
  //     };

  //     axios.post(url, data).then((response) => {
  //       if (response.data.token) {
  //         Swal.fire({
  //           icon: "success",
  //           title: "Sessão iniciada",
  //           text: response.data.message,
  //         });

  //         document.cookie = "token=" + response.data.token + ";SameSite=Lax";

  //         setTimeout(() => {
  //           e.target.submit();
  //         }, 1000);
  //       } else {
  //         Swal.fire({
  //           icon: "error",
  //           title: "Erro ao entrar",
  //           text: response.data.message,
  //         });
  //       }
  //     });
  //   },
  // },
};
</script>
