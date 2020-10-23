<template>
    <div class="inner-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 my-4 mx-auto">
          <div class="content">
            <div style="margin-left: 3rem;">
              <div class="article-title">
                <h1>
                  {{ news.title }}
                </h1>
              </div>
              <!-- <div class="subhead">
                <h4>
                  {{ news.url }}
                </h4>
              </div> -->
            </div>
            <div class="content-inner">
              <div class="p-mt-4 p-mb-2">

                <!-- <p class="pl-1 d-inline-block">
                  <pre class="d-inline date-sizes">in</pre>
                  <router-link
                    class="pl-1 post-category-title"
                    :to="{
                      name: 'getcategory',
                      params: { name: news.category.name }
                    }"
                    ><strong>{{ news.category.name }}</strong></router-link
                  >
                </p> -->


                <span>
                  <pre class="d-inline pl-1 date-sizes">published on</pre>
                  <p v-if="news.created" class="d-inline-block text-black-50">
                    {{ news.created }}
                  </p>
                  <pre else class="d-inline date-sizes">
{{ news.created }}</pre
                  >
                </span>
              </div>

              <p class="article pt-3 text-left" v-html="news.content"></p>
              <p class="">
                <a :href="`${ news.url }`" target="_blank">{{ news.url }}</a>
              </p>
              <hr />

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    news: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
