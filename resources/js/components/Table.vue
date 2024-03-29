<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th
            scope="col"
            class="text-center"
            v-for="(t, key) in titles"
            :key="key"
          >
            {{ t }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="t in data" :key="t.id">
          <td class="text-center">
            {{ $filters.formatDateTime(t.created_at) }}
          </td>
          <td class="text-center">{{ t.title }}</td>
          <td class="text-center">
            <strong>{{ t.user?.name }}</strong>
          </td>
          <td class="text-center">
            <button
              type="button"
              class="btn btn-sm btn-warning"
              v-if="t.status === 1"
            >
              Pendente
            </button>
            <button
              type="button"
              class="btn btn-sm btn-success"
              v-if="t.status === 2"
            >
              Concluída
            </button>
            <button
              type="button"
              class="btn btn-sm btn-danger"
              v-if="t.status === 3"
            >
              Cancelada
            </button>
          </td>
          <td class="text-center">
            <button
              type="button"
              class="btn btn-info"
              title="Informações da Tarefa"
              data-bs-toggle="modal"
              data-bs-target="#infoTask"
              @click="setStore(t)"
            >
              <i class="bi bi-eye-fill"></i>
            </button>
            |
            <button
              type="button"
              class="btn btn-danger"
              title="Excluir Tarefa"
              data-bs-toggle="modal"
              data-bs-target="#deleteTask"
              @click="setStore(t)"
            >
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["data", "titles"],
  methods: {
    setStore(task) {
      this.$store.state.item = task;
    },
  },
};
</script>
