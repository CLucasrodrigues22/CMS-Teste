<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mt-5">
        <h1>Lista de Tarefas</h1>
        <button
          type="button"
          class="btn btn-success mb-5"
          id="btnCreateTask"
          data-bs-toggle="modal"
          data-bs-target="#createTask"
        >
          Nova Tarefa
        </button>
        <table-component
          :data="tasks"
          :titles="[
            'Data de Criação',
            'Titulo',
            'Criado Por',
            'Status',
            'Ações',
          ]"
        ></table-component>
      </div>
    </div>
  </div>

  <!-- Modal Create Task -->
  <modal-component
    id="createTask"
    title="Criar nova Tarefa"
    info="Crie uma nova tarefa (Todos os campos são obrigatórios)"
  >
    <template v-slot:content>
      <div class="form-group">
        <input-component
          title="Titulo da tarefa"
          id="taskTitle"
          id-help="taskHelp"
          help-text="(Obrigatório) Informe o titulo da tarefa"
        >
          <input
            type="text"
            class="form-control"
            id="taskTitle"
            aria-describedby="taskHelp"
            placeholder="Titulo da Tarefa"
            required
            v-model="title"
          />
        </input-component>
        <input-component
          title="Descrição da Tarefa"
          id="taskDescription"
          id-help="taskHelp"
          help-text="(Obrigatório) Informe a descrição da tarefa"
        >
          <textarea
            class="form-control"
            placeholder="Descrição da tarefa"
            id="taskDescription"
            style="height: 100px"
            required
            v-model="description"
          ></textarea>
        </input-component>
      </div>
    </template>
    <template v-slot:footer>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Fechar
      </button>
      <button type="button" class="btn btn-primary" @click="storeTask()">
        Salvar Tarefa
      </button>
    </template>
  </modal-component>
  <!-- End Modal Create Task -->

  <!-- Modal Info Task By ID -->
  <modal-component
    id="infoTask"
    title="Informações da Tarefa"
    info="Vizualize e edite dados da tarefa selecionada"
  >
    <template v-slot:content>
      <div class="form-group">
        <input
          type="hidden"
          class="form-control"
          id="idTask"
          aria-describedby="idTaskHelp"
          v-model="$store.state.item.id"
          readonly
        />
        <input-component
          title="Titulo da tarefa"
          id="taskTitle"
          id-help="taskHelp"
          help-text="(Obrigatório) Informe o titulo da tarefa"
        >
          <input
            type="text"
            class="form-control"
            id="taskTitle"
            aria-describedby="taskHelp"
            placeholder="Titulo da Tarefa"
            required
            v-model="$store.state.item.title"
          />
        </input-component>
        <input-component
          title="Descrição da Tarefa"
          id="taskDescription"
          id-help="taskHelp"
          help-text="(Obrigatório) Informe a descrição da tarefa"
        >
          <textarea
            class="form-control"
            placeholder="Descrição da tarefa"
            id="taskDescription"
            style="height: 100px"
            required
            v-model="$store.state.item.description"
          ></textarea>
        </input-component>
        <input-component
          title="Status da Tarefa"
          id="taskStatus"
          id-help="taskStatusHelp"
        >
          <select
            class="form-select"
            aria-label="taskStatus"
            v-model="$store.state.item.status"
          >
            <option value="1">Pendente</option>
            <option value="2">Concluído</option>
            <option value="3">Cancelada</option>
          </select>
        </input-component>
      </div>
    </template>
    <template v-slot:footer>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Fechar
      </button>
      <button type="button" class="btn btn-primary" @click="updateTask()">
        Salvar Alteração
      </button>
    </template>
  </modal-component>
  <!-- End Modal Info Task By ID -->

  <!-- Modal Delete Task -->
  <modal-component id="deleteTask" title="Deletar Tarefa">
    <template v-slot:content>
      <h5 class="modal-title">
        <strong>Titulo da Tarefa:</strong> {{ $store.state.item.title }}
      </h5>
      <hr />
      <p class="mt-2">
        <strong>Descrição:</strong> {{ $store.state.item.description }}
      </p>
      <hr />
      <p class="mt-2">
        <strong>Status: </strong>
        <span class="text-warning" v-if="$store.state.item.status === 1"
          >Pendente</span
        >
        <span class="text-success" v-if="$store.state.item.status === 2"
          >Concluída</span
        >
        <span class="text-danger" v-if="$store.state.item.status === 3"
          >Cancelada</span
        >
      </p>
    </template>
    <template v-slot:footer>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Fechar
      </button>
      <button
        type="button"
        class="btn btn-danger"
        @click="deleteTask($store.state.item)"
      >
        Excluir Tarefa
      </button>
    </template>
  </modal-component>
  <!-- End Modal Delete Task -->
</template>

<script>
export default {
  data() {
    return {
      urlBase: "http://localhost:8000/",
      urlTask: "http://localhost:8000/api/tasks",
      id: "",
      title: "",
      description: "",
      status: "",
      tasks: {
        data: [],
      },
    };
  },
  methods: {
    loadTask() {
      let url = this.urlBase + "api/tasks";
      axios
        .get(url)
        .then((response) => {
          this.tasks = response.data.data;
        })
        .catch((errors) => {
          console.log(errors.response);
        });
    },
    storeTask() {
      // send ["title", "description"] to API
      let url = this.urlBase + "api/task-create";
      let formData = new FormData();
      formData.append("title", this.title);
      formData.append("description", this.description);

      axios
        .post(url, formData)
        .then((response) => {
          Swal.fire(
            "Sucesso!",
            `Tarefa ${this.title} cadastrada com sucesso!`,
            "success"
          );
          this.loadTask();
        })
        .catch((errors) => {
          Swal.fire(
            "Erro!",
            `Ocorreu o seguinte erro: ${errors.response}.`,
            "error"
          );
        });
    },
    updateTask() {
      let url = this.urlBase + "api/task-update";
      let formData = new FormData();
      formData.append("_method", "put");
      formData.append("id", this.$store.state.item.id);
      formData.append("title", this.$store.state.item.title);
      formData.append("description", this.$store.state.item.description);
      formData.append("status", this.$store.state.item.status);

      axios
        .post(url, formData)
        .then((response) => {
          Swal.fire("Sucesso!", `Tarefa editada com sucesso!`, "success");
          this.loadTask();
        })
        .catch((errors) => {
          // Swal.fire(
          //   "Erro!",
          //   `Ocorreu um erro na edição: ${errors.response.data.message}`,
          //   "error"
          // );
          console.log(errors.response.data);
        });
    },
    deleteTask(item) {
      Swal.fire({
        title: "Deseja realmente excluir a tarefa?",
        text: "Ao confirmar a exclusão, não será possivel recuperar os dados.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Excluir",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          let url = this.urlBase + "api/task-delete?id=" + item.id;
          let formData = new FormData();
          formData.append("_method", "delete");

          axios
            .post(url, formData)
            .then((response) => {
              Swal.fire({
                title: "Tarefa Excluida!",
                text: "A tarefa selecionada foi excluida da lista!",
                icon: "success",
              });
              this.loadTask();
            })
            .catch((errors) => {
              Swal.fire({
                title: "Erro ao Excluir a tarefa",
                text: "A tarefa selecionada foi excluida da lista!",
                icon: "danger",
              });
              console.log(errors);
            });
        }
      });
    },
  },
  mounted() {
    this.loadTask();
  },
};
</script>
