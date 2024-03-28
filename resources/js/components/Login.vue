<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <form method="POST" action="" @submit.prevent="login($event)">
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >Endereço de E-mail</label
                >

                <div class="col-md-6">
                  <input type="hidden" name="_token" :value="csrf_token" />
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    autofocus
                    v-model="email"
                  />
                  <!-- <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> -->
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
                    autocomplete="current-password"
                    v-model="password"
                  />
                  <!-- <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span> -->
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>
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
      email: "",
      password: "",
    };
  },
  methods: {
    login(e) {
      let url = "http://127.0.0.1:8000/api/login";

      let cfg = {
        method: "post",
        body: new URLSearchParams({
          email: this.email,
          password: this.password,
        }),
      };
      fetch(url, cfg)
        .then((response) => response.json())
        .then((data) => {
          if (data.token) {
            document.cookie = "token=" + data.token + ";SameSIte=Lax";
          }
          e.target.submit();
        });
    },
  },
};
</script>
