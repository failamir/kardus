<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.notification.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.notification.fields.title')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.title"
                      @input="updateTitle"
                      @focus="focusField('title')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.notification.fields.value') }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.value"
                      @input="updateValue"
                    >
                    </ckeditor>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.user_id !== null,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.notification.fields.user')
                    }}</label>
                    <v-select
                      name="user"
                      label="name"
                      :key="'user-field'"
                      :value="entry.user_id"
                      :options="lists.user"
                      :reduce="entry => entry.id"
                      @input="updateUser"
                      @search.focus="focusField('user')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status,
                      'is-focused': activeField == 'status'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.notification.fields.status')
                    }}</label>
                    <v-select
                      name="status"
                      :key="'status-field'"
                      :value="entry.status"
                      :options="lists.status"
                      :reduce="entry => entry.value"
                      @input="updateStatus"
                      @search.focus="focusField('status')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    ClassicEditor
  },
  data() {
    return {
      status: '',
      activeField: '',
      editor: ClassicEditor
    }
  },
  computed: {
    ...mapGetters('NotificationsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('NotificationsSingle', [
      'storeData',
      'resetState',
      'setTitle',
      'setValue',
      'setUser',
      'setStatus',
      'fetchCreateData'
    ]),
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateValue(value) {
      this.setValue(value)
    },
    updateUser(value) {
      this.setUser(value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'notifications.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
