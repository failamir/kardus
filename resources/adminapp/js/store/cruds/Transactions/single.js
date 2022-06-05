function initialState() {
  return {
    entry: {
      id: null,
      user_id: null,
      payment_id: null,
      total_bill: '',
      total_pay: '',
      course_id: null,
      payment_token: '',
      status: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      user: [],
      payment: [],
      course: [],
      status: []
    },
    loading: false
  }
}

const route = 'transactions'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setUser({ commit }, value) {
    commit('setUser', value)
  },
  setPayment({ commit }, value) {
    commit('setPayment', value)
  },
  setTotalBill({ commit }, value) {
    commit('setTotalBill', value)
  },
  setTotalPay({ commit }, value) {
    commit('setTotalPay', value)
  },
  setCourse({ commit }, value) {
    commit('setCourse', value)
  },
  setPaymentToken({ commit }, value) {
    commit('setPaymentToken', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setUser(state, value) {
    state.entry.user_id = value
  },
  setPayment(state, value) {
    state.entry.payment_id = value
  },
  setTotalBill(state, value) {
    state.entry.total_bill = value
  },
  setTotalPay(state, value) {
    state.entry.total_pay = value
  },
  setCourse(state, value) {
    state.entry.course_id = value
  },
  setPaymentToken(state, value) {
    state.entry.payment_token = value
  },
  setStatus(state, value) {
    state.entry.status = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
