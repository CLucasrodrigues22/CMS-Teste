<template>
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    aria-labelledby="infoTaskLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="infoTaskLabel">
            <strong>{{ title }}</strong>
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <span>{{ info }}</span>
          <div class="modal-body">
            <slot name="content"></slot>
          </div>
          <div class="modal-footer">
            <slot name="footer"></slot>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["id", "title", "info", "description", "status"],
};
</script>
