<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Criar Usuário</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="register($event)">
              <div class="row mb-3">
                <input type="hidden" name="_token" :value="csrf_token" />
                <label for="name" class="col-md-4 col-form-label text-md-end"
                  >Nome</label
                >

                <div class="col-md-6">
                  <input
                    id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    required
                    autocomplete="name"
                    autofocus
                    v-model="name"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >E-mail</label
                >

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    v-model="email"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-end"
                  >Senha</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"
                    v-model="password"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-end"
                  >Confirme a senha</label
                >

                <div class="col-md-6">
                  <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    v-model="password_confirmation"
                  />
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Registrar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["csrf_token"], // csrf token session
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },
  methods: {
    register(e) {
      let url = "https://localhost:8000/api/register";

      let cfg = new FormData();
      cfg.append("name", this.name);
      cfg.append("email", this.email);
      cfg.append("password", this.password);
      cfg.append("password_confirmation", this.password_confirmation);

      axios
        .post(url, cfg)
        .then((response) => {
          Swal.fire({
            icon: "success",
            title: "Sucesso",
            text: response.data.message,
          });
          setTimeout(() => {
            window.location.href = "https://127.0.0.1:8000/login";
          }, 1000);
        })
        .catch((errors) => {
          Swal.fire(
            "Erro!",
            `Ocorreu o seguinte erro: ${errors.response.data.message}`,
            "error"
          );
        });
    },
  },
};
</script>