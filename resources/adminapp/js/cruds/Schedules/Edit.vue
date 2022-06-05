<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.schedule.title_singular') }}</strong>
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
                      'has-items': entry.teacher_id !== null,
                      'is-focused': activeField == 'teacher'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.schedule.fields.teacher')
                    }}</label>
                    <v-select
                      name="teacher"
                      label="name"
                      :key="'teacher-field'"
                      :value="entry.teacher_id"
                      :options="lists.teacher"
                      :reduce="entry => entry.id"
                      @input="updateTeacher"
                      @search.focus="focusField('teacher')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.schedule.fields.title')
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
                    <label>{{ $t('cruds.schedule.fields.description') }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.description"
                      @input="updateDescription"
                    >
                    </ckeditor>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.link,
                      'is-focused': activeField == 'link'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.schedule.fields.link')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.link"
                      @input="updateLink"
                      @focus="focusField('link')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.datetime,
                      'is-focused': activeField == 'datetime'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.schedule.fields.datetime')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.datetime"
                      @input="updateDatetime"
                      @focus="focusField('datetime')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
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
    ...mapGetters('SchedulesSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('SchedulesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setTeacher',
      'setTitle',
      'setDescription',
      'setLink',
      'setDatetime'
    ]),
    updateTeacher(value) {
      this.setTeacher(value)
    },
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateDescription(value) {
      this.setDescription(value)
    },
    updateLink(e) {
      this.setLink(e.target.value)
    },
    updateDatetime(e) {
      this.setDatetime(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'schedules.index' })
          this.$eventHub.$emit('update-success')
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
