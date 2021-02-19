<template>
  <label class="checkbox">
    <input type="checkbox"
           :value="item.id"
           v-model="chooseAdditives"/>
    <div class="checkbox__text">
      <img :src="item.img">
      <h4>{{item.name}}</h4>
      <span>2,40 руб.</span>
    </div>
  </label>
</template>

<script>
export default {
  name: "AdditiveCard",
  props: {
    item: {
      type: Object,
      required: true
    },
  },
  data() {
    return {
      chooseAdditives: [],
    }
  },
  methods: {
    choosedAdditives() {
      let data = []
      if (this.additives.length) {
        data = this.additives
      }
      return data
    },
  }
}
</script>

<style scoped>

</style>
