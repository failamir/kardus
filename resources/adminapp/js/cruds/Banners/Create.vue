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
                <strong>{{ $t('cruds.banner.title_singular') }}</strong>
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
                      $t('cruds.banner.fields.title')
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
                    <label>{{ $t('cruds.banner.fields.image') }}</label>
                    <attachment
                      :route="getRoute('banners')"
                      :collection-name="'banner_image'"
                      :media="entry.image"
                      :max-file-size="4"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertImageFile"
                      @file-removed="removeImageFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.banner.fields.description') }}</label>
                    <ckeditor
                      :editor="editor"
                      :value="entry.description"
                      @input="updateDescription"
                    >
                    </ckeditor>
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
import Attachment from '@components/Attachments/Attachment'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  components: {
    Attachment,
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
    ...mapGetters('BannersSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('BannersSingle', [
      'storeData',
      'resetState',
      'setTitle',
      'insertImageFile',
      'removeImageFile',
      'setDescription'
    ]),
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateDescription(value) {
      this.setDescription(value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'banners.index' })
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
