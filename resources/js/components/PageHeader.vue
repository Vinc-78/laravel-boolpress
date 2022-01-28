<template>
  <header class="masthead" :style="`background-image: url('${bgImg}')`">
    <slot name="overTheRainbow">
      <!-- <span class="ijoiu"> testo di default overTheRainbow </span> -->
    </slot>

    <div class="container position-relative px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div class="site-heading">
            <h1>{{ title }}</h1>
            <span class="subheading">
              <slot> {{ subTitle }} </slot>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  props: {
    title: String,
    subTitle: String,
    imgUrl: String,
  },
  computed: {
    bgImg() {
      return this.imgUrl ?? "immagine predefinita";
    },
  },
};
</script>
<style></style>