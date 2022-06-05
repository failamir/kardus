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
                <strong>{{ $t('cruds.transaction.title_singular') }}</strong>
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
                      'has-items': entry.user_id !== null,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.user')
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
                      'has-items': entry.payment_id !== null,
                      'is-focused': activeField == 'payment'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.payment')
                    }}</label>
                    <v-select
                      name="payment"
                      label="name"
                      :key="'payment-field'"
                      :value="entry.payment_id"
                      :options="lists.payment"
                      :reduce="entry => entry.id"
                      @input="updatePayment"
                      @search.focus="focusField('payment')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_bill,
                      'is-focused': activeField == 'total_bill'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.total_bill')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.total_bill"
                      @input="updateTotalBill"
                      @focus="focusField('total_bill')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_pay,
                      'is-focused': activeField == 'total_pay'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.total_pay')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.total_pay"
                      @input="updateTotalPay"
                      @focus="focusField('total_pay')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.course_id !== null,
                      'is-focused': activeField == 'course'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.course')
                    }}</label>
                    <v-select
                      name="course"
                      label="title"
                      :key="'course-field'"
                      :value="entry.course_id"
                      :options="lists.course"
                      :reduce="entry => entry.id"
                      @input="updateCourse"
                      @search.focus="focusField('course')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.payment_token,
                      'is-focused': activeField == 'payment_token'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.transaction.fields.payment_token')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.payment_token"
                      @input="updatePaymentToken"
                      @focus="focusField('payment_token')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.transaction.fields.status') }}</label>
                    <v-radio
                      :value="entry.status"
                      :options="lists.status"
                      @change="updateStatus"
                    >
                    </v-radio>
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

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('TransactionsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('TransactionsSingle', [
      'storeData',
      'resetState',
      'setUser',
      'setPayment',
      'setTotalBill',
      'setTotalPay',
      'setCourse',
      'setPaymentToken',
      'setStatus',
      'fetchCreateData'
    ]),
    updateUser(value) {
      this.setUser(value)
    },
    updatePayment(value) {
      this.setPayment(value)
    },
    updateTotalBill(e) {
      this.setTotalBill(e.target.value)
    },
    updateTotalPay(e) {
      this.setTotalPay(e.target.value)
    },
    updateCourse(value) {
      this.setCourse(value)
    },
    updatePaymentToken(e) {
      this.setPaymentToken(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'transactions.index' })
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
